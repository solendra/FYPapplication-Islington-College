
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Suppliers List
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <div id="main_row" class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="form-group" style="margin:2px 2px;">
                        <a href="<?=base_url('suppliers/add')?>" class="btn btn-success" >Add New Supplier</a>
                    </div> <!--/.form-group-->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Supplier Id</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Supplier Reg Num</th>
                            <th>Created On</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $suppliers_row=$this->db->get('suppliers')->result_array();
                        foreach ($suppliers_row as $suppliers) {
                        ?>

                          <tr>
                            <td><?=$suppliers['id'];?></td>
                            <td><?=$suppliers['supplier_name'];?></td>
                            <td><?=$suppliers['contact'];?></td>
                            <td><?=$suppliers['address'];?></td>
                            <td><?=$suppliers['reg_no'];?></td>
                            <td><?=$suppliers['created_on'];?></td>
                            <td><a href="<?=base_url('suppliers/edit/'.$suppliers['id'])?>">Edit</a></td>
                          </tr>
                        <?php } ?>
                       </tbody>
                        <tfoot>
                         <tr>
                            <th>Supplier Id</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Supplier Reg Num</th>
                            <th>Created On</th>
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