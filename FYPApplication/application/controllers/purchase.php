<?php

class Purchase extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // if user is not logged in, then redirect it to login
        if(!$this->session->userdata('id')) redirect();
        
        $this->load->model('products_model');
        $this->load->model('suppliers_model');
        $this->load->model('purchase_record_model');
        $this->load->model('product_code_price_model');
        $this->load->model('current_stock_model');
    }
    
    function index()
    {
        $this->purchase();
    }
    
    function purchase()
    {
        $data['page'] = 'purchase/purchase_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function listing()
    {
        $data['page'] = 'purchase/purchase_records_view';
        $this->load->view('dashboard/layout', $data);
    }
    
    function purchase_action()
    {
        
        
        
        
        $post_data = $this->input->post();
        
        echo '<pre>';
        print_r($post_data);
        
        $supplier_id = $post_data['supplier_id'];
        $purchase_date = $post_data['purchase_date'];
        
        
        for($i = 0; $i < count($post_data['product_id']); $i++)
        {
            $data['supplier_id'] = $supplier_id;
            $data['product_id'] = $post_data['product_id'][$i];
            $data['bought_price'] = $post_data['bought_price'][$i];
            $data['selling_price'] = $post_data['selling_price'][$i];
            $data['quantity'] = $post_data['quantity'][$i];
            
            $data['purchase_date'] = $purchase_date;
            
            // insert purchase record data
            $this->purchase_record_model->insert($data);


            // check if same product same price is already inserted
            $product_code_price_rows = $this->product_code_price_model->get(array( 'product_id' => $data['product_id'], 'price' => $data['selling_price']));

            // if already exists get the product code
            // and add the quantity in current stock
            if(count($product_code_price_rows) > 0)
            {
                $product_code_price_id = $product_code_price_rows[0]['id'];


                // get the current quantity of that product
                $current_stock_rows = $this->current_stock_model->get(array('product_id' => $data['product_id'], 'product_code_price_id' => $product_code_price_id));

                // add new quantity to current stock quantity
                $current_stock_data['quantity'] = $current_stock_rows[0]['quantity'] + $data['quantity'];
                $this->current_stock_model->update($current_stock_data, $current_stock_rows[0]['id']);

            }
            else
            {
                // add current total product codes to 1
                $product_code = 'PR'.( $this->product_code_price_model->count_rows() + 1);
                $product_code_price_data['product_id'] = $data['product_id'];
                $product_code_price_data['price'] = $data['selling_price'];
                $product_code_price_data['product_code'] = $product_code;

                // insert to product code price table
                $product_code_price_id = $this->product_code_price_model->insert($product_code_price_data);

                // add product to current stock
                $current_stock_data['product_id'] = $data['product_id'];
                $current_stock_data['quantity'] = $data['quantity'];
                $current_stock_data['product_code_price_id'] = $product_code_price_id;

                $this->current_stock_model->insert($current_stock_data);


            }
            
        }
        

        // show success message
        $this->session->set_flashdata('msg','Product Purchased successfully!!');
        redirect('purchase/listing');
    }
    
    

}
