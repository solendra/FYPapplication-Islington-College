
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Staffs Salary Paid History
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="form-group" style="margin:2px 2px;">
                        <a href="<?= base_url('staff_salary') ?>" class="btn btn-success"> Pay Salary</a>
                    </div> <!--/.form-group-->
                </div><!-- /.box-header -->
                
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
                                <th>Payment ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Position</th>
                                <th>Month</th>
                                <th>Paid Amount</th>
                                <th>Paid Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
//                            $staffs_row = $this->db->get('staffs')->result_array();
                            
                            
                            
                            if($this->input->post())
                            {
                                $from = $this->input->post('from');
                                $to = $this->input->post('to');

                                $from_month = date('Y-m', strtotime($this->input->post('from')));
                                $to_month = date('Y-m', strtotime($this->input->post('to')));

                                $where = "(month >= '$from_month' AND month <= '$to_month') OR (month >= '$from' AND month <= '$to')";
                            }
                            else $where = NULL;
                            
                            
                            $staff_salary_paid_rows = $this->staff_salary_paid_model->get($where);
                            
                            foreach ($staff_salary_paid_rows as $staff_salary_paid_row) {
                                ?>

                                <tr>
                                    <td><?= $staff_salary_paid_row['id']; ?></td>
                                    
                                    <?php 
                                        // getting staff details
                                        $staffs_rows = $this->staffs_model->get($staff_salary_paid_row['staff_id']); 
                                        $staffs = $staffs_rows[0];
                                    ?>
                                    
                                    <td><?= $staffs['first_name']; ?></td>
                                    <td><?= $staffs['last_name']; ?></td>
                                    <td><?= $staffs['position']; ?></td>
                                    <td><?= $staff_salary_paid_row['month']; ?></td>
                                    <td><?= $staff_salary_paid_row['amount']; ?></td>
                                    <td><?= $staff_salary_paid_row['date']; ?></td>
                                </tr>



                            <?php } ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Payment ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Position</th>
                                <th>Month</th>
                                <th>Paid Amount</th>
                                <th>Paid Date</th>
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
        $("#example1").DataTable({
            aaSorting : [[0, 'desc']]
        });
    });
</script>