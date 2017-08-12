
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Current Stock
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            
                            $current_stock_rows = $this->db->query("SELECT cs.id, product_code, product_name, price, quantity FROM products p JOIN product_code_price pcp ON p.id = pcp.product_id JOIN current_stock cs ON pcp.id = cs.product_code_price_id")->result_array();

                            
                            foreach ($current_stock_rows as $current_stock_row) {
                                ?>

                                <tr>
                                    <td><?= $current_stock_row['id'] ?></td>
                                    <td><?= $current_stock_row['product_code'] ?></td>
                                    <td><?= $current_stock_row['product_name'] ?></td>
                                    <td><?= $current_stock_row['price'] ?></td>
                                    <td><?= $current_stock_row['quantity'] ?></td>
                                </tr>
                                
                        <?php } ?>



                        </tbody>


                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
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