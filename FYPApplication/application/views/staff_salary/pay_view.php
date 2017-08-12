
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pay Salary to Staff
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">

        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('staff_salary/pay_action'); ?>" >
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="FIRST_NAME" class="col-sm-4 control-label" >Staff</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="staff_id" id="staffs_select_box">
                                            <option value="">Select Staff</option>
                                            <?php
                                                $staffs_rows = $this->staffs_model->get(NULL, 'id');
                                                foreach ($staffs_rows as $staffs_row) {
                                                   
                                            ?>
                                                <option value="<?=$staffs_row['id']?>"><?=$staffs_row['first_name'].' '.$staffs_row['last_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="amount" class="col-sm-4 control-label" >Amount</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Paying Amount" required>

                                    </div>
                                </div>
                            </div>

                        </div>
                        

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">Pay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div><!--row-->

</section>

<script>

    $(function()
    {
        $('#staffs_select_box').change(function()
        {
            var staff_id = $(this).val();
            var post_data = {staff_id: staff_id};
                $.ajax({
                    type: "post",
                    url: "<?=base_url('staff_salary/get_staff_salary_amount_ajax')?>",
                    data: post_data,
                    beforeSend: function () {
                    },
                    success: function (resp) {
//                        alert(resp);
                        $('#amount').val(resp);
                    }
                });

        });
    })
    
</script>