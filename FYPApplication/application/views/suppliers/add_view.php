
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add Supplier
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">

        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('suppliers/add_action'); ?>" >
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="FIRST_NAME" class="col-sm-4 control-label" >Supplier Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control string_only_validation" name="supplier_name" id="supplier_name" placeholder="Supplier Name" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="LAST_NAME" class="col-sm-4 control-label" >Contact</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control num_only_validation" name="contact" id="contact" placeholder="Contact" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position" class="col-sm-4 control-label">Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control string_only_validation" name="address" id="address" placeholder="Address" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact" class="col-sm-4 control-label">Reg. No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control num_and_string_only_validation" name="reg_no" id="reg_no" placeholder="Supplier Registration No." required>

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

