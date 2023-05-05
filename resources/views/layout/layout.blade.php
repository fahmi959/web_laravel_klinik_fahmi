
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Dashfox - Laravel Admin & Dashboard Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin template, admin dashboard, bootstrap dashboard template, bootstrap 4 admin template, laravel, php framework, php laravel, laravel framework, php mvc, laravel admin panel, laravel admin panel, laravel template, laravel bootstrap, blade laravel, best php framework"/>

        <!-- Title -->
		<title>@yield('title')</title>

        <!-- Favicon -->

		<link rel="icon" href="https://laravel.spruko.com/dashfox/ltr/assets/img/brand/favicon.png" type="image/x-icon"/>


		<!-- Bootstrap css -->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

		<!-- Icons css -->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/plugins/icons/icons.css" rel="stylesheet">

		<!--  Right-sidemenu css -->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--  Left-Sidebar css -->
		<link rel="stylesheet" href="https://laravel.spruko.com/dashfox/ltr/assets/css/sidemenu.css">

		<!--- Dashboard-2 css-->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/css/style.css" rel="stylesheet">
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/css/style-dark.css" rel="stylesheet">

		<!--- Color css-->
		<link id="theme" href="https://laravel.spruko.com/dashfox/ltr/assets/css/colors/color.css" rel="stylesheet">



		<!---Skinmodes css-->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/css/skin-modes.css" rel="stylesheet" />

		<!--- Animations css-->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/css/animate.css" rel="stylesheet">

		<!---Switcher css-->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/switcher/demo.css" rel="stylesheet">

    </head>

    <body  class="main-body light-theme app sidebar-mini active leftmenu-color">

        <!-- Loader -->
		<div id="global-loader">
			<img src="https://laravel.spruko.com/dashfox/ltr/assets/img/loader-2.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

        <!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="#">
                    <i class="fas fa-bars"></i>
				</a>
				</div>
			</div>
			<div class="main-sidemenu sidebar-scroll">
				<ul class="side-menu">
					<li class="slide">
						<a class="side-menu__item" href="/"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                     <i class="fas fa-users" style="font-size:20px; margin-right:5px"></i>
						<span class="side-menu__label">Data Pegawai</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="/data_dokter"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                    <i class="fas fa-user-md" style="font-size:22px; margin-right:10px"></i>
						<span class="side-menu__label">Data Dokter</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="/jadwal_praktek"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                    <i class="far fa-calendar-alt" style="font-size:20px; margin-right:12px"></i>
						<span class="side-menu__label">Jadwal Praktek Dokter</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="/data_pasien"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                    <i class="far fa-calendar-alt" style="font-size:20px; margin-right:12px"></i>
						<span class="side-menu__label">Data Pasien</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="/tempat_tidur"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                    <i class="fas fa-bed" style="font-size:17px; margin-right:9px"></i>
						<span class="side-menu__label">Data Tempat Tidur</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="/data_rawat"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                    <i class="fas fa-procedures" style="font-size:17px; margin-right:9px"></i>
						<span class="side-menu__label">Data Rawat</span></i></a>
							</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="/obat_perlengkapan"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
						<i class="fas fa-tablets" style="font-size:17px; margin-right:9px"></i>
						<span class="side-menu__label">Data Obat & Perlengkapan</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="/data_tindakan"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
						<i class="fas fa-file-medical-alt" style="font-size:22px; margin-right:10px"></i>
						<span class="side-menu__label">Data Tindakan</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="/data_pasien_ims"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                        <i class="fas fa-id-card " style="font-size:22px; margin-right:10px"></i>
                            <span class="side-menu__label">Data Pasien Ims</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="/data_puskesmas"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
                        <i class="fas fa-sitemap" style="font-size:22px; margin-right:10px"></i>
                            <span class="side-menu__label">Data Puskesmas</span></a>
                        </li>
				</ul>
				<div class="app-sidefooter">
					<a class="side-menu__item" href="/logout"><svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/></g></svg> <span class="side-menu__label">Logout</span></a>
				</div>
			</div>
		</aside>
		<!-- main-sidebar -->
		<!-- main-content -->
		<div class="main-content app-content">

        <!-- main-header -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left">
						<div class="app-sidebar__toggle d-md-none" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="fas fa-bars" style="font-size:25px"></i></a>
							<a class="close-toggle" href="#"><i class="fas fa-times"></i></a>
						</div>
					</div>
					<div class="main-header-right">
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""><img src="/gambar/profil.png">
									<div class="p-text d-none">
										<span class="p-name font-weight-bold">{{session('username')}}</span>
										<small class="p-sub-text">Administrator</small>
									</div>
								</a>
								<div class="dropdown-menu shadow">
									<div class="main-header-profile header-img">
										<div class="main-img-user"><img src="/gambar/profil.png"></div>
										<h6>{{session('username')}}</h6><span>Administrator</span>
									</div>
									<a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
								</div>
							</div>
							<div class="dropdown main-header-message right-toggle">
								<a class="nav-link pr-0" data-toggle="sidebar-right" data-target=".sidebar-right">
									<i class="fas fa-caret-down" style="font-size:20px"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /main-header -->
            <!-- container -->
                @yield('content')
            <!-- Container closed -->

		</div>
		<!-- main-content closed -->

        <!-- Sidebar-right-->
		<div class="sidebar sidebar-right sidebar-animate">
			<div class="panel panel-primary card mb-0 box-shadow">
				<div class="tab-menu-heading border-0 p-3">
					<div class="card-title mb-0">Profil Saya</div>
					<div class="card-options ml-auto">
						<a href="#" class="sidebar-remove"><i class="fas fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
					                    <div class="tab-content">
						<div class="tab-pane active" id="side1">
							<div class="card-body text-center">
								<div class="dropdown user-pro-body">
									<div class="">
										<img class="avatar avatar-xl brround mx-auto text-center" src="/gambar/profil.png"><span class="avatar-status profile-status bg-green"></span>
									</div>
									<div class="user-info mg-t-20">
										<h6 class="font-weight-semibold  mt-2 mb-0">{{session('username')}}</h6>
										<span class="mb-0 text-muted">Administrator</span>
									</div>
								</div>
							</div>
							<a class="dropdown-item d-flex pd-y-15 border-bottom" href="/logout">
								<div class="d-flex"><i class="fas fa-sign-out-alt mr-3 tx-20 mg-t-5 text-muted"></i>
									<div>
										<h6 class="mb-0">Log Out</h6>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Sidebar-right-->

        <!-- Footer opened -->
		<div class="main-footer ht-40">
			<div class="container-fluid pd-t-0-f ht-100p">
				<span>Copyright © 2021 <a href="#">RS Harapan Bangsa</a></span>
			</div>
		</div>
		<!-- Footer closed -->
        <!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fas fa-arrow-up"></i></a>

		<!-- Jquery js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/bootstrap/popper.min.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Ionicons js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/ionicons/ionicons.js"></script>

		<!-- Moment js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/moment/moment.js"></script>

		<!-- P-scroll js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

		<!-- Sidebar js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/side-menu/sidemenu.js"></script>

		<!-- Rating js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/rating/jquery.rating-stars.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/rating/jquery.barrating.js"></script>

		<!-- Suggestion js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/suggestion/jquery.input-dropdown.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/js/search.js"></script>

		<!-- Right-sidebar js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/sidebar/sidebar.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/sidebar/sidebar-custom.js"></script>

		<!-- Sticky js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/js/sticky.js"></script>

		<!-- eva-icons js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/eva-icons/eva-icons.min.js"></script>



		<!-- Eva-icons js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/js/eva-icons.min.js"></script>


		<!-- custom js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/js/custom.js"></script>

		<!-- Switcher js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/switcher/js/switcher.js"></script>

		<!-- font awesome -->
		<script src="https://kit.fontawesome.com/964ae5b0fd.js" crossorigin="anonymous"></script>
    </body>
</html>
