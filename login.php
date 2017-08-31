<?php
require __DIR__ . '/includes/header.php';
if (!empty($_SESSION['email']) && !empty($_SESSION['password'])) {
    if (chkLogin($_SESSION["email"], $_SESSION["password"])) {
        $_SESSION["user_in"] = 1;
        redirect("index.php");
    }
}
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
if (!empty($email)) {
    if (chkLogin($email, $password)) {
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        redirect("index.php");
    } else {
        echo "Wrong Email or Password";
    }
}
?>
<div class="container">
    <div class="row">

        <div class="col-md-4 col-sm-2 col-xs-1">
        </div>
        <div class="col-md-4 col-sm-8 col-xs-10">
            <form class="form-signin" method="post">
                <h2 class="form-signin-heading">ورود کاربران</h2>
                <label>ایمیل</label>
                <input type="email" class="form-control" placeholder="Email address" name= "email" required autofocus>
                <label>رمز عبور</label>
                <input type="password" class="form-control" name= "password" placeholder="Password" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">ورود</button>
            </form>
        </div>
        <div class="col-md-4 col-sm-2 col-xs-1">
        </div>
    </div>

</div>
</html>

