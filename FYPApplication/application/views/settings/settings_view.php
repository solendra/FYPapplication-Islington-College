
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tax Rate Settings
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">
        <div class="col-xs-10">
            <div class="box">
                <div class="box-body">
                    
                    <form role="form" method="post" action="<?=base_url('settings/edit_settings_action')?>">
                            <div class="box-body">
                              <?php $settings_rows = $this->settings_model->get(); ?>
                                
                              <div class="form-group">
                                <label for="tax">Tax Rate (%)</label>
                                <input type="number" class="form-control num_only_validation" min="1" max="100" id="tax" name="tax" value="<?=$settings_rows[0]['tax']?>" required="" autofocus>
                              </div>
                                
                              
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                              <button class="btn btn-primary">Update</button>
                            </div>
                          </form>
                    
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /. col-->
    </div><!--row-->

</section>
