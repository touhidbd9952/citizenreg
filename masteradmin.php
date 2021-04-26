<?php
    $brand = $this->mm->getSet('Company Name');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<base href="<?php echo base_url();?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BD Embassy</title>
    
	<link href="img/logo.jpg" rel="apple-touch-icon" sizes="96x96">
	<link href="img/logo.jpg" rel="icon" sizes="96x96" type="image/png">
	<link href="img/logo.jpg" rel="icon" sizes="32x32" type="image/png">
    
    <!--- Datatable ---->
    <link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    
    <!-- Bootstrap -->
    <link href="adminlte/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
    
    <!-- Font Awesome -->
    <link href="adminlte/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="adminlte/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="adminlte/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="adminlte/build/css/custom.min.css" rel="stylesheet">
  </head>
<style>
@media print {
    .no-print {
        display: none !important;
    }
	@page { margin: 0; }
  	body { margin: 1.6cm;font-size:16px }
	table{border:1px solid #CCC !important;}
}
</style>

<style>
.right_col{background:#fff !important;}
.site_title i {border: none;}
.input-group-addon {font-size: 12px;max-height: 38px;}
input,select{height:38px;}
.tox-tinymce{width:100%;}
.tox .tox-notification--warn, .tox .tox-notification--warning{display:none;}
.tox .tox-statusbar a{display:none;}
.position {max-width: 400px;margin: 0;}
</style>
   <?php
    	$isAdminLogin = $this->session->userdata('sid');
		if($isAdminLogin == "")
		{
			redirect('main/index');
		}
		$admintype = $this->session->userdata('admintype');
	?>
	
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col no-print">
          <div class="left_col scroll-view no-print">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo 'javascript:';?>" class="site_title"><i></i> <span><?php if(isset($brand)&&$brand != "") {echo $brand;}else{echo 'Brand Name';} ?></span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu no-print">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a <?php if(isset($menu)&& $menu=='registerview') echo "class='active-menu'";?> href="<?php echo "register_management/index";?>"><i class="fa fa-home"></i> Registration <span class="fa fa-chevron-right"></span></a></li>
                  
                  
                  
                  <!--<li><a><i class="fa fa-desktop"></i> Gallery Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a <?php if(isset($menu)&& $menu=='gallery_category') echo "class='active-menu'";?> href="<?php echo 'gallery_category_management/index'?>">Category</a></li>
                      <li><a <?php if(isset($menu)&& $menu=='gallery') echo "class='active-menu'";?> href="<?php echo "gallery_management/index";?>">Gallery</a></li>
                    </ul>
                  </li>-->
                  
                  
                  <li><a><i class="fa fa-edit"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php 
					  if($admintype == "superadmin")
					  {
					  ?>  
                    	<li><a <?php if(isset($menu)&& $menu=='admin_registration_form') echo "class='active-menu'";?>  href="<?php echo "admincontroller/admin_registration_form";?>">Create Admin</a></li>
                      <?php 
					  }
					  ?>  
                      
                        <li>
                        <a <?php if(isset($menu)&& $menu=='admin view') echo "class='active-menu'";?>  href="<?php echo "admincontroller/view_admin_list";?>">
						<?php 
						if($admintype == "superadmin")
						{
						?>
                        View Admin List
                        <?php 
						}
						else
						{
						?>
                        Admin Profile
                        <?php 
						}
						?>
                        </a>
                        </li>
                      
                      <?php 
					  if($admintype == "superadmin")
					  {
					  ?>  
                      <li><a <?php if(isset($menu)&& $menu=='login') echo "class='active-menu'";?>  href="<?php echo "admincontroller/change_admin";?>">SuperAdmin Settings</a></li>
                      <?php 
					  }
					  ?>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav no-print">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  
                  <li class="nav-item" style="padding-left: 15px;">
                    <a href="<?php echo "admincontroller/admin_logout";?>" >Logout</a>
                  </li>
                  
                  <li class="nav-item" style="padding-left: 15px;">
                    <a href="javascript:" >Admin: <?php echo $this->session->userdata('adminname');?>&nbsp;</a>
                  </li>
                  
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->





        <!-- page content -->
        <div class="right_col col-md-9" role="main" style="min-height:1332px !important;float:left;">
            <div class="row" style="">
                <div class="col-md-12">
                	<?php if(isset($container)) echo $container;?>  
                </div>
            </div>   
        </div>
        <!-- /page content -->









        <!-- footer content -->
        <footer class="no-print">
          <div class="pull-right">
            risingstarsjp © 2020. All Rights Reserved
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="adminlte/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="adminlte/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="adminlte/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="adminlte/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="adminlte/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="adminlte/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="adminlte/vendors/Flot/jquery.flot.js"></script>
    <script src="adminlte/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="adminlte/vendors/Flot/jquery.flot.time.js"></script>
    <script src="adminlte/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="adminlte/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="adminlte/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="adminlte/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="adminlte/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="adminlte/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="adminlte/vendors/moment/min/moment.min.js"></script>
    <script src="adminlte/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    
    <!-- Datatables -->
    <script src="adminlte/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="adminlte/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="adminlte/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="adminlte/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="adminlte/build/js/custom.min.js"></script>
  </body>
</html>