<?php
    include '../connection.php';
	include '../tgl_indo_helper.php';
	session_start();

	if (!isset($_SESSION['petugas']))
	{
	  echo "<script type = \"text/javascript\">
	  window.location = (\"../index.php\");
	  </script>";
	
	}
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Petugas</title>

    <link rel="apple-touch-icon" href="../assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo/Logo-Apple.png">
	<link href="../assets/css/fonts/css93c2.css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

    <!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<!-- END: Custom CSS-->

    <!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="../assets/css/core/menu/menu-types/vertical-menu.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/core/colors/palette-gradient.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/core/colors/palette-gradient.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/pages/chat-application.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/pages/dashboard-analytics.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/plugins/pickers/daterange/daterange.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/plugins/animate/animate.min.css">
	<!-- END: Page CSS-->

    <!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-extended.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/colors.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/components.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/line-awesome/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/line-awesome/1.1/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/feather/style.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/simple-line-icons/style.min.css">
	<!-- END: Theme CSS-->

    <!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/vendors.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/forms/toggle/switchery.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/plugins/forms/switch.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/core/colors/palette-switch.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/charts/chartist.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/charts/chartist-plugin-tooltip.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/tables/datatable/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/pickers/daterange/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/pickers/pickadate/default.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/pickers/pickadate/default.date.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/pickers/pickadate/default.time.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/css/forms/selects/select2.min.css">

	<link rel="stylesheet" href="../assets/css/plugins/easy-autocomplete/easy-autocomplete.min.css">
	<link rel="stylesheet" href="../assets/css/plugins/easy-autocomplete/easy-autocomplete.themes.min.css">
	<!-- END: Vendor CSS-->

</head>
<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu"
	  data-color="bg-gradient-x-purple-blue" data-col="2-columns">

<!-- BEGIN: Header-->
<nav
	class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light d-print-none">
	<div class="navbar-wrapper">
		<div class="navbar-container content">
			<div class="collapse navbar-collapse show" id="navbar-mobile">
				<ul class="nav navbar-nav mr-auto float-left">
					<li class="nav-item mobile-menu d-md-none mr-auto"><a
							class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
								class="ft-menu font-large-1"></i></a></li>
					<li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
															  href="#"><i class="ft-menu"></i></a></li>
					<li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
								class="ficon ft-maximize"></i></a></li>
				</ul>
				<ul class="nav navbar-nav float-right">
					<li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
																   href="#" data-toggle="dropdown"> <span
								class="avatar avatar-online"><img
									src="../assets/images/portrait/small/profil-circle-512.png"
									alt="avatar"></span></a>
						
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion d-print-none menu-shadow " data-scroll-to-active="true"
	 data-img="../assets/images/backgrounds/04.jpg">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item mr-auto"><a class="navbar-brand" href="">
					<img class="brand-logo"
						 alt="Chameleon admin logo"
						 src="../assets/images/logo/Logo-Apple.png"/>
					<h3 class="brand-text"> Petugas</h3></a></li>
			<li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
		</ul>
	</div>
	<div class="navigation-background"></div>
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class="nav-item"><a
					href="../petugas/dashboard.php"><i class="ft-home"></i><span class="menu-title"
																					 data-i18n="">Dashboard</span></a>
			</li>
			
			
			<li class=" nav-item"><a
					href="../petugas/transaksi_pembayaran.php"><i class="icon-wallet"></i><span class="menu-title"
																					data-i18n="">Transaksi</span></a>
			</li>
			<li class=" nav-item"><a
					href="../petugas/history_pembayaran.php"><i class="ft-calendar"></i><span class="menu-title"
																					  data-i18n="">History</span></a>
			</li>
			<li>
					<a class="menu-item" href="logout.php"><i class="ft-power"></i>
									Logout</a>
					</li>
			
		</ul>
	</div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content d-print-none">
	<div class="content-wrapper">
		<div class="content-wrapper-before d-print-none">
        </div>
		<div class="content-header row d-print-none">
            
		</div>
		<div class="content-body d-print-none"><!-- Revenue, Hit Rate & Deals -->

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Customizer-->
<div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block d-print-none"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-primary box-shadow-3" href="#" id="customizer-toggle-setting" style="margin-top: 80%"><i class="ft-settings font-medium-3 spinner white"></i></a>
	<div class="customizer-content p-2">
		<h5 class="mt-1 mb-1 text-bold-500">Navbar Color Options</h5>
		<div class="navbar-color-options clearfix">
			<div class="gradient-colors mb-1 clearfix">
				<div class="bg-gradient-x-purple-blue navbar-color-option" data-bg="bg-gradient-x-purple-blue" title="bg-gradient-x-purple-blue"></div>
				<div class="bg-gradient-x-purple-red navbar-color-option" data-bg="bg-gradient-x-purple-red" title="bg-gradient-x-purple-red"></div>
				<div class="bg-gradient-x-blue-green navbar-color-option" data-bg="bg-gradient-x-blue-green" title="bg-gradient-x-blue-green"></div>
				<div class="bg-gradient-x-orange-yellow navbar-color-option" data-bg="bg-gradient-x-orange-yellow" title="bg-gradient-x-orange-yellow"></div>
				<div class="bg-gradient-x-blue-cyan navbar-color-option" data-bg="bg-gradient-x-blue-cyan" title="bg-gradient-x-blue-cyan"></div>
				<div class="bg-gradient-x-red-pink navbar-color-option" data-bg="bg-gradient-x-red-pink" title="bg-gradient-x-red-pink"></div>
			</div>
			<div class="solid-colors clearfix">
				<div class="bg-primary navbar-color-option" data-bg="bg-primary" title="primary"></div>
				<div class="bg-success navbar-color-option" data-bg="bg-success" title="success"></div>
				<div class="bg-info navbar-color-option" data-bg="bg-info" title="info"></div>
				<div class="bg-warning navbar-color-option" data-bg="bg-warning" title="warning"></div>
				<div class="bg-danger navbar-color-option" data-bg="bg-danger" title="danger"></div>
				<div class="bg-blue navbar-color-option" data-bg="bg-blue" title="blue"></div>
			</div>
		</div>

		<hr>

		<h5 class="my-1 text-bold-500">Layout Options</h5>
		<div class="row">
			<div class="col-12">
				<div class="d-inline-block custom-control custom-radio mb-1 col-4">
					<input type="radio" class="custom-control-input bg-primary" name="layouts" id="default-layout" checked>
					<label class="custom-control-label" for="default-layout">Default</label>
				</div>
				<div class="d-inline-block custom-control custom-radio mb-1 col-4">
					<input type="radio" class="custom-control-input bg-primary" name="layouts" id="fixed-layout">
					<label class="custom-control-label" for="fixed-layout">Fixed</label>
				</div>
				<div class="d-inline-block custom-control custom-radio mb-1 col-4">
					<input type="radio" class="custom-control-input bg-primary" name="layouts" id="static-layout">
					<label class="custom-control-label" for="static-layout">Static</label>
				</div>
				<div class="d-inline-block custom-control custom-radio mb-1">
					<input type="radio" class="custom-control-input bg-primary" name="layouts" id="boxed-layout">
					<label class="custom-control-label" for="boxed-layout">Boxed</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="d-inline-block custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input bg-primary" name="right-side-icons" id="right-side-icons">
					<label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
				</div>
			</div>
		</div>

		<hr>

		<h5 class="mt-1 mb-1 text-bold-500">Sidebar menu Background</h5>
		<!-- <div class="sidebar-color-options clearfix">
            <div class="bg-black sidebar-color-option" data-sidebar="menu-dark" title="black"></div>
            <div class="bg-white sidebar-color-option" data-sidebar="menu-light" title="white"></div>
        </div> -->
		<div class="row sidebar-color-options ml-0">
			<label for="sidebar-color-option" class="card-title font-medium-2 mr-2">White Mode</label>
			<div class="text-center mb-1">
				<input type="checkbox" id="sidebar-color-option" class="switchery" data-size="xs" />
			</div>
			<label for="sidebar-color-option" class="card-title font-medium-2 ml-2">Dark Mode</label>
		</div>

		<hr>

		<label for="collapsed-sidebar" class="font-medium-2">Menu Collapse</label>
		<div class="float-right">
			<input type="checkbox" id="collapsed-sidebar" class="switchery" data-size="xs" />
		</div>

		<hr>

		<!--Sidebar Background Image Starts-->
		<h5 class="mt-1 mb-1 text-bold-500">Sidebar Background Image</h5>
		<div class="cz-bg-image row">
			<div class="col mb-3">
				<img src="../assets/images/backgrounds/04.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
			</div>
			<div class="col mb-3">
				<img src="../assets/images/backgrounds/01.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
			</div>
			<div class="col mb-3">
				<img src="../assets/images/backgrounds/02.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
			</div>
			<div class="col mb-3">
				<img src="../assets/images/backgrounds/05.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
			</div>
		</div>
		<!--Sidebar Background Image Ends-->

		<!--Sidebar BG Image Toggle Starts-->
		<div class="sidebar-image-visibility">
			<div class="row ml-0">
				<label for="toggle-sidebar-bg-img" class="card-title font-medium-2 mr-2">Hide Image</label>
				<div class="text-center mb-1">
					<input type="checkbox" id="toggle-sidebar-bg-img" class="switchery" data-size="xs" checked />
				</div>
				<label for="toggle-sidebar-bg-img" class="card-title font-medium-2 ml-2">Show Image</label>
			</div>
		</div>
		<!--Sidebar BG Image Toggle Ends-->

		<hr>

		<div class="row mb-2">
			<!-- <div class="col">
                <a href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" class="btn btn-danger btn-block box-shadow-1" target="_blank">Buy Now</a>
            </div> -->
			<div class="col">
				<a href="https://themeselection.com/" class="btn btn-primary btn-block box-shadow-1" target="_blank">More Themes</a>
			</div>
		</div>
		<div class="text-center">
			<button id="twitter" class="btn btn-social-icon btn-twitter sharrre mr-1"><i class="la la-twitter"></i></button>
			<button id="facebook" class="btn btn-social-icon btn-facebook sharrre mr-1"><i class="la la-facebook"></i></button>
			<button id="google" class="btn btn-social-icon btn-google sharrre"><i class="la la-google"></i></button>
		</div>
	</div>
</div>
<!-- End: Customizer-->





<!-- BEGIN: Vendor JS-->
<script src="../assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="../assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="../assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
<script src="../assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
<script src="../assets/vendors/js/pickers/pickadate/picker.js" type="text/javascript"></script>
<script src="../assets/vendors/js/pickers/pickadate/picker.date.js" type="text/javascript"></script>
<script src="../assets/vendors/js/pickers/pickadate/picker.time.js" type="text/javascript"></script>
<script src="../assets/vendors/js/pickers/pickadate/legacy.js" type="text/javascript"></script>
<script src="../assets/vendors/js/pickers/dateTime/moment-with-locales.min.js" type="text/javascript"></script>
<script src="../assets/vendors/js/pickers/daterange/daterangepicker.js" type="text/javascript"></script>

<script src="../assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="../assets/js/core/app.min.js" type="text/javascript"></script>
<script src="../assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="../assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="../assets/js/scripts/pages/dashboard-analytics.min.js" type="text/javascript"></script>
<script src="../assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="../assets/js/scripts/tables/datatables/datatable-basic.min.js" type="text/javascript"></script>

<script src="../assets/js/scripts/forms/select/form-select2.min.js" type="text/javascript"></script>

<script src="../assets/js/scripts/popover/popover.min.js" type="text/javascript"></script>

<script src="../assets/js/scripts/easy-autocomplete/jquery.easy-autocomplete.min.js"></script>

<script src="../assets/js/core/sigaka.js" type="text/javascript"></script>
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>

<?php
    include '../footer.php';
?>
