
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sales Records
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
                            maxDate:0,
                            dateFormat: "yy-mm-dd",
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
                                <th>Action</th>
                                <th>Bill No.</th>
                                <th>Customer Name</th>
                                <th>Customer Mobile No.</th>
                                <th>Customer Address</th>
                                <th>Total Items</th>
                                <th>Total Amount</th>
                                <th>Sales Date</th>
                                <th>Due Amount</th>
                                <th>Due Paid Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $where = NULL;
                                if($this->input->post())
                                {
                                    $from = $this->input->post('from');
                                    $to = $this->input->post('to');
                                    $where = "date_time >= '$from 00:00:00' AND date_time <= '$to 23:59:59'";
                                    
                                }
                            
                                $sales_rows = $this->sales_model->get($where, 'id', 'desc');
                                
                                foreach ($sales_rows as $sales_row) {
                                ?>

                                <tr>
                                    <td><?= $sales_row['id']; ?></td>
                                    <td><a href="<?=base_url('sales/print_invoice/'.$sales_row['id'])?>" target="_blank">Print</a> <?php if($sales_row['due_amount'] > 0 && $sales_row['due_amount_paid_date'] == NULL): ?>| <a href="<?=base_url('sales/receive_due/'.$sales_row['id'])?>">Receive Due</a><?php endif; ?></td>
                                    <td><?= $sales_row['bill_no']; ?></td>
                                    <td><?= $sales_row['customer_name']; ?></td>
                                    <td><?= $sales_row['customer_address']; ?></td>
                                    <td><?= $sales_row['customer_mobile_no']; ?></td>
                                    <td><?= $sales_row['total_items']; ?></td>
                                    <td><?= $sales_row['total_amount']; ?></td>
                                    <td><?= $sales_row['date_time']; ?></td>
                                    <td><?= $sales_row['due_amount']; ?><?php if($sales_row['due_amount'] > 0 && $sales_row['due_amount_paid_date'] != NULL) echo ' <b>(Paid)</b>' ?></td>
                                    <td><?= $sales_row['due_amount_paid_date']; ?></td>
                                </tr>



                            <?php } ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Action</th>
                                <th>Bill No.</th>
                                <th>Customer Name</th>
                                <th>Customer Mobile No.</th>
                                <th>Customer Address</th>
                                <th>Total Items</th>
                                <th>Total Amount</th>
                                <th>Sales Date</th>
                                <th>Due Amount</th>
                                <th>Due Paid Date</th>
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