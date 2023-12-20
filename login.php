<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
<?php
    include '../header.php';
?>
    <div class="container my-5  h-100">
        

        <div class="row justify-content-center align-items-center">
            <div class="col-sm-4">
                <div class="card">
                    <article class="card-body">
                        <a href="" class="float-right btn btn-outline-primary">Sign up</a>
                        <h4 class="card-title mb-4 mt-1">Sign in</h4>
                        <form>
                            <div class="form-group">
                                <label>Your email</label>
                                <input name="" class="form-control" placeholder="Email" type="email">
                            </div> <!-- form-group// -->
                            
                            <div class="form-group">
                               
                            </div> <!-- form-group// -->
                            
                            <div class="form-group my-2">
                                
                                <input class="form-control" placeholder="******" type="password">
                                <div class="checkbox">
                                    <label> <input type="checkbox"> Save password </label>
                                </div> <!-- checkbox .// -->
                            </div> <!-- form-group// -->
                            <div class="form-group my-2">
                                <button type="submit" class="btn btn-primary btn-block"> Login </button>
                            </div> <!-- form-group// -->
                            <a class="float-right" href="#">Forgot?</a>
                                <label>Your password</label>
                                
                        </form>
                    </article>
                </div> <!-- card.// -->
            </div>
        </div>

</body>

</html>