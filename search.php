<?php
require __DIR__ . '/includes/header.php';
isLogin();
$searchBy = filter_input(INPUT_POST, 'searchBy');
$value = filter_input(INPUT_POST, 'value');
?>
<body>
    <?php
    printMenu();
    ?>
    <div class="container-fluid">
        <div class="col-md-4">
            <label>جستجو بر اساس</label>
            <form method="post">

                <select class="form-control" name="searchBy" >
                    <option value="username">یوزرنیم</option>
                    <option value="firstname">نام</option>
                    <option value="lastname">نام خانوادگی</option>
                    <option value="email">ایمیل</option>
                    <option value="phone1">شماره تلفن اول</option>
                    <option value="phone2">شماره تلفن دوم</option>
                    <option value="phone3">شماره تلفن سوم</option>
                    <option value="address">آدرس</option>
                    <option value="comment">توضیحات</option>
                </select>
                <div class="form-group">
                    <label>مقدار</label>
                    <input type="text" name = "value" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">جستجو</button>
            </form>
        </div>
        <div class="col-md-4">
            <form method="post">
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        if (!empty($_POST['value'])) {
            $users = searchBy($searchBy, $value);
            printUsers($users);
        }
        ?>
    </div>

</body>
</html>