<?php

function printMenu() {
    $menu = <<<msg
    <div class="container-fluid">
        <nav class="navbar navbar-inverse ">
            <div class="container-fluid">
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">صفحه اصلی</a></li>
                        <li><a href="add.php">اضافه کردن کاربر</a></li>
                        <li><a href="search.php">جستجو</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </div>
msg;
    echo $menu . "<br>";
}

function printUsers($users) {
    $show = <<<jrm
    <table class = "table table-hover">
    <tr>
    <th>id</th>
    <th>نام کاربری</th>
    <th>نام</th>
    <th>نام خانوادگی</th>
    
    </tr>        
jrm;
    echo $show;
    foreach ($users as $value) {
        echo "<tr>";
        //echo "<td>" . $value['id'] . "</td>";
        echo "<td>" . "<a href=\"edit.php?id={$value['id']} \">{$value['id']}</a>" . "</td>";
        echo "<td>" . $value['username'] . "</td>";
        echo "<td>" . $value['firstname'] . "</td>";
        echo "<td>" . $value['lastname'] . "</td>";
//        echo "<td>" . $value['email'] . "</td>";
//        echo "<td>" . $value['phone1'] . "</td>";
//        echo "<td>" . $value['phone2'] . "</td>";
//        echo "<td>" . $value['phone3'] . "</td>";
//        echo "<td>" . $value['address'] . "</td>";
//        echo "<td>" . $value['comment'] . "</td>";
    }
    echo "</table>";
}

function chkLogin($email, $password) {
    global $db;
    $query = "SELECT * FROM login WHERE email=:email AND password=:password";
    $stmt = $db->prepare($query);
    $stmt->execute([":email" => $email, ":password" => $password]);
//    var_dump($email);
//    echo "<br>";
//    var_dump($password);
//    echo "<br>";
//    var_dump(count($stmt->fetchall(PDO::FETCH_ASSOC)));
    //die();
    if (count($stmt->fetchall(PDO::FETCH_ASSOC)) == 1) {
        return TRUE;
    } else {
        return FALSE;
    }
}
function redirect($url){
    header("Location: $url");
    exit();
}
function isLogin() {
    if ($_SESSION["user_in"] != 1) {
        redirect("login.php");
    }
}
