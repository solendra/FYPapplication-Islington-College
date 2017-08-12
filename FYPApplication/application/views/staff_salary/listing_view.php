
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pay Staff Salary
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="form-group" style="margin:2px 2px;">
                    </div> <!--/.form-group-->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Staff ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Pay</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $staffs_row = $this->db->get('staffs')->result_array();
                            foreach ($staffs_row as $staffs) {
                                ?>

                                <tr>
                                    <td><?= $staffs['id']; ?></td>
                                    <td><?= $staffs['first_name']; ?></td>
                                    <td><?= $staffs['last_name']; ?></td>
                                    <td><?= $staffs['position']; ?></td>
                                    <td><?= $staffs['salary']; ?></td>
                                    <td>
                                        <!--<a href="<?=base_url('staffs/edit/'.$staffs['id'])?>">Edit</a>-->
                                        
                                        <?php 
//                                        $school_info_rows = $this->school_info_model->get();
//                                        $install_date = $school_info_rows[0]['installed_date'];
                                        
                                        $created_date = $staffs['joined_date'];

                                        $current_date = date("Y-m-d", strtotime("+1 month"));

                                        $start    = (new DateTime($created_date))->modify('first day of this month');
                                        $end      = (new DateTime($current_date))->modify('first day of this month');
                                        $interval = DateInterval::createFromDateString('1 month');
                                        $period   = new DatePeriod($start, $interval, $end);

                                        foreach ($period as $dt):
                                    ?>
                                
                                    <?php
                                    
                                        $staff_salary_paid_rows = $this->staff_salary_paid_model->get(array('month' => $dt->format("Y-m"), 'staff_id' => $staffs['id']));
                                        
                                        // if salary is not paid
                                        if(count($staff_salary_paid_rows) == 0):
                                       
                                        
                                    ?>
                                    
                                        <a href="<?=base_url('staff_salary/pay_action/'.$staffs['id'].'/'.$dt->format("Y-m"))?>" class="btn btn-primary pay_salary_action table_button" ><?=$dt->format("Y-m");?></a><br><br>
                                    
                                    <?php endif; ?>
                                    
                                <?php endforeach;?>
                                    
                                    
                                    
                                    </td>
                                </tr>



                            <?php } ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Staff ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Pay</th>
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
        
        // pay salary 
        $('.pay_salary_action').click(function(e)
        {
           var r = confirm("Are you sure wan to pay Salary? Only full salary can be paid!!");
            if (r == true) {
            } else {
                e.preventDefault();
            }
           
        });
        
    });
</script>