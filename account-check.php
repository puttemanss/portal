<?php
session_start();
$AC_UserID = $_SESSION['S_User_UserID'];

include('db.php');

$AC_sql = "SELECT `User_Active`, `User_RoleID` FROM `users_user` WHERE `User_UserID` = '$AC_UserID' ";
$AC_result = $conn->query($AC_sql);

if ($AC_result->num_rows > 0) {
  // output data of each row
  while($AC_row = $AC_result->fetch_assoc()) {
    $AC_Active = $AC_row['User_Active'];
    $AC_Active = $AC_row['User_RoleID'];

    $_SESSION['S_User_Role'] = $AC_Active;

    if($AC_Active == 3){
        header('location: page-login.php?page=4');
    }
    else{
        if (!isset($_SESSION['S_Session_Active'])) {
            header('location: page-login.php?page=2-1');
        }
        else if ($_SESSION['S_User_Active'] == 0) {
            header('location: page-login.php?page=2-2');
        }
    }
  }
} else {
  echo "0 results";
}
$conn->close();

function employee_edit_permission()
{
    if ($_SESSION['S_User_Role'] == 4) {
        header('location: index.php?page=1');
    }
    else if ($_SESSION['S_User_Role'] == 5) {
        header('location: index.php?page=1');
    }
}
?>