
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Products List
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="form-group" style="margin:2px 2px;">
                        <a href="<?=base_url('products/add')?>" class="btn btn-success" >Add New Products</a>
                    </div> <!--/.form-group-->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Minimum Stock Level</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            
                            $products_row = $this->products_model->get();

                            foreach ($products_row as $products) {
                                ?>

                                <tr>
                                    <td><?= $products['id'] ?></td>
                                    <td><?= $products['product_name'] ?></td>
                                    <td><?= $products['minimum_stock_level'] ?></td>
                                    <td><a href="<?=base_url('products/edit/'.$products['id'])?>">Edit</a></td>
                                </tr>
                                
                        <?php } ?>



                        </tbody>


                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /. col-->
    </div><!--row-->

</section>


<script>
    $(function () {
        $("#example1").DataTable();
    });
</script>