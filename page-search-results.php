<!doctype html>
<html lang="en">

<head>
<title>:: Lucid HR :: Search Results</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<meta name="description" content="Lucid Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>
<body class="theme-orange">

    <!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="assets/images/logo-icon.svg" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
            </div>

            <div class="navbar-brand">
                <a href="index.php"><img src="assets/images/logo.svg" alt="Lucid Logo" class="img-responsive logo"></a>                
            </div>
            
            <div class="navbar-right">
                <form id="navbar-search" class="navbar-form search-form">
                    <input value="" class="form-control" placeholder="Search here..." type="text">
                    <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                </form>               

                <div id="navbar-menu">
                    <ul class="nav navbar-nav">                        
                        <li><a href="app-events.php" class="icon-menu d-none d-sm-block d-md-none d-lg-block"><i class="icon-calendar"></i></a></li>
                        <li><a href="app-chat.php" class="icon-menu d-none d-sm-block"><i class="icon-bubbles"></i></a></li>
                        <li><a href="app-inbox.php" class="icon-menu d-none d-sm-block"><i class="icon-envelope"></i><span class="notification-dot"></span></a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="icon-bell"></i>
                                <span class="notification-dot"></span>
                            </a>
                            <ul class="dropdown-menu notifications animated shake">
                                <li class="header"><strong>You have 4 new Notifications</strong></li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-info text-warning"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text">Campaign <strong>Holiday Sale</strong> is nearly reach budget limit.</p>
                                                <span class="timestamp">10:00 AM Today</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>                               
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-like text-success"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text">Your New Campaign <strong>Holiday Sale</strong> is approved.</p>
                                                <span class="timestamp">11:30 AM Today</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                 <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-pie-chart text-info"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text">Website visits from Twitter is 27% higher than last week.</p>
                                                <span class="timestamp">04:00 PM Today</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-info text-danger"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text">Error on website analytics configurations</p>
                                                <span class="timestamp">Yesterday</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="footer"><a href="javascript:void(0);" class="more">See all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="icon-equalizer"></i></a>
                            <ul class="dropdown-menu user-menu menu-icon animated bounceIn">
                                <li class="menu-heading">ACCOUNT SETTINGS</li>
                                <li><a href="javascript:void(0);"><i class="icon-note"></i> <span>Basic</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-equalizer"></i> <span>Preferences</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-lock"></i> <span>Privacy</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-bell"></i> <span>Notifications</span></a></li>
                                <li class="menu-heading">BILLING</li>
                                <li><a href="javascript:void(0);"><i class="icon-credit-card"></i> <span>Payments</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-printer"></i> <span>Invoices</span></a></li>                                
                                <li><a href="javascript:void(0);"><i class="icon-refresh"></i> <span>Renewals</span></a></li>
                            </ul>
                        </li>
                        <li><a href="page-login.php" class="icon-menu"><i class="icon-login"></i></a></li>                        
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Jessica Doe</strong></a>                    
                    <ul class="dropdown-menu dropdown-menu-right account animated flipInY">
                        <li><a href="page-profile2.php"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.php"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="page-login.php"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h6>5+</h6>
                        <small>Experience</small>                        
                    </div>
                    <div class="col-4">
                        <h6>400+</h6>
                        <small>Employees</small>                        
                    </div>
                    <div class="col-4">                        
                        <h6>80+</h6>
                        <small>Clients</small>
                    </div>
                </div>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#hr_menu">HR</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#project_menu">Project</a></li>
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#sub_menu"><i class="icon-grid"></i></a></li>                
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
            </ul>
                
            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane animated fadeIn" id="hr_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li><a href="index.php"><i class="icon-speedometer"></i><span>HR Dashboard</span></a></li>
                            <li><a href="app-holidays.php"><i class="icon-list"></i>Holidays</a></li>
                            <li><a href="app-events.php"><i class="icon-calendar"></i>Events</a></li>
                            <li><a href="app-activities.php"><i class="icon-badge"></i>Activities</a></li>
                            <li><a href="app-social.php"><i class="icon-globe"></i>HR Social</a></li>
                            <li>
                                <a href="#Employees" class="has-arrow"><i class="icon-users"></i><span>Employees</span></a>
                                <ul>
                                    <li><a href="emp-all.php">All Employees</a></li>
                                    <li><a href="emp-leave.php">Leave Requests</a></li>
                                    <li><a href="emp-attendance.php">Attendance</a></li>
                                    <li><a href="emp-departments.php">Departments</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Accounts" class="has-arrow"><i class="icon-briefcase"></i><span>Accounts</span></a>
                                <ul>
                                    <li><a href="acc-payments.php">Payments</a></li>
                                    <li><a href="acc-expenses.php">Expenses</a></li>
                                    <li><a href="acc-invoices.php">Invoices</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Payroll" class="has-arrow"><i class="icon-credit-card"></i><span>Payroll</span></a>
                                <ul>
                                    <li><a href="payroll-payslip.php">Payslip</a></li>
                                    <li><a href="payroll-salary.php">Employee Salary</a></li>                                    
                                </ul>
                            </li>
                            <li>
                                <a href="#Report" class="has-arrow"><i class="icon-bar-chart"></i><span>Report</span></a>
                                <ul>
                                    <li><a href="report-expense.php">Expense Report</a></li>
                                    <li><a href="report-invoice.php">Invoice Report</a></li>                                    
                                </ul>
                            </li>
                            <li><a href="app-users.php"><i class="icon-user"></i>Users</a></li>
                            <li>
                                <a href="#Authentication" class="has-arrow"><i class="icon-lock"></i><span>Authentication</span></a>
                                <ul>
                                    <li><a href="page-login.php">Login</a></li>
                                    <li><a href="page-register.php">Register</a></li>
                                    <li><a href="page-lockscreen.php">Lockscreen</a></li>
                                    <li><a href="page-forgot-password.php">Forgot Password</a></li>
                                    <li><a href="page-404.php">Page 404</a></li>
                                    <li><a href="page-403.php">Page 403</a></li>
                                    <li><a href="page-500.php">Page 500</a></li>
                                    <li><a href="page-503.php">Page 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="tab-pane animated fadeIn" id="project_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li><a href="index2.php"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                            <li><a href="app-inbox.php"><i class="icon-envelope"></i>Inbox App</a></li>
                            <li><a href="app-chat.php"><i class="icon-bubbles"></i>Chat App</a></li>
                            <li>
                                <a href="#Projects" class="has-arrow"><i class="icon-list"></i><span>Projects</span></a>
                                <ul>
                                    <li><a href="project-add.php">Add Projects</a></li>
                                    <li><a href="project-list.php">Projects List</a></li>
                                    <li><a href="project-grid.php">Projects Grid</a></li>
                                    <li><a href="project-detail.php">Projects Detail</a></li>                                    
                                </ul>
                            </li>
                            <li>
                                <a href="#Clients" class="has-arrow"><i class="icon-user"></i><span>Clients</span></a>
                                <ul>
                                    <li><a href="client-add.php">Add Clients</a></li>
                                    <li><a href="client-list.php">Clients List</a></li>
                                    <li><a href="client-detail.php">Clients Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="project-team.php"><i class="icon-users"></i>Team</a></li>
                            <li><a href="app-taskboard.php"><i class="icon-tag"></i>Taskboard</a></li>
                            <li><a href="app-tickets.php"><i class="icon-screen-tablet"></i>Tickets</a></li>
                        </ul>                        
                    </nav>                    
                </div>
                <div class="tab-pane animated fadeIn active" id="sub_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li>
                                <a href="#Blog" class="has-arrow"><i class="icon-globe"></i> <span>Blog</span></a>
                                <ul>                                    
                                    <li><a href="blog-dashboard.php">Dashboard</a></li>
                                    <li><a href="blog-post.php">New Post</a></li>
                                    <li><a href="blog-list.php">Blog List</a></li>
                                    <li><a href="blog-details.php">Blog Detail</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#FileManager" class="has-arrow"><i class="icon-folder"></i> <span>File Manager</span></a>
                                <ul>                                    
                                    <li><a href="file-dashboard.php">Dashboard</a></li>
                                    <li><a href="file-documents.php">Documents</a></li>
                                    <li><a href="file-media.php">Media</a></li>
                                    <li><a href="file-images.php">Images</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Widgets" class="has-arrow"><i class="icon-puzzle"></i><span>Widgets</span></a>
                                <ul>
                                    <li><a href="widgets-statistics.php">Statistics Widgets</a></li>
                                    <li><a href="widgets-data.php">Data Widgets</a></li>
                                    <li><a href="widgets-chart.php">Chart Widgets</a></li>
                                    <li><a href="widgets-weather.php">Weather Widgets</a></li>
                                    <li><a href="widgets-social.php">Social Widgets</a></li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="#Pages" class="has-arrow"><i class="icon-docs"></i><span>Extra Pages</span></a>
                                <ul>
                                    <li><a href="page-blank.php">Blank Page</a> </li>
                                    <li><a href="page-profile2.php">Profile</a></li>
                                    <li><a href="page-gallery.php">Image Gallery <span class="badge badge-default float-right">v1</span></a> </li>
                                    <li><a href="page-gallery2.php">Image Gallery <span class="badge badge-warning float-right">v2</span></a> </li>
                                    <li><a href="page-timeline.php">Timeline</a></li>
                                    <li><a href="page-timeline-h.php">Horizontal Timeline</a></li>
                                    <li><a href="page-pricing.php">Pricing</a></li>
                                    <li><a href="page-invoices.php">Invoices</a></li>
                                    <li><a href="page-invoices2.php">Invoices <span class="badge badge-warning float-right">v2</span></a></li>
                                    <li class="active"><a href="page-search-results.php">Search Results</a></li>
                                    <li><a href="page-helper-class.php">Helper Classes</a></li>
                                    <li><a href="page-maintenance.php">Maintenance</a></li>
                                    <li><a href="page-testimonials.php">Testimonials</a></li>
                                    <li><a href="page-faq.php">FAQs</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i> <span>UI Elements</span></a>
                                <ul>
                                    <li><a href="ui-typography.php">Typography</a></li>
                                    <li><a href="ui-tabs.php">Tabs</a></li>
                                    <li><a href="ui-buttons.php">Buttons</a></li>
                                    <li><a href="ui-bootstrap.php">Bootstrap UI</a></li>
                                    <li><a href="ui-icons.php">Icons</a></li>
                                    <li><a href="ui-notifications.php">Notifications</a></li>
                                    <li><a href="ui-colors.php">Colors</a></li>
                                    <li><a href="ui-dialogs.php">Dialogs</a></li>                                    
                                    <li><a href="ui-list-group.php">List Group</a></li>
                                    <li><a href="ui-media-object.php">Media Object</a></li>
                                    <li><a href="ui-modals.php">Modals</a></li>
                                    <li><a href="ui-nestable.php">Nestable</a></li>
                                    <li><a href="ui-progressbars.php">Progress Bars</a></li>
                                    <li><a href="ui-range-sliders.php">Range Sliders</a></li>
                                    <li><a href="ui-treeview.php">Treeview</a></li>
                                </ul>
                            </li>                            
                            <li>
                                <a href="#forms" class="has-arrow"><i class="icon-pencil"></i> <span>Forms</span></a>
                                <ul>
                                    <li><a href="forms-validation.php">Form Validation</a></li>
                                    <li><a href="forms-advanced.php">Advanced Elements</a></li>
                                    <li><a href="forms-basic.php">Basic Elements</a></li>
                                    <li><a href="forms-wizard.php">Form Wizard</a></li>                                    
                                    <li><a href="forms-dragdropupload.php">Drag &amp; Drop Upload</a></li>                                    
                                    <li><a href="forms-cropping.php">Image Cropping</a></li>
                                    <li><a href="forms-summernote.php">Summernote</a></li>
                                    <li><a href="forms-editors.php">CKEditor</a></li>
                                    <li><a href="forms-markdown.php">Markdown</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Tables" class="has-arrow"><i class="icon-tag"></i> <span>Tables</span></a>
                                <ul>
                                    <li><a href="table-basic.php">Tables Example<span class="badge badge-info float-right">New</span></a> </li>
                                    <li><a href="table-normal.php">Normal Tables</a> </li>
                                    <li><a href="table-jquery-datatable.php">Jquery Datatables</a> </li>
                                    <li><a href="table-editable.php">Editable Tables</a> </li>
                                    <li><a href="table-color.php">Tables Color</a> </li>
                                    <li><a href="table-filter.php">Table Filter <span class="badge badge-info float-right">New</span></a> </li>
                                    <li><a href="table-dragger.php">Table dragger <span class="badge badge-info float-right">New</span></a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#charts" class="has-arrow"><i class="icon-bar-chart"></i> <span>Charts</span></a>
                                <ul>
                                    <li><a href="chart-morris.php">Morris</a> </li>
                                    <li><a href="chart-flot.php">Flot</a> </li>
                                    <li><a href="chart-chartjs.php">ChartJS</a> </li>                                    
                                    <li><a href="chart-jquery-knob.php">Jquery Knob</a> </li>                                        
                                    <li><a href="chart-sparkline.php">Sparkline Chart</a></li>
                                    <li><a href="chart-peity.php">Peity</a></li>
                                    <li><a href="chart-c3.php">C3 Charts</a></li>
                                    <li><a href="chart-gauges.php">Gauges</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Maps" class="has-arrow"><i class="icon-map"></i> <span>Maps</span></a>
                                <ul>
                                    <li><a href="map-google.php">Google Map</a></li>
                                    <li><a href="map-yandex.php">Yandex Map</a></li>
                                    <li><a href="map-jvectormap.php">jVector Map</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="tab-pane animated fadeIn" id="setting">
                    <div class="p-l-15 p-r-15">
                        <h6>Choose Skin</h6>
                        <ul class="choose-skin list-unstyled">
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>                   
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="orange" class="active">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                                <span>Blush</span>
                            </li>
                        </ul>
                        <hr>
                        <h6>General Settings</h6>
                        <ul class="setting-list list-unstyled">
                            <li>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <span>Report Panel Usag</span>
                                </label>
                            </li>
                            <li>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <span>Email Redirect</span>
                                </label>
                            </li>
                            <li>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" checked>
                                    <span>Notifications</span>
                                </label>                      
                            </li>
                            <li>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" checked>
                                    <span>Auto Updates</span>
                                </label>
                            </li>
                            <li>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <span>Offline</span>
                                </label>
                            </li>
                            <li>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" checked>
                                    <span>Location Permission</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>             
            </div>          
        </div>
    </div>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Search Results</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Search Results</li>
                        </ul>
                    </div>            
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <div class="bh_chart hidden-xs">
                            <div class="float-left m-r-15">
                                <small>Visitors</small>
                                <h6 class="mb-0 mt-1"><i class="icon-user"></i> 1,784</h6>
                            </div>
                            <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Visits</small>
                                <h6 class="mb-0 mt-1"><i class="icon-globe"></i> 325</h6>
                            </div>
                            <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Chats</small>
                                <h6 class="mb-0 mt-1"><i class="icon-bubbles"></i> 13</h6>
                            </div>
                            <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="input-group" id="adv-search">
                                <input type="text" class="form-control" placeholder="Search here..." />
                                <div class="input-group-btn">
                                    <div class="btn-group" role="group">
                                        <div class="dropdown dropdown-lg">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                    <label for="filter">Filter by</label>
                                                    <select class="form-control">
                                                        <option value="0" selected>All Lucid</option>
                                                        <option value="1">Featured</option>
                                                        <option value="2">Most popular</option>
                                                        <option value="3">Top rated</option>
                                                        <option value="4">Most commented</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group">                                                        
                                                        <input class="form-control" type="text" placeholder="Author" />
                                                    </div>
                                                    <div class="form-group">                                                        
                                                        <input class="form-control" type="text" placeholder="Contains the words" />
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                                </form>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary"><span class="icon-magnifier" aria-hidden="true"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body">                            
                            <ul class="nav nav-tabs-new m-b-20">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Web">Web</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Images">Images</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Videos">Videos</a></li>                                
                            </ul>                        
                            <p class="m-b-0">Search Result For "Bootstrap 4 admin"</p>
                            <strong> About 16,853 result ( 0.13 seconds)</strong>
                        </div>
                    </div>
                    <div class="tab-content padding-0">
                        <div class="tab-pane card active" id="Web">
                            <div class="body">
                                <h6 class="mb-0"><a target="_blank" href="javascript:void(0);">sQuare - Bootstrap 4 Light & Dark Admin with Free Angular5 + UI Kit</a></h6>
                                <small>https://themeforest.net/user/wraptheme/portfolio</small>
                                <p class="m-t-10">sQuare Admin is Material Design premium admin dashboard theme. It’s builded on popular Twitter Bootstrap4 framework. sQuare is fully based on HTML5 + CSS3 Standards. Is fully responsive and clean on every device and every browser.</p>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">AdminCC</a>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">Swift Admin</a>
                            </div>
                            <hr>
                            <div class="body">
                                <h6 class="mb-0"><a target="_blank" href="javascript:void(0);">InfiniO - Bootstrap 4 Admin Dashboard Template </a></h6>
                                <small>https://themeforest.net/user/wraptheme/portfolio</small>
                                <p class="m-t-10">InfiniO is fully professional, responsive, modern, multi-purpose and featured Admin template which can be used to create various website, Admin templates, Admin dashboards, Backend Websites, CMS, CRM or one can aldo build Blog, Business website and time line as well as portfolio. InfiniO Admin makes the development process easy and fast for you and aims to help you implement your idea to real time.</p>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">Oakleaf Admin</a>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">sQuare</a>
                            </div>
                            <hr>
                            <div class="body">
                                <h6 class="mb-0"><a target="_blank" href="javascript:void(0);">Compass - The ultimate Bootstrap 4 Admin Dashboard </a></h6>
                                <small>https://themeforest.net/user/wraptheme/portfolio</small>
                                <p class="m-t-10">Compass Admin is Material Design premium admin dashboard theme. It’s builded on popular Twitter Bootstrap4 framework. Compass is fully based on HTML5 + CSS3 Standards. Is fully responsive and clean on every device and every browser.</p>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">AdminCC</a>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">Oakleaf Admin</a>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">sQuare</a>
                            </div>
                            <hr>
                            <div class="body">
                                <h6 class="mb-0"><a target="_blank" href="javascript:void(0);">Alpino - Bootstrap 4 Admin Dashboard Template</a></h6>
                                <small>https://themeforest.net/user/wraptheme/portfolio</small>
                                <p class="m-t-10">15+ Dashboard, 100+ Integrated Plugins, 400+ Pages, Light and Dark Menu, The Multistep Form, Timeline view, Summermnote Editor, Image Cropping Tool, Easy to access Menu Styles</p>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">Oakleaf Admin</a>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">sQuare</a>
                                <a class="m-r-20" target="_blank" href="javascript:void(0);">AdminCC</a>
                            </div>
                            <hr>
                            <ul class="body pagination pagination-primary">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                            </ul>
                        </div>
                        <div class="tab-pane card" id="Images">
                            <div class="body text-center">
                                <div class="not_found">
                                    <h4 class="m-b-0">Sorry No result found.</h4>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane card" id="Videos">
                            <div class="body text-center">
                                <div class="not_found">
                                    <h4 class="m-b-0">Sorry No result found.</h4>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>
