<?php
include('account-check.php');

if(isset($_POST["Button_Add_Own"]))
{
    include('db.php');
    $V_Check_UserID = "";
    $V_AO_ID = $_SESSION['S_User_UserID'];
    $V_AO_Type = $_POST['AOM-Type'];
    $V_AO_StartDate = date("Y-m-d", strtotime($_POST['AOM-StartDate']));
    $V_AO_EndDate = date("Y-m-d", strtotime($_POST['AOM-EndDate']));
    $V_AO_Reason = $_POST['AOM-Reason'];
    $V_AO_Date_Decision = date("Y-m-d");

    $sql = "INSERT INTO `users_leave_requests`(`Leave_UserID`, `Leave_TypeID`, `Leave_StartDate`, `Leave_EndDate`, `Leave_Reason`, `Leave_Status`,`Leave_Date_Requested`) 
    VALUES ('$V_AO_ID','$V_AO_Type','$V_AO_StartDate','$V_AO_EndDate','$V_AO_Reason','1','$V_AO_Date_Decision')";
    
    if ($conn->query($sql) === TRUE) {
        header("Refresh:0");
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
}
if(isset($_POST["Button_Add_Other"]))
{
    include('db.php');
    $V_AO_ID = $_POST['AO-Name'];
    $V_AO_Type = $_POST['AO-Type'];
    $V_AO_StartDate = date("Y-m-d", strtotime($_POST['AO-StartDate']));
    $V_AO_EndDate = date("Y-m-d", strtotime($_POST['AO-EndDate']));
    $V_AO_Reason = $_POST['AO-Reason'];
    $V_AO_Status = $_POST['AO-Status'];
    $V_AO_Date_Decision = date("Y-m-d");

    $sql = "INSERT INTO `users_leave_requests`(`Leave_UserID`, `Leave_TypeID`, `Leave_StartDate`, `Leave_EndDate`, `Leave_Reason`, `Leave_Status`,`Leave_Date_Requested`) 
    VALUES ('$V_AO_ID','$V_AO_Type','$V_AO_StartDate','$V_AO_EndDate','$V_AO_Reason','$V_AO_Status','$V_AO_Date_Decision')";
    $sql;
    if ($conn->query($sql) === TRUE) {
        //header("Refresh:0");
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
}
if(isset($_POST["Button_Edit_Own"]))
{
    include('db.php');
    $V_Check_UserID = "";
    $V_EO_ID = $_POST['EOM-ID'];
    if($V_EO_ID == $_SESSION['S_User_UserID'])
    {
        $V_Check_UserID = $_POST['EOM-ID'];
    }
    $V_EO_Type = $_POST['EOM-Type'];
    $V_EO_StartDate = $_POST['EOM-StartDate'];
    $V_EO_EndDate = $_POST['EOM-EndDate'];
    $V_EO_Reason = $_POST['EOM-Reason'];
    $V_EO_RequestID = $_POST['EOM-RequestID'];
    
    $sql = "UPDATE `users_leave_requests` SET `Leave_TypeID`='$V_EO_Type',`Leave_StartDate`='$V_EO_StartDate', `Leave_EndDate`='$V_EO_EndDate',
    `Leave_Reason`='$V_EO_Reason' WHERE `Leave_UserID` = '$V_Check_UserID' AND `Leave_RequestID` = '$V_EO_RequestID' ";
    
    if ($conn->query($sql) === TRUE) {
        header("emp-leave.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
}

if(isset($_POST["Button_Delete_Own"]))
{
    include('db.php');
    $V_Check_UserID = "";
    $V_EO_ID = $_POST['EOM-ID'];
    $V_EO_RequestID = $_POST['EOM-RequestID'];
    if($V_EO_ID == $_SESSION['S_User_UserID'])
    {
        $V_Check_UserID = $_POST['EOM-ID'];
    }

    $sql = "UPDATE `users_leave_requests` SET `Leave_Delete`='2' WHERE `Leave_UserID` = '$V_Check_UserID' AND `Leave_RequestID` = '$V_EO_RequestID'";
    echo $sql;
    
    if ($conn->query($sql) === TRUE) {
        header("emp-leave.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
}

if(isset($_POST["Button_Approve"]))
{
    include('db.php');
    $V_AP_ID = $_POST['AP-ID'];
    $V_Decision_UserID = $_SESSION['S_User_UserID'];
    $V_AP_RequestID = $_POST['AP-RequestID'];
    $V_AP_Date_Decision = date("Y-m-d");


    $sql = "UPDATE `users_leave_requests` SET `Leave_Status`='2', `Leave_Date_Decision`='$V_AP_Date_Decision', `Leave_Decision_UserID`='$V_Decision_UserID' WHERE `Leave_UserID` = '$V_AP_ID' AND `Leave_RequestID` = '$V_AP_RequestID'";
    
    if ($conn->query($sql) === TRUE) {
        header("emp-leave.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
}

if(isset($_POST["Button_Decline"]))
{
    include('db.php');
    $V_AP_ID = $_POST['DP-ID'];
    $V_Decision_UserID = $_SESSION['S_User_UserID'];
    $V_AP_RequestID = $_POST['DP-RequestID'];
    $V_AP_Date_Decision = date("Y-m-d");


    $sql = "UPDATE `users_leave_requests` SET `Leave_Status`='3', `Leave_Date_Decision`='$V_AP_Date_Decision', `Leave_Decision_UserID`='$V_Decision_UserID' WHERE `Leave_UserID` = '$V_AP_ID' AND `Leave_RequestID` = '$V_AP_RequestID'";
    
    if ($conn->query($sql) === TRUE) {
        header("emp-leave.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
}
if(isset($_POST["Button_Edit"]))
{
    include('db.php');
    $V_EP_ID = $_POST['EP-ID'];
    $V_Decision_UserID = $_SESSION['S_User_UserID'];
    $V_EP_RequestID = $_POST['EP-RequestID'];
    $V_EP_Date_Decision = date("Y-m-d");
    $V_EP_Status = $_POST['EP-Status'];


    $sql = "UPDATE `users_leave_requests` SET `Leave_Status`='$V_EP_Status', `Leave_Date_Decision`='$V_EP_Date_Decision', `Leave_Decision_UserID`='$V_Decision_UserID' WHERE `Leave_UserID` = '$V_EP_ID' AND `Leave_RequestID` = '$V_EP_RequestID'";
    
    if ($conn->query($sql) === TRUE) {
        header("emp-leave.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
}
?>
<!doctype html>
<html lang="en">

<head>
<title>Leave Request</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/vendor/sweetalert/sweetalert.css"/>
<link rel="stylesheet" href="assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="assets/vendor/multi-select/css/multi-select.css">

<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
<link rel="stylesheet" href="assets/vendor/nouislider/nouislider.min.css" />

<!-- Select2 -->
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">

<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>
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
    <?php include_once('navigation.php') ;?>  
            
    <div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="<?= $_SESSION['S_User_Profile_Picture'];?>" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?= $_SESSION['S_User_Name']; ?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account animated flipInY">
                        <li><a href="page-profile2.php"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.php"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="page-login.php"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#hr_menu">HR</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#project_menu">Project</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sub_menu"><i class="icon-grid"></i></a></li>                
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
            </ul>
                
            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane animated fadeIn active" id="hr_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li><a href="index.php"><i class="icon-speedometer"></i><span>HR Dashboard</span></a></li>
                            <li><a href="app-holidays.php"><i class="icon-list"></i>Holidays</a></li>
                            <li><a href="app-events.php"><i class="icon-calendar"></i>Events</a></li>
                            <li class="active">
                                <a href="#Employees" class="has-arrow"><i class="icon-users"></i><span>Employees</span></a>
                                <ul>
                                    <li><a href="page-profile2.php">My Profile</a></li>
                                <?php 
                                    if(($_SESSION['S_User_Role'] == 1) || ($_SESSION['S_User_Role'] == 2) || ($_SESSION['S_User_Role'] == 3)){
                                    echo '<li"><a href="emp-all.php">All Employees</a></li>'; 
                                    } ?>
                                    <li class="active"><a href="emp-leave.php">Leave Requests</a></li>
                                    <?php if(($_SESSION['S_User_Role'] == 1) || ($_SESSION['S_User_Role'] == 2) || ($_SESSION['S_User_Role'] == 3)){
                                    echo '<li><a href="emp-attendance.php">Attendance</a></li>'; 
                                    } ?>
                                </ul>
                            </li>
                            <?php 
                            if(($_SESSION['S_User_Role'] == 1) || ($_SESSION['S_User_Role'] == 2) || ($_SESSION['S_User_Role'] == 3)){
                            echo '    
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
                            </li>';
                            }?>
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
                <div class="tab-pane animated fadeIn" id="sub_menu">
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
                            <li>
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
                                    <li><a href="page-search-results.php">Search Results</a></li>
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
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Leave Request</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Employee</li>
                            <li class="breadcrumb-item active">Leave Request</li>
                        </ul>
                    </div>            
                </div>
            </div>
            
            <?php
            if ($_SESSION['S_User_Role'] == 1){ 
            ?>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Leave requests list</h2>
                            <ul class="header-dropdown">
                                <li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#Add_Other_Request">Add Leave</a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom m-b-0 c_list">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Leave Type</th>
                                            <th>Date</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                            <th style="display:none;">UserID</th>
                                            <th style="display:none;">Hash</th>
                                            <th style="display:none;">Status</th>
                                            <th style="display:none;">Type</th>
                                            <th style="display:none;">Start</th>
                                            <th style="display:none;">End</th>
                                            <th style="display:none;">Reason</th>
                                            <th style="display:none;">RequestID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('db.php');
                                        $sql = "SELECT * FROM `users_leave_requests`
                                        INNER JOIN `users_leave_type` ON users_leave_requests.Leave_TypeID = users_leave_type.Leave_TypeID
                                        INNER JOIN `users_leave_status` ON users_leave_requests.Leave_Status = users_leave_status.Leave_StatusID
                                        INNER JOIN `users_user`ON users_leave_requests.Leave_UserID = users_user.User_UserID WHERE `Leave_Delete` = '1' AND `Leave_EndDate` >= CURDATE()";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()) {
                                            $V_StartDate = date("j F Y", strtotime($row['Leave_StartDate']));
                                            $V_EndDate = date("j F Y", strtotime($row['Leave_EndDate']));
                                            echo '<tr>
                                                <td class="width45">                                           
                                                    <img src="'.$row['User_Profile_Picture'].'" class="rounded-circle avatar" alt="">
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">'.$row['User_FirstName'].' '.$row['User_LastName'].'</h6>                                            
                                                </td>
                                                <td><span>'.$row['Leave_Type_Name'].'</span></td>
                                                <td>'.$V_StartDate.' to '. $V_EndDate .'</td>
                                                <td>'.$row['Leave_Reason'].'</td>';
                                                if($row['Leave_Status'] == 1)
                                                {
                                                echo '<td>
                                                    <button type="button" class="btn btn-sm btn-success approve_btn" title="Approved"><i class="fa fa-check"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger decline_btn" title="Declined"><i class="fa fa-ban"></i></button>
                                                </td>';
                                                }
                                                else if($row['Leave_Status'] == 2){
                                                    echo '<td><button type="button" class="btn btn-sm btn-warning edit_btn" title="Edit"><i class="fa fa-check"></i></button></td>';
                                                }
                                                else if($row['Leave_Status'] == 3){
                                                    echo '<td><button type="button" class="btn btn-sm btn-warning edit_btn" title="Edit"><i class="fa fa-ban"></i></button></td>';
                                                    } 
                                                else if($row['Leave_Status'] == 4){
                                                    echo '<td><button type="button" class="btn btn-sm btn-warning edit_btn" title="Edit"><i class="icon-question"></i></button></td>';
                                                }
                                                echo '<td style="display:none;">'.$row["User_UserID"].'</td>
                                                <td style="display:none;">'.$row["User_Hash"].'</td>
                                                <td style="display:none;">'.$row["Leave_Status"].'</td>
                                                <td style="display:none;">'.$row["Leave_TypeID"].'</td>
                                                <td style="display:none;">'.$row["Leave_StartDate"].'</td>
                                                <td style="display:none;">'.$row["Leave_EndDate"].'</td>
                                                <td style="display:none;">'.$row["Leave_Reason"].'</td>
                                                <td style="display:none;">'.$row["Leave_RequestID"].'</td>
                                            </tr>';
                                        
                                          }
                                        }
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Your leave request</h2>
                            <ul class="header-dropdown">
                                <li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#Add_Own_Request">Add Leave</a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom m-b-0 c_list">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Leave Type</th>
                                            <th>Date</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                            <th style="display:none;">UserID</th>
                                            <th style="display:none;">Hash</th>
                                            <th style="display:none;">Status</th>
                                            <th style="display:none;">Type</th>
                                            <th style="display:none;">Start</th>
                                            <th style="display:none;">End</th>
                                            <th style="display:none;">Reason</th>
                                            <th style="display:none;">RequestID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('db.php');
                                        $sql = "SELECT * FROM `users_leave_requests`
                                        INNER JOIN `users_leave_type` ON users_leave_requests.Leave_TypeID = users_leave_type.Leave_TypeID
                                        INNER JOIN `users_leave_status` ON users_leave_requests.Leave_Status = users_leave_status.Leave_StatusID
                                        INNER JOIN `users_user`ON users_leave_requests.Leave_UserID = users_user.User_UserID
                                        WHERE `Leave_UserID` = '$AC_UserID' AND `Leave_Delete` = '1' AND `Leave_EndDate` >= CURDATE()";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()) {
                                            $V_StartDate = date("j F Y", strtotime($row['Leave_StartDate']));
                                            $V_EndDate = date("j F Y", strtotime($row['Leave_EndDate']));
                                            echo '<tr>
                                                <td class="width45">                                           
                                                    <img src="'.$row['User_Profile_Picture'].'" class="rounded-circle avatar" alt="">
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">'.$row['User_FirstName'].' '.$row['User_LastName'].'</h6>                                            
                                                </td>
                                                <td><span>'.$row['Leave_Type_Name'].'</span></td>
                                                <td>'.$V_StartDate.' to '. $V_EndDate .'</td>
                                                <td>'.$row['Leave_Reason'].'</td>';
                                                if($row['Leave_Status'] == 1)
                                                {
                                                echo '<td>
                                                    <button type="button" class="btn btn-sm btn-success edit_own_btn" title="Approved"><i class="icon-clock"></i></button>
                                                </td>';
                                                }
                                                else if($row['Leave_Status'] == 2){
                                                    echo '<td><i class="fa fa-check fa-2x"></i></td>';
                                                }
                                                else if($row['Leave_Status'] == 3){
                                                    echo '<td><i class="fa fa-ban fa-2x"></i></td>';
                                                    } 
                                                else if($row['Leave_Status'] == 4){
                                                    echo '<td><i class="icon-question fa-2x"></i></td>';
                                                }
                                                echo '<td style="display:none;">'.$row["User_UserID"].'</td>
                                                <td style="display:none;">'.$row["User_Hash"].'</td>
                                                <td style="display:none;">'.$row["Leave_Status"].'</td>
                                                <td style="display:none;">'.$row["Leave_TypeID"].'</td>
                                                <td style="display:none;">'.$row["Leave_StartDate"].'</td>
                                                <td style="display:none;">'.$row["Leave_EndDate"].'</td>
                                                <td style="display:none;">'.$row["Leave_Reason"].'</td>
                                                <td style="display:none;">'.$row["Leave_RequestID"].'</td>
                                            </tr>';
                                        
                                          }
                                        }
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                            

        </div>
    </div>
    
</div>

<!-- Default Size -->
<form method="POST">
    <div class="modal animated lightSpeedIn" id="Add_Own_Request" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Leave Request</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label>Type</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-cup"></i></span>
                            </div>
                            <select name="AOM-Type" id="AOM-Type" class="form-control">
                                <?php
                                    include("db.php");
                                    $sql = "SELECT * FROM `users_leave_type`";
                                    $result = $conn->query($sql);
                                        
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Leave_TypeID"].'">'.$row["Leave_Type_Name"].'</option>';
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                ?>
                            </select>
                            </div>
                    </div>
                            <div class="col-md-6">
                        <label>From</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="AOM-StartDate" id="AOM-StartDate" placeholder="From *">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>To</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="AOM-EndDate" id="AOM-EndDate" placeholder="To *">
                            </div>
                        </div>
                        <div class="col-md-12">
                        <label>Reason</label>
                            <div class="form-group">
                                <textarea rows="6" class="form-control no-resize" name="AOM-Reason" id="AOM-Reason" placeholder="Leave Reason *"></textarea>
                            </div>
                        </div>                   
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Button_Add_Own" class="btn btn-primary">ADD</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Default Size -->
<form method="POST">
    <div class="modal animated lightSpeedIn" id="Add_Other_Request" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Leave Request</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label>Name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                                <select class="form-control show-tick ms select2" name="AO-Name" id="AO-Name" data-placeholder="Select">
                                    <?php
                                        include("db.php");
                                        $sql = "SELECT * FROM `users_user` WHERE `User_Active` =  '1'";
                                        $result = $conn->query($sql);
                                            
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo '<option value="'.$row["User_UserID"].'">'.$row["User_FirstName"].' '. $row["User_LastName"] .'</option>';
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        $conn->close();
                                    ?>
                                </select>
                            </div>                    
                        </div>  
                        <div class="col-md-12">
                            <label>Type</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-cup"></i></span>
                            </div>
                            <select name="AO-Type" id="AO-Type" class="form-control">
                                <?php
                                    include("db.php");
                                    $sql = "SELECT * FROM `users_leave_type`";
                                    $result = $conn->query($sql);
                                        
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Leave_TypeID"].'">'.$row["Leave_Type_Name"].'</option>';
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                ?>
                            </select>
                            </div>
                    </div>
                            <div class="col-md-6">
                        <label>From</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="AO-StartDate" id="AO-StartDate" placeholder="From *">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>To</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="AO-EndDate" id="AO-EndDate" placeholder="To *">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Reason</label>
                            <div class="form-group">
                                <textarea rows="6" class="form-control no-resize" name="AO-Reason" id="AO-Reason" placeholder="Leave Reason *"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Status</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-feed"></i></span>
                                </div>
                                <select name="AO-Status" id="AO-Status" class="form-control">
                                    <?php
                                        include("db.php");
                                        $sql = "SELECT * FROM `users_leave_status`";
                                        $result = $conn->query($sql);
                                            
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo '<option value="'.$row["Leave_StatusID"].'">'.$row["Leave_Status_Name"].'</option>';
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        $conn->close();
                                    ?>
                                </select>
                            </div>                    
                        </div>                   
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Button_Add_Other" class="btn btn-primary">ADD</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Edit Own leave request -->
<form method="POST">
    <div class="modal animated lightSpeedIn" id="edit_own_contact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Edit Your Leave Request</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                            <input type="hidden" name="EOM-ID" id="EOM-ID">
                            <input type="hidden" name="EOM-HASH" id="EOM-HASH">
                            <input type="hidden" name="EOM-RequestID" id="EOM-RequestID">
                        <div class="col-md-12">
                            <label>Type</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-cup"></i></span>
                            </div>
                            <select name="EOM-Type" id="EOM-Type" class="form-control">
                                <?php
                                    include("db.php");
                                    $sql = "SELECT * FROM `users_leave_type`";
                                    $result = $conn->query($sql);
                                        
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Leave_TypeID"].'">'.$row["Leave_Type_Name"].'</option>';
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>
                        <div class="col-md-6">
                        <label>From</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="EOM-StartDate" id="EOM-StartDate" placeholder="From *">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>To</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="EOM-EndDate" id="EOM-EndDate" placeholder="To *">
                            </div>
                        </div>
                        <div class="col-md-12">
                        <label>Reason</label>
                            <div class="form-group">
                                <textarea rows="6" class="form-control no-resize" name="EOM-Reason" id="EOM-Reason" placeholder="Leave Reason *"></textarea>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Button_Edit_Own" class="btn btn-warning">EDIT</button>
                    <button type="submitchr" name="Button_Delete_Own" class="btn btn-danger">DELETE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Approve Modal -->
<form method="POST">
    <div class="modal animated lightSpeedIn" id="approve_contact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Approve the request.</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                            <input type="hidden" name="AP-ID" id="AP-ID">
                            <input type="hidden" name="AP-HASH" id="AP-HASH">
                            <input type="hidden" name="AP-RequestID" id="AP-RequestID">
                        <div class="col-md-12">
                            <label>Type</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-cup"></i></span>
                            </div>
                            <select name="AP-Type" id="AP-Type" class="form-control" disabled>
                                <?php
                                    include("db.php");
                                    $sql = "SELECT * FROM `users_leave_type`";
                                    $result = $conn->query($sql);
                                        
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Leave_TypeID"].'">'.$row["Leave_Type_Name"].'</option>';
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>
                        <div class="col-md-6">
                        <label>From</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="AP-StartDate" id="AP-StartDate" placeholder="From *" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>To</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="AP-EndDate" id="AP-EndDate" placeholder="To *" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <label>Reason</label>
                            <div class="form-group">
                                <textarea rows="6" class="form-control no-resize" name="AP-Reason" id="AP-Reason" placeholder="Leave Reason *" disabled></textarea>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Button_Approve" class="btn btn-success">APPROVE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Decline Modal -->
<form method="POST">
    <div class="modal animated lightSpeedIn" id="decline_contact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Decline the request.</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                            <input type="hidden" name="DP-ID" id="DP-ID">
                            <input type="hidden" name="DP-HASH" id="DP-HASH">
                            <input type="hidden" name="DP-RequestID" id="DP-RequestID">
                        <div class="col-md-12">
                            <label>Type</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-cup"></i></span>
                            </div>
                            <select name="DP-Type" id="DP-Type" class="form-control" disabled>
                                <?php
                                    include("db.php");
                                    $sql = "SELECT * FROM `users_leave_type`";
                                    $result = $conn->query($sql);
                                        
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Leave_TypeID"].'">'.$row["Leave_Type_Name"].'</option>';
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>
                        <div class="col-md-6">
                        <label>From</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="DP-StartDate" id="DP-StartDate" placeholder="From *" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>To</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="DP-EndDate" id="DP-EndDate" placeholder="To *" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <label>Reason</label>
                            <div class="form-group">
                                <textarea rows="6" class="form-control no-resize" name="DP-Reason" id="DP-Reason" placeholder="Leave Reason *" disabled></textarea>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Button_Decline" class="btn btn-danger">DECLINE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Edit Modal -->
<form method="POST">
    <div class="modal animated lightSpeedIn" id="edit_contact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Edit the request.</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                            <input type="hidden" name="EP-ID" id="EP-ID">
                            <input type="hidden" name="EP-HASH" id="EP-HASH">
                            <input type="hidden" name="EP-RequestID" id="EP-RequestID">
                        <div class="col-md-12">
                            <label>Type</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-cup"></i></span>
                            </div>
                            <select name="EP-Type" id="EP-Type" class="form-control" disabled>
                                <?php
                                    include("db.php");
                                    $sql = "SELECT * FROM `users_leave_type`";
                                    $result = $conn->query($sql);
                                        
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Leave_TypeID"].'">'.$row["Leave_Type_Name"].'</option>';
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>
                        <div class="col-md-6">
                        <label>From</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="EP-StartDate" id="EP-StartDate" placeholder="From *" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>To</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="EP-EndDate" id="EP-EndDate" placeholder="To *" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Reason</label>
                            <div class="form-group">
                                <textarea rows="6" class="form-control no-resize" name="EP-Reason" id="EP-Reason" placeholder="Leave Reason *" disabled></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Status</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-feed"></i></span>
                                </div>
                                <select name="EP-Status" id="EP-Status" class="form-control">
                                    <?php
                                        include("db.php");
                                        $sql = "SELECT * FROM `users_leave_status`";
                                        $result = $conn->query($sql);
                                            
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo '<option value="'.$row["Leave_StatusID"].'">'.$row["Leave_Status_Name"].'</option>';
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        $conn->close();
                                    ?>
                                </select>
                            </div>                    
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="submit" name="Button_Edit" class="btn btn-warning">EDIT</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
<script src="assets/vendor/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js --> 
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script><!-- bootstrap datepicker Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<script src="assets/js/pages/ui/dialogs.js"></script>


<script src="assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> <!-- Bootstrap Colorpicker Js --> 
<script src="assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js"></script> <!-- Input Mask Plugin Js --> 
<script src="assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> <!-- Bootstrap Tags Input Plugin Js --> 
<script src="assets/vendor/nouislider/nouislider.js"></script> <!-- noUISlider Plugin Js --> 
<script src="assets/vendor/select2/select2.min.js"></script> <!-- Select2 Js -->
<script src="assets/js/pages/forms/advanced-form-elements.js"></script>

<script>
  $(document).ready(function () {
		$('.edit_own_btn').on('click', function() {
			$('#edit_own_contact').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			
			console.log(data);
            $('#EOM-ID').val(data[6]);
            $('#EOM-HASH').val(data[7]);
            $('#EOM-Status').val(data[8]);
            $('#EOM-Type').val(data[9]);
            $('#EOM-StartDate').val(data[10]);
            $('#EOM-EndDate').val(data[11]);
            $('#EOM-Reason').val(data[12]);
            $('#EOM-RequestID').val(data[13]);
		});
  });
  </script>
  <script>
  $(document).ready(function () {
		$('.approve_btn').on('click', function() {
			$('#approve_contact').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			
			console.log(data);
            $('#AP-ID').val(data[6]);
            $('#AP-HASH').val(data[7]);
            $('#AP-Status').val(data[8]);
            $('#AP-Type').val(data[9]);
            $('#AP-StartDate').val(data[10]);
            $('#AP-EndDate').val(data[11]);
            $('#AP-Reason').val(data[12]);
            $('#AP-RequestID').val(data[13]);
		});
  });
  $(document).ready(function () {
		$('.decline_btn').on('click', function() {
			$('#decline_contact').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			
			console.log(data);
            $('#DP-ID').val(data[6]);
            $('#DP-HASH').val(data[7]);
            $('#DP-Status').val(data[8]);
            $('#DP-Type').val(data[9]);
            $('#DP-StartDate').val(data[10]);
            $('#DP-EndDate').val(data[11]);
            $('#DP-Reason').val(data[12]);
            $('#DP-RequestID').val(data[13]);
		});
  });
  $(document).ready(function () {
		$('.edit_btn').on('click', function() {
			$('#edit_contact').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			
			console.log(data);
            $('#EP-ID').val(data[6]);
            $('#EP-HASH').val(data[7]);
            $('#EP-Status').val(data[8]);
            $('#EP-Type').val(data[9]);
            $('#EP-StartDate').val(data[10]);
            $('#EP-EndDate').val(data[11]);
            $('#EP-Reason').val(data[12]);
            $('#EP-RequestID').val(data[13]);
		});
  });
  </script>
</body>
</html>
