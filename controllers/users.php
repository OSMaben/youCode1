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
        //validate inputs
        $data = [
            'fullname' => trim($_POST['fullname']),
            'email' => trim($_POST['email']),
            'Password' => trim($_POST['Password']),
            'repeatPass' => trim($_POST['passwordConfirmation'])
        ];

        if(empty($data['fullname']) || empty($data['email']) || empty($data['Password'])|| empty($data['repeatPass']))
        {
            $erroMessage = "the inputs should not be empty";
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