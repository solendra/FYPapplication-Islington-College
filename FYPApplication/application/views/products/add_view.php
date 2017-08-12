
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add Product
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">
        
                  <div class="col-md-12">
                     <div class="panel panel-white">
                                   <div class="panel-body">
                                    <form class="form-horizontal" method="post" action="<?=base_url('products/add_action');?>">
                                    <div class="col-md-12">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label for="product_name" class="col-sm-4 control-label">Product Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control string_only_validation" name="product_name" id="product_name" placeholder="Chair" required>
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <label for="product_name" class="col-sm-4 control-label">Minimum Stock Level</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control num_only_validation" name="minimum_stock_level" min="0" max="200" id="product_name" placeholder="Minimum Stock Level" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                           
                                        </div>
                                  
                                     
                                        <div class="form-group">
                                            <div class="col-sm-offset-5 col-sm-6">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
            
           </div>
    </div><!--row-->

</section>

