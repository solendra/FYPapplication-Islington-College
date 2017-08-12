
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Staffs List
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="form-group" style="margin:2px 2px;">
                        <a href="<?= base_url('staffs/add') ?>" class="btn btn-success" >Add New Staff</a>
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
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Joined Date</th>
                                <th>Salary</th>
                                <th>Action</th>
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
                                    <td><?= $staffs['contact']; ?></td>
                                    <td><?= $staffs['address']; ?></td>
                                    <td><?= $staffs['joined_date']; ?></td>
                                    <td><?= $staffs['salary']; ?></td>
                                    <td><a href="<?=base_url('staffs/edit/'.$staffs['id'])?>">Edit</a></td>
                                </tr>



                            <?php } ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Staff ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Position</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Joined Date</th>
                                <th>Salary</th>
                                <th>Action</th>
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