
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Purchase Records
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    
                    <form class="form-inline" method="POST">
                              
                        <div class="form-group">
                            <input type="text" class="form-control" id="from" name="from" placeholder="From" value="<?=$this->input->post('from')?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="to" name="to" placeholder="To" value="<?=$this->input->post('to')?>" required>
                        </div>
                        <button type="submit" class="btn btn-success">Filter</button>
                    </form>
                    
                    <div class="btn-group" style="float: right; margin-right: 10px;  margin-top: -35px;">
                        <a href="#" class="btn btn-primary" onClick ="$('#example1').tableExport({type:'excel',escape:'false'}); return false;"> <i class="fa fa-download"></i> Download </a>
                    </div>

                    <br style="clear: both">

                            
                    <hr>


                    <script>
                        $(function() {
                          $( "#from" ).datepicker({
                            changeMonth: true,
                            dateFormat: "yy-mm-dd",
                            maxDate:0,
                            onClose: function( selectedDate ) {
                              $( "#to" ).datepicker( "option", "minDate", selectedDate );
                            }
                          });
                          $( "#to" ).datepicker({
                            defaultDate: "+1w",
                            changeMonth: true,
                            dateFormat: "yy-mm-dd",
                            maxDate:0,
                            onClose: function( selectedDate ) {
                              $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                            }
                          });
                        });
                    </script>
                            
                    
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Supplier</th>
                                <th>Product</th>
                                <th>Bought Price</th>
                                <th>Selling Price</th>
                                <th>Purchase Date</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                $where = NULL;
                                if($this->input->post())
                                {
                                    $from = $this->input->post('from');
                                    $to = $this->input->post('to');
                                    $where = "purchase_date >= '$from' AND purchase_date <= '$to'";
                                    
                                }
                            
                                $purchase_record_rows = $this->purchase_record_model->get($where, 'id', 'desc');
                                
                                
                                foreach ($purchase_record_rows as $purchase_record_row) {
                                ?>

                                <tr>
                                    <td><?= $purchase_record_row['id']; ?></td>
                                    <?php
                                        $suppliers_rows = $this->suppliers_model->get($purchase_record_row['supplier_id']);
                                    ?>
                                    <td><?= $suppliers_rows[0]['supplier_name']; ?></td>
                                    <?php
                                        $products_rows = $this->products_model->get($purchase_record_row['product_id']);
                                    ?>
                                    <td><?= $products_rows[0]['product_name']; ?></td>
                                    <td><?= $purchase_record_row['bought_price']; ?></td>
                                    <td><?= $purchase_record_row['selling_price']; ?></td>
                                    <td><?= $purchase_record_row['purchase_date']; ?></td>
                                    <td><?= $purchase_record_row['quantity']; ?></td>
                                </tr>



                            <?php } ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Supplier</th>
                                <th>Product</th>
                                <th>Bought Price</th>
                                <th>Selling Price</th>
                                <th>Purchase Date</th>
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