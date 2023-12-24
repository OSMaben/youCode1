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
            header("location: index.php?action=regester&error=empty");
            exit();
        }

        // Check email format
        if (!filter_var($data['email'], FILTER_SANITIZE_EMAIL)) {
            header("location: index.php?action=regester&error=notvalid");
            exit();
        }

        // Check password length
        if (strlen($data['Password']) < 6) {
            header("location: index.php?action=regester&error=password_length");
            exit();
        }

        // Check password match
        if ($data['Password'] !== $data['repeatPass']) {
            header("location: index.php?action=regester&error=password_match");
            exit();
        }

        // Now attempt to register the user
        if ($this->userModel->RegisterUser("users", array("firstName", "lastname", "email", "Password", "id_role"), array($data['firstname'], $data['lastname'], $data['email'], $data['Password'], 2))) {
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
                header("location: index.php?action=login&error=empty");
                exit();
            }
            if (!filter_var($data['email'], FILTER_SANITIZE_EMAIL)) {
                header("location: index.php?action=login&error=notvalid");
                exit();
            }

            // Check password length
//            if (strlen($data['Password']) < 6) {
//                header("location: index.php?error=password_length");
//                exit();
//            }
            else
            {
                $user = $this->userModel->loginUser($data['email'],$data['Password']);
                if($user)//if the login function returned a data
                {
                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['firstName'] = $user['firstName'];
                    include 'views/dashboard.php';
                    exit();
                }
                else {
                    header("location: index.php?action=login&error=notvalid");
                    exit();
                }
            }

        }

        public function showUser($id) {
                $users =  $this->userModel->getUsers($id);

                if($users)
                {
                    include 'views/listOfStudents.php';
                }
                else
                {
                    include 'views/login.php';
                }
        }


        public function deleteUser($id)
        {
            $this->userModel->suppremeUser('users', $id);
            $this->showUser($id);
            echo "<script>alert('deleted')</script>";
        }

    public function addUser()
        {
            $data = [
                'firstname' => trim($_POST['firstName']), // Fix the typo here
                'lastname' => trim($_POST['lastName']),
                'email' => trim($_POST['email']),
                'address' => trim($_POST['address']),
                'phone' => trim($_POST['phone'])
            ];

            if (empty($data['firstname']) || empty($data['lastname']) || empty($data['email'])
                || empty($data['address']) || empty($data['phone'])) {
                header("location: index.php?action=add-student");
                exit();
            }

            if (!filter_var($data['email'], FILTER_SANITIZE_EMAIL)){
                header("location: index.php?error=notvalid");
                exit();
            }

            else
            {
                $this->userModel->insert("users",['firstName','lastName','email','id_role','address','phone_number'],
                    [$data['firstname'],$data['lastname'], $data['email'],1,$data['address'],$data['phone']]);
                header('location: index.php?action=dashboard/student-list');
            }
        }

        public function showSingleUser($id)
        {
            $user = $this->userModel->getSingleUser($id);
            include 'views/edit-student.php';
        }

        public function editUser()
        {
            $data = [
                'firstname' => trim($_POST['firstName']),
                'lastname' => trim($_POST['lastName']),
                'email' => trim($_POST['email']),
                'address' => trim($_POST['address']),
                'phone' => trim($_POST['phone'])
                ];

            $this->userModel->update("users",['firstName','lastName','email','id_role','address','phone_number'],
                [$_POST['firstName'],$_POST['lastName'], $_POST['email'],1,$_POST['address'],$_POST['phone']], $_POST['id']);
            header('location: index.php?action=dashboard/student-list');
            exit();
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
            case 'adduser':
                $init->addUser();
                break;
            case 'editUser':
                $init->editUser();
                break;
            default:
                header("location: index.php");
        }
    }


?>