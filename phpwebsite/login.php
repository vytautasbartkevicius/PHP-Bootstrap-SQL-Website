<?php


$name = "";
$username= "";
$email = "";
$pasword = '';
$errors = array();
$conn = mysqli_connect("localhost", "root", "","register");
if(isset($_POST["username"])) {
    $username = $_POST["username"];
    $pasword = $_POST["pasword"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($pasword == $row['pasword']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        } else {
            echo
            "<script> alert('Wrong Password'); </script>";

        }
    } else {
        echo
        "<script> alert('User Not Registered'); </script>";

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
                            <h2 class="text-uppercase text-center mb-5">Login</h2>

                            <form>

                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example1cg">Username</label>
                                </div>


                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                </div>



                                <div class="d-flex justify-content-center">
                                    <a href="index.php "button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" >Login </a>

                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Do not have an account?? <a href="register.php"
                                                                                                        class="fw-bold text-body"><u>Register here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>