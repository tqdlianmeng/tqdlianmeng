<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Cloud Admin | Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="/tqdlm/tqdlm/Public/Admin/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="/tqdlm/tqdlm/Public/Admin/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="/tqdlm/tqdlm/Public/Admin/css/responsive.css" >
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="/tqdlm/tqdlm/Public/Admin/js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link href="/tqdlm/tqdlm/Public/Admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="/tqdlm/tqdlm/Public/Admin/css/animatecss/animate.min.css" />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="/tqdlm/tqdlm/Public/Admin/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- TODO -->
	<link rel="stylesheet" type="text/css" href="/tqdlm/tqdlm/Public/Admin/js/jquery-todo/css/styles.css" />
	<!-- FULL CALENDAR -->
	<link rel="stylesheet" type="text/css" href="/tqdlm/tqdlm/Public/Admin/js/fullcalendar/fullcalendar.min.css" />
	
</head>
<body>
	<!-- HEADER -->
	<header class="navbar clearfix" id="header">
		<div class="container">
				<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<a href="index.html">
						<img src="/tqdlm/tqdlm/Public/Admin/img/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
					</a>
					<!-- /COMPANY LOGO -->
					<!-- TEAM STATUS FOR MOBILE -->
					<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>
					<!-- /TEAM STATUS FOR MOBILE -->
					<!-- SIDEBAR COLLAPSE -->
					<div id="sidebar-collapse" class="sidebar-collapse btn">
						<i class="fa fa-bars" 
							data-icon1="fa fa-bars" 
							data-icon2="fa fa-bars" ></i>
					</div>
					<!-- /SIDEBAR COLLAPSE -->
				</div>
				<!-- NAVBAR LEFT -->
				<ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">
					
				</ul>
				<!-- /NAVBAR LEFT -->
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav navbar-nav pull-right">
				
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user pull-right" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img alt="" src="/tqdlm/tqdlm/Public/Admin/img/avatars/avatar3.jpg" />
							<span class="username">管理员</span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
							<li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
							<li><a href="#"><i class="fa fa-eye"></i> Privacy Settings</a></li>
							<li><a href="login.html"><i class="fa fa-power-off"></i> Log Out</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- TEAM STATUS -->
		<div class="container team-status" id="team-status">
		  <div id="scrollbar">
			<div class="handle">
			</div>
		  </div>
		  <div id="teamslider">
			  <ul class="team-list">
				<li class="current">
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="/tqdlm/tqdlm/Public/Admin/img/avatars/avatar3.jpg" alt="" />
				  </span>
				  <span class="title">
					You
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 35%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 20%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 10%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">6</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">3</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">1</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="/tqdlm/tqdlm/Public/Admin/img/avatars/avatar1.jpg" alt="" />
				  </span>
				  <span class="title">
					Max Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 15%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 40%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 20%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">2</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">8</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">4</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="/tqdlm/tqdlm/Public/Admin/img/avatars/avatar2.jpg" alt="" />
				  </span>
				  <span class="title">
					Jane Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 65%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 10%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 15%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">10</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">3</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">4</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="/tqdlm/tqdlm/Public/Admin/img/avatars/avatar4.jpg" alt="" />
				  </span>
				  <span class="title">
					Ellie Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 5%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 48%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 27%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">1</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">6</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">2</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="/tqdlm/tqdlm/Public/Admin/img/avatars/avatar5.jpg" alt="" />
				  </span>
				  <span class="title">
					Lisa Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 21%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 20%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 40%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">4</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">5</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">9</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="/tqdlm/tqdlm/Public/Admin/img/avatars/avatar6.jpg" alt="" />
				  </span>
				  <span class="title">
					Kelly Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 45%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 21%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 10%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">6</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">3</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">1</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="/tqdlm/tqdlm/Public/Admin/img/avatars/avatar7.jpg" alt="" />
				  </span>
				  <span class="title">
					Jessy Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 7%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 30%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 10%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">1</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">6</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">2</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
				<li>
				  <a href="javascript:void(0);">
				  <span class="image">
					  <img src="/tqdlm/tqdlm/Public/Admin/img/avatars/avatar8.jpg" alt="" />
				  </span>
				  <span class="title">
					Debby Doe
				  </span>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" style="width: 70%">
						<span class="sr-only">35% Complete (success)</span>
					  </div>
					  <div class="progress-bar progress-bar-warning" style="width: 20%">
						<span class="sr-only">20% Complete (warning)</span>
					  </div>
					  <div class="progress-bar progress-bar-danger" style="width: 5%">
						<span class="sr-only">10% Complete (danger)</span>
					  </div>
					</div>
					<span class="status">
						<div class="field">
							<span class="badge badge-green">13</span> completed
							<span class="pull-right fa fa-check"></span>
						</div>
						<div class="field">
							<span class="badge badge-orange">7</span> in-progress
							<span class="pull-right fa fa-adjust"></span>
						</div>
						<div class="field">
							<span class="badge badge-red">1</span> pending
							<span class="pull-right fa fa-list-ul"></span>
						</div>
				    </span>
				  </a>
				</li>
			  </ul>
			</div>
		  </div>
		<!-- /TEAM STATUS -->
	</header>
	<!--/HEADER -->
	<div class="copyrights">Collect from <a href="http://www.mycodes.net/" >源码之家</a></div>
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						<div class="divide-20"></div>
						<!-- SEARCH BAR -->
						<div id="search-bar">
							<input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
						</div>
						<!-- /SEARCH BAR -->
						
						<!-- SIDEBAR QUICK-LAUNCH -->
						<!-- <div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
						
						<!-- SIDEBAR MENU -->
						<ul>
							<li class="active">
								<a href="index.html">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">新闻资讯</span>
								<span class="selected"></span>
								</a>					
							</li>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">赛事资讯</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="elements.html"><span class="sub-menu-text">添加赛事资讯</span></a></li><li><a class="" href="notifications.html"><span class="sub-menu-text">Hubspot Notifications</span></a></li>
									<li><a class="" href="buttons_icons.html"><span class="sub-menu-text">Buttons & Icons</span></a></li>
									<li><a class="" href="sliders_progress.html"><span class="sub-menu-text">Sliders & Progress</span></a></li>
									<li><a class="" href="typography.html"><span class="sub-menu-text">Typography</span></a></li>
									<li><a class="" href="tabs_accordions.html"><span class="sub-menu-text">Tabs & Accordions</span></a></li>
									<li><a class="" href="treeview.html"><span class="sub-menu-text">Treeview</span></a></li>
									<li><a class="" href="nestable_lists.html"><span class="sub-menu-text">Nestable Lists</span></a></li>
									<li class="has-sub-sub">
										<a href="javascript:;" class=""><span class="sub-menu-text">Third Level Menu</span>
										<span class="arrow"></span>
										</a>
										<ul class="sub-sub">
											<li><a class="" href="#"><span class="sub-sub-menu-text">Item 1</span></a></li>
											<li><a class="" href="#"><span class="sub-sub-menu-text">Item 2</span></a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<a class="" href="frontend_theme/index.html" target="_blank">
									<i class="fa fa-desktop fa-fw"></i> <span class="menu-text">活动资讯</span>
								</a>
							</li>

						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->
		<div id="main-content">
		<iframe id="iframe" src="" frameborder="0" name="f" style="width:100%;height:500px; border:0;"></iframe>
			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Box Settings</h4>
					</div>
					<div class="modal-body">
					  Here goes box setting content.
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="container">
				<div class="row">
					<block name = 'content'>
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.html">Home</a>
										</li>
										<li>Dashboard - shared on mycodes.net</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Dashboard</h3>
										<!-- DATE RANGE PICKER -->
										<span class="date-range pull-right">
											<div class="btn-group">
												<a class="js_update btn btn-default" href="#">Today</a>
												<a class="js_update btn btn-default" href="#">Last 7 Days</a>
												<a class="js_update btn btn-default hidden-xs" href="#">Last month</a>
												
												<a id="reportrange" class="btn reportrange">
													<i class="fa fa-calendar"></i>
													<span></span>
													<i class="fa fa-angle-down"></i>
												</a>
											</div>
										</span>
										<!-- /DATE RANGE PICKER -->
									</div>
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
						<div class="row">
							<!-- COLUMN 1 -->
							<div class="col-md-6">
								<div class="row">
								  <div class="col-lg-6">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-instagram fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number">6718</div>
												<div class="title">Likes</div>
												<span class="label label-success">
													26% <i class="fa fa-arrow-up"></i>
												</span>
										   </div>
										</div>
									 </div>
								  </div>
								  <div class="col-lg-6">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left blue">
												<i class="fa fa-twitter fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number">2724</div>
												<div class="title">Followers</div>
												<span class="label label-warning">
													5% <i class="fa fa-arrow-down"></i>
												</span>
										   </div>
										</div>
									 </div>
								  </div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="quick-pie panel panel-default">
											<div class="panel-body">
												<div class="col-md-4 text-center">
													<div id="dash_pie_1" class="piechart" data-percent="59">
														<span class="percent"></span>
													</div>
													<a href="#" class="title">New Visitors <i class="fa fa-angle-right"></i></a>
												</div>
												<div class="col-md-4 text-center">
													<div id="dash_pie_2" class="piechart" data-percent="73">
														<span class="percent"></span>
													</div>
													<a href="#" class="title">Bounce Rate <i class="fa fa-angle-right"></i></a>
												</div>
												<div class="col-md-4 text-center">
													<div id="dash_pie_3" class="piechart" data-percent="90">
														<span class="percent"></span>
													</div>
													<a href="#" class="title">Brand Popularity <i class="fa fa-angle-right"></i></a>
												</div>
											</div>
										</div>
									</div>
							   </div>
							</div>
							<!-- /COLUMN 1 -->
							
							<!-- COLUMN 2 -->
							<div class="col-md-6">
								<div class="box solid grey">
									<div class="box-title">
										<h4><i class="fa fa-dollar"></i>Revenue</h4>
										<div class="tools">
											<span class="label label-danger">
												20% <i class="fa fa-arrow-up"></i>
											</span>
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-up"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body">
										<div id="chart-revenue" style="height:240px"></div>
									</div>
								</div>
							</div>
							<!-- /COLUMN 2 -->
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   <!-- HERO GRAPH -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i> <span class="hidden-inline-mobile">Traffic & Sales</span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
											<ul class="nav nav-tabs">
												 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-search-plus"></i> <span class="hidden-inline-mobile">Select & Zoom Sales Chart</span></a></li>
												 <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> <span class="hidden-inline-mobile">Traffic Statistics</span></a></li>
											 </ul>
											 <div class="tab-content">
												 <div class="tab-pane fade in active" id="box_tab1">
													<!-- TAB 1 -->
													<div id="chart-dash" class="chart"></div>
													<hr class="margin-bottom-0">
												   <!-- /TAB 1 -->
												 </div>
												 <div class="tab-pane fade" id="box_tab2">
													<div class="row">
														<div class="col-md-8">
															<div class="demo-container">
																<div id="placeholder" class="demo-placeholder"></div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="demo-container" style="height:100px;">
																<div id="overview" class="demo-placeholder"></div>
															</div>
															<div class="well well-bottom">
																<h4>Month over Month Analysis</h4>
																<ol>
																	<li>Selection support makes it easy to construct flexible zooming schemes.</li>
																	<li>With a few lines of code, the small overview plot to the right has been connected to the large plot.</li>
																	<li>Try selecting a rectangle on either of them.</li>
																</ol>
															</div>
														</div>
													</div>
												</div>
											 </div>
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /HERO GRAPH -->
						<!-- NEW ORDERS & STATISTICS -->
						<div class="row">
							<!-- NEW ORDERS -->
							<div class="col-md-6">
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-columns"></i> <span class="hidden-inline-mobile">Sales Tab</span></h4>
									</div>
									<div class="box-body">
								<div class="tabbable header-tabs">
									<ul class="nav nav-tabs">
									   <li class="active"><a href="#sales" data-toggle="tab"><i class="fa fa-bookmark"></i> <span class="hidden-inline-mobile">New Orders</span></a></li>
									   <li><a href="#feed" data-toggle="tab"><i class="fa fa-rss"></i> <span class="hidden-inline-mobile">Recent Activities</span></a></li>
									</ul>
									<div class="tab-content">
									   <div class="tab-pane active" id="sales">
										  <div class="panel panel-default">
											  <div class="panel-body orders no-opaque">
												<div class="scroller" data-height="450px" data-always-visible="1" data-rail-visible="1">
													<ul class="list-unstyled">
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A14</strong> Rikki S. Stover</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 9, 2013" >Oct 9, 2013</abbr></p>
																																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$124.00</h4>
																<p>
																	<span class="label label-success arrow-in-right"><i class="fa fa-check"></i> Complete</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
																<span class="sr-only">85% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A15</strong> Scott Allen</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$235.00</h4>
																<p>
																	<span class="label label-warning arrow-in-right"><i class="fa fa-cog"></i> In Progress</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																<span class="sr-only">30% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A16</strong> Larry Wright</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$77.00</h4>
																<p>
																	<span class="label label-primary arrow-in-right"><i class="fa fa-archive"></i> Archived</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100" style="width: 97%;">
																<span class="sr-only">97% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A17</strong> John Dale</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$174.00</h4>
																<p>
																	<span class="label label-danger arrow-in-right"><i class="fa fa-star"></i> New</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
																<span class="sr-only">10% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A18</strong> MJ Perkins</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$68.00</h4>
																<p>
																	<span class="label label-info arrow-in-right"><i class="fa fa-truck"></i> In Transit</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
																<span class="sr-only">50% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A19</strong> Stephen Stover</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 9, 2013" >Oct 9, 2013</abbr></p>
																																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$124.00</h4>
																<p>
																	<span class="label label-success arrow-in-right"><i class="fa fa-check"></i> Complete</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
																<span class="sr-only">80% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A20</strong> Edward Lus</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$52.00</h4>
																<p>
																	<span class="label label-danger arrow-in-right"><i class="fa fa-star"></i> New</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
																<span class="sr-only">20% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A21</strong> Alice Mangrum</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$14.00</h4>
																<p>
																	<span class="label label-info arrow-in-right"><i class="fa fa-truck"></i> In Transit</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
																<span class="sr-only">65% Complete</span>
															  </div>
															</div>
														</li>
														<li class="clearfix">
															<div class="pull-left">
																<p>
																	<h5><strong>#A22</strong> Tamika Owens</h5>
																</p>
																<p><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr></p>
																
															</div>
															<div class="text-right pull-right">
																<h4 class="cost">$604.00</h4>
																<p>
																	<span class="label label-warning arrow-in-right"><i class="fa fa-cog"></i> In Progress</span>
																</p>
															</div>
															<div class="clearfix"></div>
															<div class="progress progress-sm">
															  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
																<span class="sr-only">75% Complete</span>
															  </div>
															</div>
														</li>
													</ul>
												</div>
											  </div>
											   <div class='text-center'>
												<ul class='pagination'>
												  <li class='disabled'>
													<a href='#'>
													  <i class='fa fa-angle-left'></i>
													</a>
												  </li>
												  <li class='active'>
													<a href='#'>
													  1
													</a>
												  </li>
												  <li>
													<a href='#'>2</a>
												  </li>
												  <li>
													<a href='#'>3</a>
												  </li>
												  <li>
													<a href='#'>4</a>
												  </li>
												  <li>
													<a href='#'>5</a>
												  </li>
												  <li>
													<a href='#'>
													  <i class='fa fa-angle-right'></i>
													</a>
												  </li>
												</ul>
											  </div>
											</div>
									   </div>
									   <div class="tab-pane" id="feed">
										  <div class="scroller" data-height="450px" data-always-visible="1" data-rail-visible="1">
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-check btn btn-info"></i>
													<a class="user" href="#"> John Doe </a>
													accepted your connection request.
													<br>
													<a href="#">View profile</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-picture-o btn btn-danger"></i>
													<a class="user" href="#"> Jack Doe </a>
													uploaded a new photo.
													<br>
													<a href="#">Take a look</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-edit btn btn-pink"></i>
													<a class="user" href="#"> Jess Doe </a>
													edited their skills.
													<br>
													<a href="#">Endorse them</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-bitcoin btn btn-yellow"></i>
													<a class="user" href="#"> Divine Doe </a>
													made a bitcoin payment.
													<br>
													<a href="#">Check your financials</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													6 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-dropbox btn btn-primary"></i>
													<a class="user" href="#"> Lisbon Doe </a>
													saved a new document to Dropbox.
													<br>
													<a href="#">Download</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													1 day ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-pinterest btn btn-inverse"></i>
													<a class="user" href="#"> Bob Doe </a>
													pinned a new photo to Pinterest.
													<br>
													<a href="#">Take a look</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													2 days ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-clock-o btn btn-success"></i>
													<a class="user" href="#"> John Doe </a>
													accepted your connection request.
													<br>
													<a href="#">View profile</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-heart btn btn-purple"></i>
													<a class="user" href="#"> Jack Doe </a>
													uploaded a new photo.
													<br>
													<a href="#">Take a look</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-gift btn btn-pink"></i>
													<a class="user" href="#"> Jess Doe </a>
													edited their skills.
													<br>
													<a href="#">Endorse them</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													5 hours ago
												</div>
											  </div>
											  <div class="feed-activity clearfix">
												<div>
													<i class="pull-left roundicon fa fa-random btn btn-yellow"></i>
													<a class="user" href="#"> Divine Doe </a>
													made a bitcoin payment.
													<br>
													<a href="#">Check your financials</a>
													
												</div>
												<div class="time">
													<i class="fa fa-clock-o"></i>
													6 hours ago
												</div>
											  </div>
										  </div>
									   </div>
									</div>
								</div>
									</div>
								</div>
							</div>
							<!-- /NEW ORDERS -->
							<!-- STATISTICS -->
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="box border inverse">
											<div class="box-title">
												<h4><i class="fa fa-money"></i>Sales Summary</h4>
												<div class="tools">												
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="remove">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</div>
											<div class="box-body">
												  <div class="sparkline-row">
													<span class="title">Total sales</span>
													<span class="value">$78,273</span>
													<span class="sparkline big" data-color="blue">16,7,23,13,12,11,15,4,19,18,4,24</span>
												  </div>
												  <div class="sparkline-row">
													<span class="title">Profit</span>
													<span class="value">$6,543</span>
													<span class="sparkline big" data-color="red">6,3,24,25,27,29,14,26,20,8,12,20</span>
												  </div>
												  <div class="sparkline-row">
													<span class="title">Orders</span>
													<span class="value">985</span>
													<span class="sparkline big" data-color="green">11,19,20,20,5,18,11,6,16,20,26,11</span>
												  </div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="box border purple">
											<div class="box-title">
												<h4><i class="fa fa-adjust"></i>Distribution Index</h4>
												<div class="tools">
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="remove">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</div>
											<div class="box-body">									
												  <div class="sparkline-row">
													<span class="title">Revenue distribution</span>
													<span class="value"><i class="fa fa-usd"></i> 25674</span>
													<span class="sparklinepie">16,7,23</span>
												  </div>
												  <div class="sparkline-row">
													<span class="title">Sales</span>
													<span class="value"><i class="fa fa-money"></i> 19 999,99</span>
													<span class="sparklinepie">6,3,24,25</span>
												  </div>
												  <div class="sparkline-row">
													<span class="title">Employee/ Dept</span>
													<span class="value"><i class="fa fa-user"></i> 645783</span>
													<span class="sparklinepie">11,19,20</span>
												  </div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /STATISTICS -->
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-body">
										<table class="table table-striped table-bordered table-hover">
										 <thead>
											<tr>
											   <th><i class="fa fa-user"></i> Client</th>
											   <th class="hidden-xs"><i class="fa fa-quote-left"></i> Sales Item</th>
											   <th><i class="fa fa-dollar"></i> Amount</th>
											   <th><i class="fa fa-bars"></i> Status</th>
											</tr>
										 </thead>
										 <tbody>
											<tr>
											   <td><a href="#">Fortune 500</a></td>
											   <td class="hidden-xs">Gold Level Virtual Server</td>
											   <td>$ 2310.23</td>
											   <td><span class="label label-success label-sm">Paid</span></td>
											</tr>
											<tr>
											   <td><a href="#">Cisco Inc.</a></td>
											   <td class="hidden-xs">Platinum Level Virtual Server</td>
											   <td>$ 5502.67</td>
											   <td><span class="label label-warning label-sm">Pending</span></td>
											</tr>
											<tr>
											   <td><a href="#">VMWare Ltd.</a></td>
											   <td class="hidden-xs">Hardware Switch</td>
											   <td>$ 3472.54</td>
											   <td><span class="label label-success label-sm">Paid</span></td>
											</tr>
											<tr>
											   <td><a href="#">Wall-Mart Stores</a></td>
											   <td class="hidden-xs">Branding & Marketing</td>
											   <td>$ 6653.25</td>
											   <td><span class="label label-success label-sm">Paid</span></td>
											</tr>
											<tr>
											   <td><a href="#">Exxon Mobil</a></td>
											   <td class="hidden-xs">UX and UI Services</td>
											   <td>$ 45645.45</td>
											   <td><span class="label label-danger label-sm">Overdue</span></td>
											</tr>
											<tr>
											   <td><a href="#">General Electric</a></td>
											   <td class="hidden-xs">Web Designing</td>
											   <td>$ 3432.11</td>
											   <td><span class="label label-warning label-sm">Pending</span></td>
											</tr>
										 </tbody>
									</table>
									</div>
								</div>
							</div>
						</div>
						<!-- /NEW ORDERS & STATISTICS -->
						<!-- CALENDAR & CHAT -->
						<div class="row">
							<!-- CALENDAR -->
							<div class="col-md-6">
								<div class="box border primary">
									<div class="box-title">
										<h4><i class="fa fa-calendar"></i>Calendar</h4>
										<div class="tools">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-up"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body">
										<div id='calendar'></div>
									</div>
								</div>
							</div>
							<!-- /CALENDAR -->
							<!-- CHAT -->
							<div class="col-md-6">
								<!-- BOX -->
								<div class="box border red chat-window">
									<div class="box-title">
										<h4><i class="fa fa-comments"></i>Chat Window</h4>
										<div class="tools">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-up"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body big">
										<div class="scroller" data-height="402px" data-always-visible="1" data-rail-visible="1">
											<ul class="media-list chat-list">
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object" alt="Generic placeholder image" src="/tqdlm/tqdlm/Public/Admin/img/chat/headshot1.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">John Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 9, 2013" >Oct 9, 2013</abbr> </span></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
													
												  </div>
												</li>
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="/tqdlm/tqdlm/Public/Admin/img/chat/headshot2.jpg">
												  </a>
												  <div class="pull-right media-body chat-pop mod">
													<h4 class="media-heading">You <span class="pull-left"><abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> <i class="fa fa-clock-o"></i></span></h4></h4>
													Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
												  </div>
												</li>
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="/tqdlm/tqdlm/Public/Admin/img/chat/headshot3.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">Tim Row <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="/tqdlm/tqdlm/Public/Admin/img/chat/headshot5.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">Jenny Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 10, 2013" >Oct 10, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="/tqdlm/tqdlm/Public/Admin/img/chat/headshot2.jpg">
												  </a>
												  <div class="pull-right media-body chat-pop mod">
													<h4 class="media-heading">You <span class="pull-left"><abbr class="timeago" title="Oct 11, 2013" >Oct 11, 2013</abbr> <i class="fa fa-clock-o"></i></span></h4></h4>
													Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
												  </div>
												</li>
												<li class="media">
												  <a class="pull-left" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="/tqdlm/tqdlm/Public/Admin/img/chat/headshot4.jpg">
												  </a>
												  <div class="media-body chat-pop">
													<h4 class="media-heading">Jess Doe <span class="pull-right"><i class="fa fa-clock-o"></i> <abbr class="timeago" title="Oct 12, 2013" >Oct 12, 2013</abbr> </span></h4></h4>
													<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
												  </div>
												</li>
												<li class="media">
												  <a class="pull-right" href="#">
													<img class="media-object"  alt="Generic placeholder image" src="/tqdlm/tqdlm/Public/Admin/img/chat/headshot2.jpg">
												  </a>
												  <div class="pull-right media-body chat-pop mod">
													<h4 class="media-heading">You <span class="pull-left"><abbr class="timeago" title="Oct 12, 2013" >Oct 12, 2013</abbr> <i class="fa fa-clock-o"></i></span></h4></h4>
													Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
												  </div>
												</li>
											</ul>
										</div>
										<div class="divide-20"></div>
										<div class="chat-form">
											<div class="input-group"> 
												<input type="text" class="form-control" placeholder="Type something...really, it works"> 
												<span class="input-group-btn"> <button class="btn btn-primary" type="button"><i class="fa fa-check"></i></button> </span> 
											</div>
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
							<!-- CHAT -->
						</div>
						<!-- /CALENDAR & CHAT -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
					</block>
				</div>
			</div>
		</div>
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="/tqdlm/tqdlm/Public/Admin/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="/tqdlm/tqdlm/Public/Admin/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="/tqdlm/tqdlm/Public/Admin/bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="/tqdlm/tqdlm/Public/Admin/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="/tqdlm/tqdlm/Public/Admin/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/sparklines/jquery.sparkline.min.js"></script>
	<!-- EASY PIE CHART -->
	<script src="/tqdlm/tqdlm/Public/Admin/js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/easypiechart/jquery.easypiechart.min.js"></script>
	<!-- FLOT CHARTS -->
	<script src="/tqdlm/tqdlm/Public/Admin/js/flot/jquery.flot.min.js"></script>
	<script src="/tqdlm/tqdlm/Public/Admin/js/flot/jquery.flot.time.min.js"></script>
    <script src="/tqdlm/tqdlm/Public/Admin/js/flot/jquery.flot.selection.min.js"></script>
	<script src="/tqdlm/tqdlm/Public/Admin/js/flot/jquery.flot.resize.min.js"></script>
    <script src="/tqdlm/tqdlm/Public/Admin/js/flot/jquery.flot.pie.min.js"></script>
    <script src="/tqdlm/tqdlm/Public/Admin/js/flot/jquery.flot.stack.min.js"></script>
    <script src="/tqdlm/tqdlm/Public/Admin/js/flot/jquery.flot.crosshair.min.js"></script>
	<!-- TODO -->
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/jquery-todo/js/paddystodolist.js"></script>
	<!-- TIMEAGO -->
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/timeago/jquery.timeago.min.js"></script>
	<!-- FULL CALENDAR -->
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/fullcalendar/fullcalendar.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="/tqdlm/tqdlm/Public/Admin/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="/tqdlm/tqdlm/Public/Admin/js/script.js"></script>
	
	<script>
		jQuery(document).ready(function() {		
			App.setPage("index");  //Set current page
			App.init();
		});
		

		
	</script>
	
	<!-- /JAVASCRIPTS -->
</body>
</html>