<?php
    require_once 'models/User.php';

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
            'firstname' => trim($_POST['firstname']), // Fix the typo here
            'lastname' => trim($_POST['lastname']),
            'email' => trim($_POST['email']),
            'Password' => trim($_POST['password']),
            'repeatPass' => trim($_POST['passwordConfirmation'])
        ];

        // Check for empty fields first
        if (empty($data['firstname']) || empty($data['lastname']) || empty($data['email']) || empty($data['Password']) || empty($data['repeatPass'])) {
            header("location: index.php?error=empty");
            exit();
        }

        // Check email format
        if (!filter_var($data['email'], FILTER_SANITIZE_EMAIL)) {
            header("location: index.php?error=notvalid");
            exit();
        }

        // Check password length
        if (strlen($data['Password']) < 6) {
            header("location: index.php?error=password_length");
            exit();
        }

        // Check password match
        if ($data['Password'] !== $data['repeatPass']) {
            header("location: index.php?error=password_match");
            exit();
        }

        // Now attempt to register the user
        if ($this->userModel->RegisterUser("users", array("firstName", "lastname", "email", "Password"), array($data['firstname'], $data['lastname'], $data['email'], $data['Password']))) {
            header("location: index.php?action=login");
            exit();
        } else {
            header("location: index.php?error=registration_failed");
            exit();
        }
    }


    public function login()
        {
            $data = [
                'email' => trim($_POST['email']),
                'Password' => trim($_POST['password']),
            ];

            if(empty($data['email']) || empty($data['Password']))
            {
               //you have to handel if empty
                header("location: index.php?error=empty");
                exit();
            }
            if (!filter_var($data['email'], FILTER_SANITIZE_EMAIL)) {
                header("location: index.php?error=notvalid");
                exit();
            }

            // Check password length
            if (strlen($data['Password']) < 6) {
                header("location: index.php?error=password_length");
                exit();
            }
            else
            {
                $user = $this->userModel->loginUser($data['email'],$data['Password']);
                if($user)//if the login function returned a data
                {
                    $_SESSION['id_user'] = $user['id_user'];
                    header("location: index.php?action=dashboard");
                    exit();
                }
                else {
                    header("location: index.php?error=notvalid");
                    exit();
                }
            }

        }

        public function showUser()
        {
           $users =  $this->userModel->getUsers();
            include 'views/listOfStudents.php';
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
            case 'login':
                $init->login();
                break;
            default:
                header("location: index.php");
        }
    }


?>