<?php
require __DIR__ . '/includes/header.php';
isLogin();
if (!empty($_POST['username']) & !empty($_POST['phone1'])) {

    $username = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_INT);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone1 = filter_input(INPUT_POST, 'phone1', FILTER_SANITIZE_STRING);
    $phone2 = filter_input(INPUT_POST, 'phone2', FILTER_SANITIZE_STRING);
    $phone3 = filter_input(INPUT_POST, 'phone3', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    insertUser($username, $firstname, $lastname, $email, $phone1, $phone2, $phone3, $address, $comment);
}
?>
<body>
    <?php
    printMenu();
    ?>
    <div class="container-fluid">
        <div class="col-md-3">
            <form method="post">
                <div class="form-group">
                    <label>نام کاربری</label>
                    <input type="text" class="form-control" name="username" placeholder="نام کاربری">
                </div>
                <div class="form-group">
                    <label>نام</label>
                    <input type="text" class="form-control" name="firstname" placeholder="نام">
                </div>
                <div class="form-group">
                    <label>نام خانوادگی</label>
                    <input type="text" class="form-control" name="lastname" placeholder="نام خانوادگی">
                </div>
                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="email" class="form-control" name="email" placeholder="ایمیل">
                </div>
                <div class="form-group">
                    <label>شماره تلفن</label>
                    <input type="text" class="form-control" name="phone1" placeholder="شماره تلفن">
                </div>
                <div class="form-group">
                    <label>شماره تلفن</label>
                    <input type="text" class="form-control" name="phone2" placeholder="شماره تلفن">
                </div>
                <div class="form-group">
                    <label>شماره تلفن</label>
                    <input type="text" class="form-control" name="phone3" placeholder="شماره تلفن">
                </div>
                <div class="form-group">
                    <label>آدرس</label>
                    <input type="text" class="form-control" name="address" placeholder="آدرس">
                </div>
                <div class="form-group">
                    <label>توضیحات</label>
                    <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-default">تایید</button>
        </div>
    </form>
</div>

</body>
</html>