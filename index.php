<?php
require __DIR__ . '/includes/header.php';
isLogin();
//echo realpath( __DIR__ . '/includes/header.php');
?>
<body>
    <?php
    printMenu();
    $users = getUsers();
    $m = filter_input(INPUT_GET, "m", FILTER_VALIDATE_INT);
    if ($m == 1) {
        echo "<h2>یوزر حذف شد</h2>";
    }
    echo "<div class = \"container-fluid\">";
    echo "<div class = \"col-md-3\">";
    printUsers($users);
    echo "</div>";
    echo "</div>";
    ?>
</body>
</html>
