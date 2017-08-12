<header class="main-header">

        <!-- Logo -->
        <a href="<?=base_url()?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>OM</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>OM Furnishing</b> Store</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <li class="user_dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img src="images/photos/user-avatar.png" alt="" />-->
                        
                        <i class="fa fa-user"></i> <?=$this->session->userdata('email')?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li><a href="<?=base_url('profile/edit_profile')?>"><i class="fa fa-gear"></i> Profile</a></li>
                        <li><a href="<?=base_url('settings')?>"><i class="fa fa-gear"></i> Settings</a></li>
                        <li><a href="<?=base_url('dashboard/logout')?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
                    </ul>
                </li>
              
            </ul>
          </div>

        </nav>
      </header>