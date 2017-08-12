<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class=""><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears fa-lg"></i> <span>Set Up</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('products') ?>"><i class="fa fa-circle-o"></i> Products</a></li>
                    <!--<li><a href="#"><i class="fa fa-circle-o"></i> Customers</a></li>-->
                    <li><a href="<?= base_url('suppliers'); ?>"><i class="fa fa-circle-o"></i> Suppliers</a></li>
                    <li><a href="<?= base_url('staffs') ?>"><i class="fa fa-circle-o"></i> Staffs</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart fa-lg"></i> <span>Purchase Management</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('purchase') ?>"><i class="fa fa-circle-o"></i> Purchase</a></li>
                    <li><a href="<?= base_url('purchase/listing'); ?>"><i class="fa fa-circle-o"></i> Purchase Records</a></li>
                </ul>
            </li>


            <li>
                <a href="<?=base_url('current_stock')?>">
                    <i class="fa fa-archive fa-lg"></i> <span>Current Stock</span>
                </a>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-usd fa-lg"></i> <span>Sales Management</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('sales/sell') ?>"><i class="fa fa-circle-o"></i> Sell to Customer</a></li>
                    <li><a href="<?= base_url('sales/listing'); ?>"><i class="fa fa-circle-o"></i> Sales Records</a></li>
                </ul>
            </li>

<!--            <li>
                <a href="#">
                    <i class="fa fa-usd fa-lg"></i> <span>Sales Record</span>
                </a>
            </li>-->

<!--            <li>
                <a href="#">
                    <i class="fa fa-shopping-cart fa-lg"></i> <span>Bought Record</span>
                </a>
            </li>-->
<!--            <li>
                <a href="#">
                    <i class="fa fa-book fa-lg"></i> <span>Tax Record</span>

                </a>
            </li>-->


<!--            <li>
                <a href="<?= base_url('invoice'); ?>">
                    <i class="fa fa-file-text fa-lg"></i> <span>Invoice</span>
                </a>
            </li>-->




<!--            <li>
                <a href="<?= base_url('staff_salary'); ?>">
                    <i class="fa fa-money fa-lg"></i> <span>Staff Salary</span>
                </a>
            </li>-->
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money fa-lg"></i> <span>Staff Salary</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('staff_salary') ?>"><i class="fa fa-circle-o"></i> Pay Salary</a></li>
                    <li><a href="<?= base_url('staff_salary/paid_history') ?>"><i class="fa fa-circle-o"></i> Staff Salary Paid History</a></li>
                </ul>
            </li>

<!--            <li>
                <a href="#">
                    <i class="fa fa-table fa-lg"></i> <span>Export Csv File</span>
                </a>
            </li>-->


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>