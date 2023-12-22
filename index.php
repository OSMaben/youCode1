<?php
session_start();
include 'controllers/users.php';
$user=new Users();

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error === 'empty') {
        echo "<p class='alert alert-danger'>Error: all inputs are requered</p>";
    } elseif ($error === 'notvalid') {
        echo "<p  class='alert alert-danger'>Error: email or password is invalid.</p>";
    }
    elseif ($error === 'password_length') {
        echo "<p  class='alert alert-danger'>Error: password must be more then 6 chars.</p>";
    }
    elseif ($error === 'registration_failed') {
        echo "<p  class='alert alert-danger'>Error: there was an error please try again later.</p>";
    }
    elseif ($error === 'password_match') {
        echo "<p  class='alert alert-danger'>Error: password does not match</p>";
    }
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'login':
            include 'views/login.php';
            break;
        case 'regester':
            include 'views/register.php';
            break;
        case 'dashboard':
            if (!isset($_SESSION['id_user'])) {
                header("location: index.php?action=login");
                exit();
            }
            include 'views/dashboard.php';
        case 'dashboard/student-list':
            include 'views/listOfStudents.php';
            break;
    }
}

else include 'views/login.php';

if(isset($_POST['submit'])){
    $submit=$_POST['submit'];
    switch($submit){
        case 'regersterUser' : $user->register(); break;
        case 'loginuser' : $user->login(); break;
    }

}




?>
