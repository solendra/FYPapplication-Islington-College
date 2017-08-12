
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add New Staff
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">

        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('staffs/add_action'); ?>" >
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="FIRST_NAME" class="col-sm-4 control-label" >First Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control string_only_validation" name="first_name" id="fname" placeholder="First Name" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="LAST_NAME" class="col-sm-4 control-label" >Last Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control string_only_validation" name="last_name" id="lname" placeholder="Last Name" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position" class="col-sm-4 control-label">Position</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control string_only_validation" name="position" id="position" placeholder="General Employee">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact" class="col-sm-4 control-label">Phone No</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control num_only_validation" name="contact" id="contact" placeholder="98XXXXXXXX" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ADDRESS" class="col-sm-4 control-label">Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control string_only_validation" name="address" id="address" placeholder="Kathmandu">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="JOINED DATE" class="col-sm-4 control-label">Joined Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control datepicker" name="joined_date" id="joined_date" placeholder="<?= date('Y-m-d'); ?>">

                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                $(function() {
                                  $('.datepicker').datepicker({
                                        dateFormat: 'yy-mm-dd',
                                    });
                                });
                            </script>

                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ADDRESS" class="col-sm-4 control-label">Salary</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control num_only_validation" name="salary" id="salary" placeholder="Salary">

                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div><!--row-->

</section>

