<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OM Furnishing Store</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <?php echo $this->load->view('dashboard/top_meta'); ?>

    </head>
    <body>
        
        <style>
            
            @media print
            {    
                .no-print, .no-print *
                {
                    display: none !important;
                }
            }
            
        </style>
        
        <?php
            $sales_rows = $this->db->query("SELECT * FROM sales s JOIN sales_products sp ON s.id = sp.sales_id JOIN product_code_price pcp ON sp.product_code_price_id = pcp.id JOIN products p ON sp.product_id = p.id WHERE sales_id = $sales_id")->result_array();
        ?>

        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        OM Trade &amp; Suppliers
                        <small class="pull-right">Date: <?=date('Y-m-d', strtotime($sales_rows[0]['date_time']))?></small>
                    </h2>
                </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>OM Trade &amp; Suppliers</strong><br>
                        Gaurghat,Kathmandu<br>
                        Phone: 01-45432<br>

                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?=$sales_rows[0]['customer_name']?></strong><br>
                        <?=$sales_rows[0]['customer_address']?><br>
                        Phone: <?=$sales_rows[0]['customer_mobile_no']?>
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Bill No.:</b> <?=$sales_rows[0]['bill_no']?><br>             
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>    
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total_subtotal = 0;
                                foreach($sales_rows as $sales_row):
                            ?>
                            <tr>
                                <td><?=$sales_row['product_code']?></td>
                                <td><?=$sales_row['product_name']?></td>
                                <td><?=$sales_row['price']?></td>
                                <td><?=$sales_row['quantity']?></td>
                                <td><?php $total_subtotal += $sales_row['price']*$sales_row['quantity']; echo number_format($sales_row['price']*$sales_row['quantity'])?></td>
                            </tr>
                            
                            <?php endforeach; ?>
                            
                            
                        </tbody>
                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">

                <div class="col-xs-6">

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>NRs. <?=number_format($total_subtotal)?></td>
                                </tr>
                                
                                <?php 
                                    // if discount is given then show discount amount
                                    if($sales_row['discount'] > 0):
                                ?>
                                <tr>
                                    <th style="width:50%">Discount:</th>
                                    <td>NRs. <?=$sales_row['discount']?></td>
                                </tr>
                                <tr>
                                <?php endif; ?>
                                    
                                    <?php 
                                        $amount_after_discount = $total_subtotal - $sales_row['discount'];
                                    
                                        // getting tax from sales 
                                        $tax_percent = $sales_row['tax'];
                                    ?>
                                    
                                    <th>Tax (<?=$tax_percent?>.00%)</th>
                                    <td>NRs. <?php $tax = $amount_after_discount * $tax_percent / 100; echo number_format($tax)?></td>
                                </tr>


                                <tr>
                                    <th>Total:</th>
                                    <td>NRs. <?php echo number_format($amount_after_discount + $tax)?></td>
                                </tr>
                                
                                
                                
                            </tbody></table>
                        
                            <?php
                                if($sales_row['due_amount'] > 0):
                            ?>
                            <b>Due Amount:</b> NRs. <?php echo number_format($sales_row['due_amount'])?> <?php if($sales_row['due_amount'] > 0 && $sales_row['due_amount_paid_date'] != NULL) echo ' <b>(Paid)</b>' ?>
                            <?php endif; ?>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="#" onclick="do_print();" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
        </section>


    </body>
    
<script>
    function do_print() {
        window.print();
    }
</script>
    
</html>
