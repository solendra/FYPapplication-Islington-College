<?php

class Sales extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        $this->load->model('products_model');
        $this->load->model('suppliers_model');
        $this->load->model('purchase_record_model');
        $this->load->model('product_code_price_model');
        $this->load->model('current_stock_model');
        $this->load->model('sales_model');
        $this->load->model('sales_products_model');
        $this->load->model('settings_model');
        
        
        
        $this->load->library('cart');    
    }
    
    function sell()
    {   
        $data['page'] = 'sales/sell_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    
    function sell_action()
    {   
        
        // getting current tax
        $settings_model = $this->settings_model->get();
        $tax = $settings_model[0]['tax'];
        
        /** Insert into sales **/
        
        $sales_data = $this->input->post();
        
        // generate bill no
        $bill_no = 'B'.( $this->sales_model->count_rows() + 1);
        $total_items = $this->cart->total_items();
        $total_amount = $this->cart->total();
        
        
        $sales_data['bill_no'] = $bill_no;
        $sales_data['total_items'] = $total_items;
        $sales_data['total_amount'] = $total_amount;
        $sales_data['date_time'] = date('Y-m-d H:i:s');
        $sales_data['tax'] = $tax;
        $amount_after_discount = $total_amount - $this->input->post('discount');
        $sales_data['grand_total'] = $amount_after_discount + (($amount_after_discount) * $tax / 100);
        
        
        unset($sales_data['current_stock_ids']);
        unset($sales_data['quantity']);
        // insert to sales table
        $sales_id = $this->sales_model->insert($sales_data);
        
        
        /** Insert into sales products **/
        $current_stock_ids_arr = $this->input->post('current_stock_ids');
        $quantity_arr = $this->input->post('quantity');
        $i = 0;
        foreach($current_stock_ids_arr as $current_stock_id)
        {
            $current_stock_rows = $this->db->query("SELECT pcp.id as product_code_price_id, cs.product_id, price FROM current_stock cs JOIN product_code_price pcp ON pcp.id = cs.product_code_price_id WHERE cs.id = '$current_stock_id'")->result_array();
            
            $sales_products_data['sales_id'] = $sales_id;
            $sales_products_data['product_id'] = $current_stock_rows[0]['product_id'];
            $sales_products_data['product_code_price_id'] = $current_stock_rows[0]['product_code_price_id'];
            $sales_products_data['quantity'] = $quantity_arr[$i];
            $sales_products_data['price'] = $current_stock_rows[0]['price'];
            $sales_products_data['date_time'] = date('Y-m-d H:i:s');
            
            $this->sales_products_model->insert($sales_products_data);
            
            $i++;
        }
        
        
        
        /** Deduct from current stock **/
        $i = 0;
        foreach($current_stock_ids_arr as $current_stock_id)
        {
            $current_stock_rows = $this->current_stock_model->get($current_stock_id);
            
            // get the quantity and deduct number of quantity that are sold
            $current_stock_data['quantity'] = $current_stock_rows[0]['quantity'] - $quantity_arr[$i];
            
            $this->current_stock_model->update($current_stock_data, $current_stock_id);
            
            $i++;
        }
        
        
        // reset bill and show success message
        $this->cart->destroy();
        
        $this->session->set_flashdata('msg','Items Sold Successfully. <a href="'.base_url('sales/print_invoice/'.$sales_id).'" target="_blank" class="btn btn-primary pull-right" id="alert-btn"><i class="fa fa-print"></i> Print Invoice</a>');
        redirect('sales/sell');
        
    }
    
    
    
    
    
    function check_product_ajax()
    {
        header('Content-type: application/json; charset=UTF-8'); // json header
        
        $product_code = $this->input->post('product_code');
        $product_rows = $this->db->query("SELECT cs.id, product_code, product_name, price, quantity FROM products p JOIN product_code_price pcp ON p.id = pcp.product_id JOIN current_stock cs ON pcp.id = cs.product_code_price_id WHERE product_code = '$product_code'")->result_array();
        
        // if product is found
        if(count($product_rows) > 0)
        {
            echo json_encode($product_rows[0]);
        }
        // if product is not found, then send not found message
        else
        {
             $status['msg'] = 'not_found';
             echo json_encode($status);
        }
        
        
    }
    
    
    function add_to_bill($current_stock_id, $quantity)
    {
        
        $products_rows = $this->db->query("SELECT cs.id, product_code, product_name, price, quantity FROM products p JOIN product_code_price pcp ON p.id = pcp.product_id JOIN current_stock cs ON pcp.id = cs.product_code_price_id WHERE cs.id = '$current_stock_id'")->result_array();
        
        
        $data = array(
           'id'      => $current_stock_id,
           'qty'     => $quantity,
           'price'   => $products_rows[0]['price'],
           'name'    => $products_rows[0]['product_name'],
           'options'=> array('product_code' => $products_rows[0]['product_code'])
        );

        $this->cart->insert($data);
         
        
        // show success message
        $this->session->set_flashdata('msg','Item Added To Bill!!');
        redirect('sales/sell');
        
        
    }
    
    function remove_from_bill($rowid){
        $data['rowid'] = $rowid;
        $data['qty'] = 0;
        $this->cart->update($data);

        // show success message
        $this->session->set_flashdata('msg','Item Removed From Bill!!');
        redirect('sales/sell');
        }
    
    
    function reset_bill(){
        $this->cart->destroy();
        redirect('sales/sell');
    }
    
    
    function print_invoice($sales_id)
    {
        $data['sales_id'] = $sales_id;
        $this->load->view('sales/print_invoice', $data);
    }
    
    function listing()
    {
        $data['page'] = 'sales/sales_records_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    
    function receive_due($id)
    {
        $data['due_amount_paid_date'] = date('Y-m-d');
        $this->sales_model->update($data, $id);
        
        $this->session->set_flashdata('msg','Due Amount Received Successfully.');
        redirect('sales/listing');
        
    }
    
}
