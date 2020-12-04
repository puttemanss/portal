<?php
include('account-check.php');
employee_edit_permission();

    $error_div = "";
    if(isset($_POST["Button_Add"]))
    {
        include('db.php');
        $V_Firstname = $_POST["Signup-FirstName"];
        $V_Lastname = $_POST["Signup-LastName"];
        $V_Email = $_POST["Signup-Email"];
        $V_password = $_POST['Signup-Password'];
        $V_Role = $_POST['Signup-Role'];
        $V_Password = md5($V_Password);
        $V_hash = password_hash($V_Password, PASSWORD_DEFAULT);
        $path = 'assets/images/lg/avatar4.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        // SQL Query
        $sql = "INSERT INTO `users_user`(`User_FirstName`, `User_LastName`, `User_Email`, `User_Password`, `User_Hash`, `User_Active`, `User_Profile_Picture`, `User_RoleID`) VALUES ('$V_Firstname','$V_Lastname','$V_Email','$V_Password','$V_hash','1', '$base64', '$V_Role')";

        //Run SQL Query
        if ($conn->query($sql) === TRUE) {
            $V_Url = "emp-all.php";
            header("location: $V_Url");
        } else {
            $error_div = '<div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa fa-times-circle"></i> There was a problem. Maybe your email is allready in use.
                        </div>';
        }
        $conn->close();
    }
    if(isset($_POST["Button_Edit"]))
    {
        $V_Date = date("Y-m-d");
        $V_EM_ID = $_POST['EM-ID'];
        $V_EM_HASH = $_POST['EM-HASH'];
        $V_EM_FirstName = $_POST['EM-FirstName'];
        $V_EM_LastName = $_POST['EM-LastName'];
        $V_EM_Email = $_POST['EM-Email'];
        $V_EM_Role = $_POST['EM-Role'];
        $V_EM_Phone = $_POST['EM-Phone'];
        $V_EM_Gender = $_POST['EM-Gender'];
        $V_EM_BirthDate = $_POST['EM-Birthdate'];
        $V_EM_BirthDate = date("Y-m-d", strtotime($V_EM_BirthDate));
        $V_EM_Address_Line_1 = $_POST['EM-Address-Line-1'];
        $V_EM_Address_Line_2 = $_POST['EM-Address-Line-2'];
        $V_EM_Zipcode = $_POST['EM-Zipcode'];
        $V_EM_City = $_POST['EM-City'];
        $V_EM_Country = $_POST['EM-Country'];
        $V_EM_National_Insurance = $_POST['EM-National-Insurance'];
        $V_EM_Account_Number = $_POST['EM-Account-Number'];
        $V_EM_Enterprise_Email = $_POST['EM-Enterprise-Email'];
        $V_EM_Contact_Person_Name = $_POST['EM-Contact-Name'];
        $V_EM_Contact_Person_Phone = $_POST['EM-Contact-Phone'];
        $V_EM_Marital_Status = $_POST['EM-Marital-Status'];
        include('db.php');
        $sql = "UPDATE `users_user` SET `User_Date_Edit`='$V_Date',`User_FirstName`='$V_EM_FirstName',`User_LastName`='$V_EM_LastName',
        `User_Email`='$V_EM_Email',`User_RoleID`='$V_EM_Role', `User_Phone`='$V_EM_Phone',`User_Gender`='$V_EM_Gender',
        `User_BirthDate`='$V_EM_BirthDate',`User_Address_Line_1`='$V_EM_Address_Line_1',`User_Address_Line_2`='$V_EM_Address_Line_2',`User_Zipcode`='$V_EM_Zipcode',
        `User_City`='$V_EM_City',`User_Country`='$V_EM_Country',`User_Marital_Status`='$V_EM_Marital_Status',`User_National_Insurance_Number`='$V_EM_National_Insurance',
        `User_Account_Number`='$V_EM_Account_Number',`User_Enterprise_Email`='$V_EM_Enterprise_Email',`User_Contact_Person_Name`='$V_EM_Contact_Person_Name',
        `User_Contact_Person_Phone`='$V_EM_Contact_Person_Phone' WHERE `User_UserID` = '$V_EM_ID' AND `User_Hash` = '$V_EM_HASH' ";

        if ($conn->query($sql) === TRUE) {
        
        } else {
        echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
    if(isset($_POST["Button_Delete"]))
    {
        $V_Date = date("Y-m-d");
        $V_DM_ID = $_POST['DM-ID'];
        $V_DM_HASH = $_POST['DM-HASH'];
        
        include('db.php');
        $sql = "UPDATE `users_user` SET `User_Date_Edit`='$V_Date',`User_Active`= '3' WHERE `User_UserID` = '$V_DM_ID' AND `User_Hash` = '$V_DM_HASH' ";
        if ($conn->query($sql) === TRUE) {
        
        } else {
        echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>
<!doctype html>
<html lang="en">

<head>
<title>Employee List</title>
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
                                <?php 
                                    if(($_SESSION['S_User_Role'] == 1) || ($_SESSION['S_User_Role'] == 2) || ($_SESSION['S_User_Role'] == 3)){
                                    echo '<li class="active"><a href="emp-all.php">All Employees</a></li>'; 
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

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Employee List</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Employee</li>
                            <li class="breadcrumb-item active">Employee List</li>
                        </ul>
                    </div>            
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Employee List</h2>
                            <ul class="header-dropdown">
                                <li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#addcontact">Add New</a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>
                                            </th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                            <th style="display:none;">UserID</th>
                                            <th style="display:none;">FirstName</th>
                                            <th style="display:none;">LastName</th>
                                            <th style="display:none;">Email</th>
                                            <th style="display:none;">Enterprise Email</th>
                                            <th style="display:none;">Role</th>
                                            <th style="display:none;">Phone</th>
                                            <th style="display:none;">Birthdate</th>
                                            <th style="display:none;">Account Number</th>
                                            <th style="display:none;">National Number</th>
                                            <th style="display:none;">Marital Status</th>
                                            <th style="display:none;">Gender</th>
                                            <th style="display:none;">Address Line 1</th>
                                            <th style="display:none;">Address Line 2</th>
                                            <th style="display:none;">Zipcode</th>
                                            <th style="display:none;">City</th>
                                            <th style="display:none;">Country</th>
                                            <th style="display:none;">Contact Person Name</th>
                                            <th style="display:none;">Contact Phone</th>
                                            <th style="display:none;">Gender Name</th>
                                            <th style="display:none;">RoleID</th>
                                            <th style="display:none;">Hash</th>
                                            <th style="display:none;">BDAY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //Include DB Connection
                                        include('db.php');
                                        $sql = "SELECT * FROM `users_user`
                                        INNER JOIN `users_roles_list` ON users_user.User_RoleID = users_roles_list.Roles_ListID
                                        INNER JOIN `users_gender`ON users_user.User_Gender = users_gender.Gender_GenderID
                                        INNER JOIN `users_marital_status` ON users_user.User_Marital_Status = users_marital_status.Marital_StatusID 
                                        WHERE `User_Active` = '1'";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            $V_birthdate = $row["User_BirthDate"];
                                            $V_birthdate = date("d-m-Y", strtotime($V_birthdate));
                                            echo '<tr>
                                            <td class="width45">
                                                <img src="'.$row["User_Profile_Picture"].'" class="rounded-circle avatar" alt="">
                                            </td>
                                            <td>
                                                <h6 class="mb-0">'.$row["User_FirstName"].' '. $row["User_LastName"].'</h6>
                                                <span><a href="mailto:'.$row["User_Email"].'">'.$row["User_Email"].'</a></span>
                                            </td>
                                            <td><span><a href="callto:'.$row["User_Phone"].'">'.$row["User_Phone"].'</a></span></td>
                                            <td>'.$row["Roles_Name"].'</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-primary infobtn" title="info"><i class="fa fa-info"></i></a>
                                                <button type="button" class="btn btn-sm btn-outline-secondary editbtn" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger deletebtn" title="Delete"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                            <td style="display:none;">'.$row["User_UserID"].'</td>
                                            <td style="display:none;">'.$row["User_FirstName"].'</td>
                                            <td style="display:none;">'.$row["User_LastName"].'</td>
                                            <td style="display:none;">'.$row["User_Email"].'</td>
                                            <td style="display:none;">'.$row["User_Enterprise_Email"].'</td>
                                            <td style="display:none;">'.$row["Roles_Name"].'</td>
                                            <td style="display:none;">'.$row["User_Phone"].'</td>
                                            <td style="display:none;">'.$V_birthdate.'</td>
                                            <td style="display:none;">'.$row["User_Account_Number"].'</td>
                                            <td style="display:none;">'.$row["User_National_Insurance_Number"].'</td>
                                            <td style="display:none;">'.$row["User_Marital_Status"].'</td>
                                            <td style="display:none;">'.$row["User_Gender"].'</td>
                                            <td style="display:none;">'.$row["User_Address_Line_1"].'</td>
                                            <td style="display:none;">'.$row["User_Address_Line_2"].'</td>
                                            <td style="display:none;">'.$row["User_Zipcode"].'</td>
                                            <td style="display:none;">'.$row["User_City"].'</td>
                                            <td style="display:none;">'.$row["User_Country"].'</td>
                                            <td style="display:none;">'.$row["User_Contact_Person_Name"].'</td>
                                            <td style="display:none;">'.$row["User_Contact_Person_Phone"].'</td>
                                            <td style="display:none;">'.$row["Gender_Name"].'</td>
                                            <td style="display:none;">'.$row["User_RoleID"].'</td>
                                            <td style="display:none;">'.$row["User_Hash"].'</td>
                                            <td style="display:none;">'.$row["User_BirthDate"].'</td>
                                        </tr>';
                                        }
                                        } else {
                                        echo "0 results";
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

<!-- Add employee -->
<form method="POST">
    <div class="modal animated zoomIn" id="addcontact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Contact</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">                                    
                                <input type="text" class="form-control" name="Signup-FirstName" placeholder="FirstName" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">                                    
                                <input type="text" class="form-control" name="Signup-LastName" placeholder="LastName" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                    
                                <input type="text" class="form-control" name="Signup-Email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">                                    
                                <input type="password" class="form-control" name="Signup-Password"placeholder="Password" required>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="Signup-Role" name="Signup-Role" class="form-control">
                                    <?php
                                        include("db.php");
                                        $sql = "SELECT * FROM users_roles_list";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Roles_ListID"].'">'.$row["Roles_Name"].'</option>';
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
                    <button type="submit" name="Button_Add"class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Add employee -->
<form method="POST">
    <div class="modal animated zoomIn" id="infocontact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 800px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Info Contact</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-FirstName" id="IM-FirstName" placeholder="FirstName" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-LastName" id="IM-LastName" placeholder="LastName" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Email" id="IM-Email" placeholder="Email" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Enterprise-Email" id="IM-Enterprise-Email" placeholder="Enterprise Email" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-gavel"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Roles-Name" id="IM-Roles-Name" placeholder="Role" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Birthdate" id="IM-Birthdate" placeholder="Birthdate" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                        <label>Adres</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Address-Line-1" id="IM-Address-Line-1" placeholder="Address Line 1" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Address-Line-2" id="IM-Address-Line-2" placeholder="Address Line 2" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Zipcode" id="IM-Zipcode" placeholder="Zipcode" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-City" id="IM-City" placeholder="City" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Country" id="IM-Country" placeholder="Country" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>National Insurance number</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-life-ring"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-National-Insurance" id="IM-National-Insurance" placeholder="National Insurance Number" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>Account number</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Account-Number" id="IM-Account-Number" placeholder="Account Number" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>Phone</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Phone" id="IM-Phone" placeholder="Phone Number" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Gender</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-female"></i></span>
                                </div>
                                <select name="IM-Gender" id="IM-Gender" class="form-control" disabled>
                                    <?php
                                        include("db.php");
                                        $sql = "SELECT * FROM users_gender";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Gender_GenderID"].'">'.$row["Gender_Name"].'</option>';
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
                        <label>Contact Person</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-users"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Contact-Name" id="IM-Contact-Name" placeholder="Contact Person Name" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>Contact Person Phone</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IM-Contact-Phone" id="IM-Contact-Phone" placeholder="Contact Person Phone" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Marital Status</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-gittip"></i></span>
                                </div>
                                <select name="IM-Marital-Status" id="IM-Marital-Status" class="form-control" disabled>
                                    <?php
                                        include("db.php");
                                        $sql = "SELECT * FROM `users_marital_status`";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Marital_StatusID"].'">'.$row["Marital_Name"].'</option>';
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Edit employee -->
<form method="POST">
    <div class="modal animated zoomIn" id="editcontact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 800px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Edit Contact</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="hidden" name="EM-ID" id="EM-ID">
                                <input type="hidden" name="EM-HASH" id="EM-HASH">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-FirstName" id="EM-FirstName" placeholder="FirstName">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-LastName" id="EM-LastName" placeholder="LastName">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Email" id="EM-Email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Enterprise-Email" id="EM-Enterprise-Email" placeholder="Enterprise Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-gavel"></i></span>
                                </div>
                                <select name="EM-Role" id="EM-Role" class="form-control">
                                    <?php
                                        include("db.php");
                                        $sql = "SELECT * FROM users_roles_list";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Roles_ListID"].'">'.$row["Roles_Name"].'</option>';
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
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="EM-Birthdate" id="EM-Birthdate" placeholder="Birthdate">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                        <label>Adres</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Address-Line-1" id="EM-Address-Line-1" placeholder="Address Line 1">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Address-Line-2" id="EM-Address-Line-2" placeholder="Address Line 2">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Zipcode" id="EM-Zipcode" placeholder="Zipcode">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-City" id="EM-City" placeholder="City">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pointer"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Country" id="EM-Country" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>National Insurance number</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-life-ring"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-National-Insurance" id="EM-National-Insurance" placeholder="National Insurance Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>Account number</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Account-Number" id="EM-Account-Number" placeholder="Account Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>Phone</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Phone" id="EM-Phone" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Gender</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-female"></i></span>
                                </div>
                                <select name="EM-Gender" id="EM-Gender" class="form-control">
                                    <?php
                                        include("db.php");
                                        $sql = "SELECT * FROM users_gender";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Gender_GenderID"].'">'.$row["Gender_Name"].'</option>';
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
                        <label>Contact Person</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-users"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Contact-Name" id="EM-Contact-Name" placeholder="Contact Person Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label>Contact Person Phone</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EM-Contact-Phone" id="EM-Contact-Phone" placeholder="Contact Person Phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Marital Status</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-gittip"></i></span>
                                </div>
                                <select name="EM-Marital-Status" id="EM-Marital-Status" class="form-control">
                                    <?php
                                        include("db.php");
                                        $sql = "SELECT * FROM `users_marital_status`";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row["Marital_StatusID"].'">'.$row["Marital_Name"].'</option>';
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
                    <button type="submit" name="Button_Edit"class="btn btn-primary">EDIT</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Add employee -->
<form method="POST">
    <div class="modal animated zoomIn" id="deletecontact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Delete Contact</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <input type="hidden" name="DM-ID" id="DM-ID">
                        <input type="hidden" name="DM-HASH" id="DM-HASH">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <i class="fa fa-times-circle"></i> 
                            You are about to delete the account below. Are you sure you want to delete this account? You cannot restore this!
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">                                    
                                <input type="text" class="form-control" name="DM-FirstName" id="DM-FirstName" placeholder="FirstName" Disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">                                    
                                <input type="text" class="form-control" name="DM-LastName" id="DM-LastName" placeholder="LastName" Disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Button_Delete"class="btn btn-danger">DELETE</button>
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
<script src="assets/vendor/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<script src="assets/js/pages/ui/dialogs.js"></script>

<script>
  $(document).ready(function () {
		$('.infobtn').on('click', function() {
			$('#infocontact').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			
			console.log(data);
            $('#IM-FirstName').val(data[6]);
            $('#IM-LastName').val(data[7]);
            $('#IM-Email').val(data[8]);
            $('#IM-Enterprise-Email').val(data[9]);
            $('#IM-Roles-Name').val(data[10]);
            $('#IM-Phone').val(data[11]);
            $('#IM-Birthdate').val(data[12]);
            $('#IM-Account-Number').val(data[13]);
            $('#IM-National-Insurance').val(data[14]);
            $('#IM-Marital-Status').val(data[15]);
            $('#IM-Gender').val(data[16]);
            $('#IM-Address-Line-1').val(data[17]);
            $('#IM-Address-Line-2').val(data[18]);
            $('#IM-Zipcode').val(data[19]);
            $('#IM-City').val(data[20]);
            $('#IM-Country').val(data[21]);
            $('#IM-Contact-Name').val(data[22]);
            $('#IM-Contact-Phone').val(data[23]);
		});
  });
  $(document).ready(function () {
		$('.editbtn').on('click', function() {
			$('#editcontact').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			
			console.log(data);
            $('#EM-ID').val(data[5]);
            $('#EM-FirstName').val(data[6]);
            $('#EM-LastName').val(data[7]);
            $('#EM-Email').val(data[8]);
            $('#EM-Enterprise-Email').val(data[9]);
            $('#EM-Roles-Name').val(data[10]);
            $('#EM-Phone').val(data[11]);
            $('#EM-Account-Number').val(data[13]);
            $('#EM-National-Insurance').val(data[14]);
            $('#EM-Marital-Status').val(data[15]);
            $('#EM-Gender').val(data[16]);
            $('#EM-Address-Line-1').val(data[17]);
            $('#EM-Address-Line-2').val(data[18]);
            $('#EM-Zipcode').val(data[19]);
            $('#EM-City').val(data[20]);
            $('#EM-Country').val(data[21]);
            $('#EM-Contact-Name').val(data[22]);
            $('#EM-Contact-Phone').val(data[23]);
            $('#EM-Role').val(data[25]);
            $('#EM-HASH').val(data[26]);
            $('#EM-Birthdate').val(data[27]);
		});
  });
  $(document).ready(function () {
		$('.deletebtn').on('click', function() {
			$('#deletecontact').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			
			console.log(data);
            $('#DM-ID').val(data[5]);
            $('#DM-FirstName').val(data[6]);
            $('#DM-LastName').val(data[7]);
            $('#DM-HASH').val(data[26]);
		});
  });
  </script>
</body>
</html>
