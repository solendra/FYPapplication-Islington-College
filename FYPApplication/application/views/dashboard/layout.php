<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OM Furnishing Store</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <?php echo $this->load->view('dashboard/top_meta'); ?>

    </head>
    <body class="skin-purple sidebar-mini">
        <div class="wrapper">


                <?php echo $this->load->view('dashboard/header'); ?>

                <?php echo $this->load->view('dashboard/sidebar'); ?>
            
            
            <div class="content-wrapper">

                <?php if ($this->session->flashdata('msg')): ?>

                    <div class="alert alert-success alert-dismissible" role="alert" id="msg_div">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <?= $this->session->flashdata('msg'); ?>
                    </div>


                <?php elseif ($this->session->flashdata('err_msg')): ?>

                    <div class="alert alert-danger alert-dismissible" role="alert" id="err_msg_div">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <?= $this->session->flashdata('err_msg'); ?>
                    </div>

                <?php endif; ?>




                <?php
                if (isset($page))
                    $this->load->view($page);
                else
                    $this->load->view('dashboard/content');
                ?>


            </div><!-- /.content-wrapper -->

            <?php echo $this->load->view('dashboard/footer'); ?>

        </div><!-- ./wrapper -->


    </body>
    
</html>

