<?php

require_once 'controllers/users.php';
$users = new Users;

?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="assets/cssbootstrap.min.css">
<link rel="stylesheet" href="assets/css/feather.css">
<link rel="stylesheet" href="assets/css/flags.css">
<link rel="stylesheet" href="assets/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include 'aside.php' ?>
    <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Students</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                                    <li class="breadcrumb-item active">All Students</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="student-group-form">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by ID ...">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Name ...">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Phone ...">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button type="btn" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">

                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Students</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">

                                            <a href="add-student.html" class="btn btn-primary"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                        <thead class="student-thread">
                                            <tr>
                                                <th>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="something">
                                                    </div>
                                                </th>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Address</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            foreach($users as $user)
                                            {
                                                echo "
                                                <tr>
                                                <td>
                                                    <div class='form-check check-tables'>
                                                        <input class='form-check-input' type='checkbox'
                                                            value='something'>
                                                    </div>
                                                </td>
                                                <td>$user[id_user]</td>
                                                <td>
                                                    <h2 class='table-avatar'>
                                                        <a href='student-details.html'
                                                            class='avatar avatar-sm me-2'><img
                                                                class='avatar-img rounded-circle'
                                                                src='assets/img/profiles/avatar-03.jpg'
                                                                alt='User Image'></a>
                                                        <a href='student-details.html'>$user[firstName]</a>
                                                    </h2>
                                                </td>
                                                <td>$user[lastName]</td>
                                                <td>$user[email]</td>
                                                <td>$user[phone_number]</td>
                                                <td>$user[address]</td>
                                                <td class='text-end'>
                                                    <div class='actions '>
                                                        <a href='javascript:;'
                                                            class='btn btn-sm bg-danger me-2 '>
                                                            <i class='fa-regular fa-trash-can text-white'></i>
                                                        </a>
                                                        <a href='edit-student.html' class='btn btn-sm bg-success '>
                                                            <i class='fa-solid fa-pencil text-white'></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                                ";
                                            }
                                          ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <p>Copyright © 2022 Dreamguys.</p>
            </footer>

        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/js/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>