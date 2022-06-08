<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=register', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$name = "";
$username= "";
$email = "";
$password = '';
$errors = array();




if ($_SERVER['REQUEST_METHOD']==='POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$username) {
        $errors[] = "Username is required";
    }
    if (!$password) {
        $errors[] = "Password is required";
    }
    if (empty($errors)) {


        $statement = $pdo->prepare("INSERT INTO tb_user (name,username,pasword)
                VALUES (:name , :username, :pasword)");


        $statement->bindValue(':name', $name);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':pasword', $password);
        $statement->execute();
        header('Location: login.php');
    }
}






?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="app1.cs">
<section class="vh-100 bg-image"
         style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form method="post" action="register.php">


                                <div class="form-outline mb-4">
                                    <input type="text" name="name" id="name" class="form-control form-control-lg" value="<?php echo $name?>" />
                                    <label class="form-label" for="name">Your Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" name="username" id="username" class="form-control form-control-lg" value="<?php echo $username?>"   />
                                    <label class="form-label" for="username">Username</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="email" class="form-control form-control-lg"  value="<?php echo $email?>" />
                                    <label class="form-label" for="email">Your Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" value="<?php echo $password?>"/>
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name= "repeatpassword" id="repeatpassword" class="form-control form-control-lg" />
                                    <label class="form-label" for="repeatpassword">Repeat your password</label>
                                </div>



                                <div class="d-flex justify-content-center">
                                    <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" >Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                                                                                                        class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>