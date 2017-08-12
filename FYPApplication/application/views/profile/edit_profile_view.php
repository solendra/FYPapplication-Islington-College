
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Change Your Current Email/Password
    </h1>
</section>

<!-- Main content -->
<section class="content">

    
    
    <div id="main_row" class="row">
        <div class="col-xs-10">
            <div class="box">
                <div class="box-body">
                    
                    
                    <form role="form" method="post" id="edit_profile_form" action="<?=base_url('profile/edit_profile_action')?>">
                        
                        <?php
                            $users_rows = $this->users_model->get($this->session->userdata('id'));
                        ?>
                        
                        <div class="box-body">
                              <div class="form-group">
                                <label for="newEmail">Enter New Email</label>
                                <input type="email" class="form-control" id="newEmail" placeholder="Enter new email" name="email" value="<?=$users_rows[0]['email']?>">
                              </div>
                              <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword" placeholder="Password" name="password">
                              </div>
                              <div class="form-group">
                                <label for="reRewPassword">Re-Enter New Password</label>
                                <input type="password" class="form-control" id="reRewPassword" placeholder="Re-enter new Password" name="cpassword">
                              </div>

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                              <button class="btn btn-primary">Change</button>
                            </div>
                          </form>
                    
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /. col-->
    </div><!--row-->

</section>


<script>
    $(function () {
        
        $('#edit_profile_form').submit(function(e)
        {
            var email = $('#newEmail').val();
            var Password = $('#newPassword').val();
            var cPassword = $('#reRewPassword').val();
            
            // if form is not filled then show error
            if(email == '' && Password == '' && cPassword == '')
            {
                e.preventDefault();
                $.notify("Form is not filled.", {position: "right bottom"});
            }
            
            
            // if password is filled 
            // and password don't match to confirm password then show error message
            
            if(Password != '' || cPassword != '')
            {
                if(Password != cPassword)
                {
                    e.preventDefault();
                    $.notify("Password and Confirm Passowrd not match.", {position: "right bottom"});
                }
            }
        });
        
    });
</script>