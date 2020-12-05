<?php
include('account-check.php');
$UserID = $_SESSION['S_User_UserID'];
include('db.php');
$sql = "SELECT * FROM `users_user`
INNER JOIN `users_marital_status` ON users_user.User_Marital_Status = users_marital_status.Marital_StatusID
INNER JOIN `users_roles_list` ON users_user.User_RoleID = users_roles_list.Roles_ListID
WHERE `User_UserID` = '$UserID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $V_UserID = $row['User_UserID'];
    $V_User_FirstName = $row['User_FirstName'];
    $V_User_LastName = $row['User_LastName'];
    $V_User_Email = $row['User_Email'];
    $V_User_RoleID = $row['User_RoleID'];
    $V_User_Hash = $row['User_Hash'];
    $V_User_Active = $row['User_Active'];
    $V_User_Profile_Picture = $row['User_Profile_Picture'];
    $V_User_Phone = $row['User_Phone'];
    $V_User_Gender = $row['User_Gender'];
    $V_User_BirthDate = date("d-m-Y", strtotime($row['User_BirthDate']));
    $V_User_BirthDate_string = date("j F Y", strtotime($row['User_BirthDate']));
    $V_User_Address_Line_1 = $row['User_Address_Line_1'];
    $V_User_Address_Line_2 = $row['User_Address_Line_2'];
    $V_User_Zipcode = $row['User_Zipcode'];
    $V_User_City = $row['User_City'];
    $V_User_Country = $row['User_Country'];
    $V_User_Marital_Status = $row['User_Marital_Status'];
    $V_User_National_Insurance_Number = $row['User_National_Insurance_Number'];
    $V_User_Account_Number = $row['User_Account_Number'];
    $V_User_Enterprise_Email = $row['User_Enterprise_Email'];
    $V_User_Contact_Person_Name = $row['User_Contact_Person_Name'];
    $V_User_Contact_Person_Phone = $row['User_Contact_Person_Phone'];
    $V_Marital_Name = $row['Marital_Name'];
    $V_Roles_Name = $row['Roles_Name'];
    $V_Google_Address_Line_1 = str_replace(' ', '%20', $V_User_Address_Line_1);
    $V_Google_Address_Line_2 = str_replace(' ', '%20', $V_User_Address_Line_2);
    $V_Google_Address_Zipcode = $V_User_Zipcode;
    $V_Google_Address_City = $V_User_City;
    $V_Google_Address_Country = "$V_User_Country";
    
    $V_Google_Address = "https://maps.google.com/maps?q=".$V_Google_Address_Line_1.",".$V_Google_Address_Zipcode.$V_Google_Address_City."=&z=13&ie=UTF8&iwloc=&output=embed";
  }
} else {
  echo "0 results";
}
$conn->close();
if(isset($_POST["Button_Edit_User_Info"]))
{
    include('db.php');
    $UserID = $_SESSION['S_User_UserID'];
    $V_P_User_FirstName = $_POST['User_FirstName'];
    $V_P_User_LastName = $_POST['User_LastName'];
    $V_P_User_Email = $_POST['User_Email'];
    $V_P_User_Phone = $_POST['User_Phone'];
    $V_P_User_Gender = $_POST['User_Gender'];
    $V_P_User_BirthDate = date("Y-m-d", strtotime($_POST['User_BirthDate']));
    $V_P_User_Address_Line_1 = $_POST['User_Address_Line_1'];
    $V_P_User_Address_Line_2 = $_POST['User_Address_Line_2'];
    $V_P_User_Zipcode = $_POST['User_ZipCode'];
    $V_P_User_City = $_POST['User_City'];
    $V_P_User_Country = $_POST['User_Country'];
    $V_P_User_National_Insurance_Number = $_POST['User_National_Insurance_Number'];
    $V_P_User_Account_Number = $_POST['User_Account_Number'];
    $V_P_User_Enterprise_Email = $_POST['User_Enterprise_Email'];
    $V_P_User_Contact_Person_Name = $_POST['User_Contact_Person_Name'];
    $V_P_User_Contact_Person_Phone = $_POST['User_Contact_Person_Phone'];
    $V_P_Marital_Name = $_POST['Marital_Name'];
    $V_P_Date = date("Y-m-d");

    $sql = "UPDATE `users_user` SET `User_Date_Edit`='$V_P_Date',`User_FirstName`='$V_P_User_FirstName',`User_LastName`='$V_P_User_LastName',`User_Email`='$V_P_User_Email',
    `User_Phone`='$V_P_User_Phone',`User_Gender`='$V_P_User_Gender',`User_BirthDate`='$V_P_User_BirthDate',`User_Address_Line_1`='$V_P_User_Address_Line_1',
    `User_Address_Line_2`='$V_P_User_Address_Line_2',`User_Zipcode`='$V_P_User_Zipcode',`User_City`='$V_P_User_City',`User_Country`='$V_P_User_Country',
    `User_Marital_Status`='$V_P_Marital_Name',`User_National_Insurance_Number`='$V_P_User_National_Insurance_Number',`User_Account_Number`='$V_P_User_Account_Number',
    `User_Enterprise_Email`='$V_P_User_Enterprise_Email',`User_Contact_Person_Name`='$V_P_User_Contact_Person_Name',`User_Contact_Person_Phone`='$V_P_User_Contact_Person_Phone' WHERE `User_UserID` = '$UserID'";

    if ($conn->query($sql) === TRUE) {
        header('Location: page-profile2.php?page=1');
    } else {
        header('Location: page-profile2.php?page=2');
    }

    $conn->close();
}
?>
<!doctype html>
<html lang="en">

<head>
<title>Profile</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/blog.css">
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
                                <li class="active"><a href="page-profile2.php">My Profile</a></li>
                                <?php 
                                    if(($_SESSION['S_User_Role'] == 1) || ($_SESSION['S_User_Role'] == 2) || ($_SESSION['S_User_Role'] == 3)){
                                    echo '<li><a href="emp-all.php">All Employees</a></li>'; 
                                    } ?>
                                    <li><a href="emp-leave.php">Leave Requests</a></li>
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

    <div id="main-content" class="profilepage_2 blog-page">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> My Profile</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">HR</li>
                            <li class="breadcrumb-item active">My Profile</li>
                        </ul>
                    </div>            
                </div>
            </div>

            <div class="row clearfix">

                <div class="col-lg-4 col-md-12">
                    <div class="card profile-header">
                        <div class="body">
                            <div class="profile-image"> <img src="<?= $V_User_Profile_Picture;?>" height="140px" width="140px" class="rounded-circle" alt=""> </div>
                            <div>
                                <h4 class="m-b-0"><strong><?= $V_User_FirstName;?></strong> <?=$V_User_LastName;?></h4>
                                <span><?= $V_User_City;?></span>
                            </div>                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>Info</h2>
                        </div>
                        <div class="body">
                            <small class="text-muted">Address: </small>
                            <p><?=$V_User_Address_Line_1 . ' ' . $V_User_Address_Line_2 . ', ' . $V_User_Zipcode . ' ' . $V_User_City . ' ' .$V_User_Country?></p>
                            <div>
                                <iframe src="<?=$V_Google_Address;?>" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <hr>
                            <small class="text-muted">Email address: </small>
                            <p><?= $V_User_Email;?><br><?= $V_User_Enterprise_Email;?></p>                            
                            <hr>
                            <small class="text-muted">Mobile: </small>
                            <p><?= $V_User_Phone;?></p>
                            <hr>
                            <small class="text-muted">Birth Date: </small>
                            <p class="m-b-0"><?= $V_User_BirthDate_string;?></p>
                            <hr>
                        </div>
                    </div>
                    
                </div>

                <div class="col-lg-8 col-md-12">

                    <div class="tab-content padding-0">

                        <div class="tab-pane animated fadeIn" id="Overview">
                            <div class="card">
                                <div class="body">
                                    <div class="new_post">
                                        <div class="form-group">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                        </div>
                                        <div class="post-toolbar-b">
                                            <button class="btn btn-warning"><i class="icon-link"></i></button>
                                            <button class="btn btn-warning"><i class="icon-camera"></i></button>
                                            <button class="btn btn-primary">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single_post">
                                <div class="body">
                                    <div class="img-post">
                                        <img class="d-block img-fluid" src="assets/images/blog/blog-page-1.jpg" alt="First slide">
                                    </div>
                                    <h3><a href="blog-details.php">All photographs are accurate</a></h3>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>
                                </div>
                                <div class="footer">
                                    <div class="actions">
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary">Continue Reading</a>
                                    </div>
                                    <ul class="stats">
                                        <li><a href="javascript:void(0);">General</a></li>
                                        <li><a href="javascript:void(0);" class="icon-heart">28</a></li>
                                        <li><a href="javascript:void(0);" class="icon-bubbles">128</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card single_post">
                                <div class="body">
                                    <div class="img-post">
                                        <img class="d-block img-fluid" src="assets/images/blog/blog-page-2.jpg" alt="">
                                    </div>
                                    <h3><a href="blog-details.php">All photographs are accurate</a></h3>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>
                                </div>
                                <div class="footer">
                                    <div class="actions">
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary">Continue Reading</a>
                                    </div>
                                    <ul class="stats">
                                        <li><a href="javascript:void(0);">General</a></li>
                                        <li><a href="javascript:void(0);" class="icon-heart">28</a></li>
                                        <li><a href="javascript:void(0);" class="icon-bubbles">128</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane animated fadeIn active" id="Settings">
                            <form method="POST">
                                <div class="card">
                                    <div class="body">
                                        <h6>Contact Information</h6>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_FirstName" placeholder="First Name" value="<?= $V_User_FirstName;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_LastName" placeholder="Last Name" value="<?= $V_User_LastName;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_Email" placeholder="Email" value="<?= $V_User_Email;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_Enterprise_Email" placeholder="Enterprise Email" value="<?= $V_User_Enterprise_Email;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_Phone" placeholder="Phone" value="<?= $V_User_Phone;?>">
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <h6>Address Information</h6>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_Address_Line_1" placeholder="Address Line 1" value="<?= $V_User_Address_Line_1;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_Address_Line_2" placeholder="Address Line 2" value="<?= $V_User_Address_Line_2;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_ZipCode" placeholder="ZipCode" value="<?= $V_User_Zipcode;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_City" placeholder="City" value="<?= $V_User_City;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_Country" placeholder="Country" value="<?= $V_User_Country;?>">
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <h6>Personal Information</h6>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <input data-provide="datepicker" data-date-autoclose="true" class="form-control" name="User_BirthDate" placeholder="Birthdate" value="<?= $V_User_BirthDate;?>">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-life-ring"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_National_Insurance_Number" placeholder="National Insurance Number" value="<?= $V_User_National_Insurance_Number;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa icon-credit-card"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_Account_Number" placeholder="Account Number" value="<?= $V_User_Account_Number;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-users"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_Contact_Person_Name" placeholder="Contact Person Name" value="<?= $V_User_Contact_Person_Name;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="User_Contact_Person_Phone" placeholder="Contact Person Phone" value="<?= $V_User_Contact_Person_Phone;?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-heart"></i></span>
                                                    </div>
                                                    <select name="Marital_Name" id="Marital_Name" class="form-control">
                                                        <?php
                                                            include("db.php");
                                                            $sql = "SELECT * FROM `users_marital_status`";
                                                            $result = $conn->query($sql);
                                                                
                                                            if ($result->num_rows > 0) {
                                                                while($row = $result->fetch_assoc()) {
                                                                    $V_Selected = "";
                                                                    if($row["Marital_StatusID"] == $V_User_Marital_Status )
                                                                    {
                                                                        $V_Selected = "selected";
                                                                    }
                                                                    echo '<option value="'.$row["Marital_StatusID"].'" '.$V_Selected.'>'.$row["Marital_Name"].'</option>';
                                                                }
                                                            } else {
                                                                echo "0 results";
                                                            }
                                                            $conn->close();
                                                        ?>
                                                    </select>
                                                </div> 
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-female"></i></span>
                                                    </div>
                                                    <select name="User_Gender" id="User_Gender" class="form-control">
                                                        <?php
                                                            include("db.php");
                                                            $sql = "SELECT * FROM `users_gender`";
                                                            $result = $conn->query($sql);
                                                                
                                                            if ($result->num_rows > 0) {
                                                                while($row = $result->fetch_assoc()) {
                                                                    $V_Selected = "";
                                                                    if($row["Gender_GenderID"] == $V_User_Gender )
                                                                    {
                                                                        $V_Selected = "selected";
                                                                    }
                                                                    echo '<option value="'.$row["Gender_GenderID"].'" '.$V_Selected.'>'.$row["Gender_Name"].'</option>';
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
                                        <button type="submit" name="Button_Edit_User_Info" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </form>
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

<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script>

<script>
$(function () {
    $('.knob').knob({
        draw: function () {
            // "tron" case
            if (this.$.data('skin') == 'tron') {

                var a = this.angle(this.cv)  // Angle
                    , sa = this.startAngle          // Previous start angle
                    , sat = this.startAngle         // Start angle
                    , ea                            // Previous end angle
                    , eat = sat + a                 // End angle
                    , r = true;

                this.g.lineWidth = this.lineWidth;

                this.o.cursor
                    && (sat = eat - 0.3)
                    && (eat = eat + 0.3);

                if (this.o.displayPrevious) {
                    ea = this.startAngle + this.angle(this.value);
                    this.o.cursor
                        && (sa = ea - 0.3)
                        && (ea = ea + 0.3);
                    this.g.beginPath();
                    this.g.strokeStyle = this.previousColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                    this.g.stroke();
                }

                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                this.g.stroke();

                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                this.g.stroke();

                return false;
            }
        }
    });
});
</script>
</body>
</html>