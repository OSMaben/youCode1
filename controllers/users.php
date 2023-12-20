<?php
    require_once '../models/User.php';

class Users
{

    private $userModel;
    private $validateDate;
    public $erroMessage;
    public function __construct()
    {
        $this->userModel = new User;
    }

    public function register()
    {
        $data = [
            'firstname' => trim($_POST['lastname']),
            'lastname' => trim($_POST['lastname']),
            'email' => trim($_POST['email']),
            'Password' => trim($_POST['Password']),
            'repeatPass' => trim($_POST['passwordConfirmation'])
        ];

        // if(empty($data['lastname']) || empty($data['email']) || empty($data['Password'])|| empty($data['repeatPass']))
        // {
        //     $this->erroMessage = "the inputs should not be empty";
        //     header("location: .../register.php");
        // // // }
        
        // // if(!filter_var($data['email'], FILTER_SANITIZE_EMAIL))
        // // {
        // //     $this->erroMessage = "email is not valid";
        // //     header("location: ../register.php");
        // // }
        
        // if(strlen(empty($data['Password'])) < 6 )
        // {
        //     $this->erroMessage = "password must be more then 8 chars";
        //     header("location: ../register.php");
        // }

        if($this->userModel->findUserByNameOrMail("users",$data['email'],$data['Password']))
        {
            $this->erroMessage = "password or mail is already taken";
            header("location: ../register.php");
        }

        if($data['Password'] !== $data['repeatPass'])
        {
            $this->erroMessage = "Passwords are not the same";
            header("location: ../register.php");
        }
        
        if($this->userModel->RegisterUser("users",array("firstName","lastname","email","Password"),
        array($data['firstName'],$data['lastname'],$data['email'],$data['Password'])))
        {
            header("location: ../login.php");
        }else
        {
            die("something went wrong");
        }

    }


    
}

$init = new Users;

//bax nchofo eax user sift data b post

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    switch($_POST['type'])
    {
        case 'register':
            $init->register();
            break;
    }
}


?>