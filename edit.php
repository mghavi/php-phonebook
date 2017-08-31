<?php
require __DIR__ . '/includes/header.php';
isLogin();
printMenu();
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_NUMBER_INT);
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone1 = filter_input(INPUT_POST, 'phone1', FILTER_SANITIZE_STRING);
$phone2 = filter_input(INPUT_POST, 'phone2', FILTER_SANITIZE_STRING);
$phone3 = filter_input(INPUT_POST, 'phone3', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_POST, 'action');
$id = filter_input(INPUT_GET, 'id');
$field = 'id';
$r = searchBy($field, $id);
if (count($r) == 0) {
    echo "<h2>یوزر وجود ندارد</h2>";
    die();
}
switch ($action) {
    case "delete":
        deleteUser($id);
        header('Location: index.php?m=1');
        break;
    case "update":
        updateUser($id, $username, $firstname, $lastname, $email, $phone1, $phone2, $phone3, $address, $comment);
        $_SESSION['msg'][]="تغییرات با موفقیت اعمال شد";
        break;
}
?>
<div class="container-fluid">
    <div class="col-md-3">
        <form method="post">
            <div class="form-group">
                <label>نام کاربری</label>
                <input type="text" class="form-control" name="username" value="<?= $r[0]['username'] ?>">
            </div>
            <div class="form-group">
                <label>نام</label>
                <input type="text" class="form-control" name="firstname" value="<?= $r[0]['firstname'] ?>">
            </div>
            <div class="form-group">
                <label>نام خانوادگی</label>
                <input type="text" class="form-control" name="lastname" value="<?= $r[0]['lastname'] ?>">
            </div>
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" class="form-control" name="email" value="<?= $r[0]['email'] ?>">
            </div>
            <div class="form-group">
                <label>شماره تلفن</label>
                <input type="text" class="form-control" name="phone1" value="<?= $r[0]['phone1'] ?>">
            </div>
            <div class="form-group">
                <label>شماره تلفن</label>
                <input type="text" class="form-control" name="phone2" value="<?= $r[0]['phone2'] ?>">
            </div>
            <div class="form-group">
                <label>شماره تلفن</label>
                <input type="text" class="form-control" name="phone3" value="<?= $r[0]['phone3'] ?>">
            </div>
            <div class="form-group">
                <label>آدرس</label>
                <input type="text" class="form-control" name="address" value="<?= $r[0]['address'] ?>">
            </div>
            <div class="form-group">
                <label>توضیحات</label>
                <textarea class="form-control" name="comment" rows="3"><?= $r[0]['comment'] ?></textarea>
            </div>
            <button type="submit" name = "action" value="delete" class="btn btn-default">حذف</button>
            <button type="submit" name = "action" value="update" class="btn btn-default">تایید</button>
    </div>
</form>
</div>

</body>
</html>
