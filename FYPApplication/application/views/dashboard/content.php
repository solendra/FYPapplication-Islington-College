
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard <small>Control panel</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row" id="main_row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- MAP & BOX PANE -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Products Lower than Minimum Stock Level</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        
                        <?php
                            $lower_than_minimum_stock_found = false;
                            $current_stock_rows = $this->db->query("SELECT p.id, product_name, minimum_stock_level, SUM(quantity) AS quantity FROM products p JOIN current_stock cs ON p.id = cs.product_id GROUP BY p.id;")->result_array();
                            foreach($current_stock_rows as $current_stock_row):
                                
                            if($current_stock_row['minimum_stock_level'] > $current_stock_row['quantity']):
                                $lower_than_minimum_stock_found = true;
                        ?>
                        
                        <div class="row minimum_stock_lower_products">
                            <div class="col-md-4"><b>Product:</b> <?=$current_stock_row['product_name']?></div>
                            <div class="col-md-4"><b>Available Quantity:</b> <?=$current_stock_row['quantity']?></div>
                            <div class="col-md-4"><b>Minimum Stock Level:</b> <?=$current_stock_row['minimum_stock_level']?></div>
                        </div>
                        
                        
                        <?php endif; endforeach; ?>
                        
                        
                        
                        
                        
                        
                            
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->

            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->


                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tax Settings</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        
                        <?php
                            $settings_rows = $this->settings_model->get();
                        ?>
                        
                        <b>Tax (%):</b> <?=$settings_rows[0]['tax']?> <br>
                        
                        <a href="<?=base_url('settings')?>">Change Settings</a>
                        
                        
                        
                        
                        
                    </div>
                </div>

            </div><!-- /.col -->
        </div>
           
    </section>
    
<script>
    $(function () {
        $("#example1").DataTable();
    });
</script>

<style>
    .minimum_stock_lower_products
    {
      margin-bottom: 20px;
      background: rgba(226, 23, 23, 0.62);
      padding: 20px;
      margin-left: 10px;
      margin-right: 10px;
      border-radius: 5px;
    }
</style>