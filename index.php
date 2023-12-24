<?php
session_start();
include 'controllers/users.php';
$user=new Users();

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error === 'empty') {
        echo "<p class='alert alert-danger'>Error: all inputs are requered</p>";
    } elseif ($error === 'notvalid') {
        echo "<p  class='alert alert-danger'>Error: email or password are invalid.</p>";
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
//            if (!isset($_SESSION['id_user'])) {
//                header("location: index.php?action=login");
//                exit();
//            }
            include 'views/dashboard.php';
            break;
        case 'dashboard/student-list':
            $user->showUser(1);
            break;
        case 'deleteStudent':
            $user->deleteUser($_GET['id']);
            break;
        case 'add-student':
            include 'views/add-student.php';
            break;
        case 'edit-student':
            $user->showSingleUser($_GET['id']);
            include 'views/edit-student.php';
//        default;
//            include 'views/login.php';
    }
}

else include 'views/login.php';

    if(isset($_POST['submit'])){
        $submit=$_POST['submit'];
        switch($submit){
            case 'regersterUser' : $user->register(); break;
            case 'loginuser' : $user->login(); break;
            case 'addUser': $user->addUser(); break;
            case 'editUser': $user->editUser("users",['firstName','lastName','email','id_role','address','phone_number'],
                [$_POST['firstName'],$_POST['lastName'], $_POST['email'],1,$_POST['address'],$_POST['phone']], $_GET['id']); break;

        }
    }



?>
