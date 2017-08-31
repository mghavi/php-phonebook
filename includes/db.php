<?php
$username = "saeed_moein";
$password = "6TkcGkX3In";
$dbname = "saeed_mtelephone";
$charset = "utf8";
$host = "localhost";
$dsn = "mysql:dbname=$dbname;host=$host;charset=$charset";
$db = new PDO($dsn, $username, $password);

function getUsers() {
    global $db;
    $query = $db->query("SELECT * FROM user");
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function deleteUser($userId) {
    global $db;
    $query = $db->query("DELETE FROM user WHERE id=$userId");
    $result = $query->execute();
    if ($result === false) {
        var_dump($db->errorInfo());
        echo "<br>";
        echo $query;
        exit;
    }
    return $result;
}

function updateUser($userId, $username, $firstname, $lastname, $email, $phone1, $phone2, $phone3, $address, $comment) {
    global $db;
    $query = $db->query("UPDATE user SET username = $username, firstname = '$firstname', lastname= '$lastname', email= '$email', phone1='$phone1', phone2='$phone2', phone3= '$phone3', address= '$address', comment= '$comment' WHERE id=$userId");
    $result = $query->execute();
    if ($result === false) {
        var_dump($db->errorInfo());
        echo "<br>";
        echo $query;
        exit;
    }
    return $result;
}

function insertUser($username, $firstname, $lastname, $email, $phone1, $phone2, $phone3, $address, $comment) {
    global $db;
    $query = "INSERT INTO user (username, firstname, lastname, email, phone1, phone2, phone3, address, comment) VALUES ($username,'$firstname','$lastname','$email','$phone1','$phone2','$phone3','$address','$comment')";
    $result = $db->query($query);

    if ($result === false) {
        var_dump($db->errorInfo());
        echo "<br>";
        echo $query;
        exit;
    }
    return $db->lastInsertId();
}

function searchBy($field, $value) {
    global $db;
    $fields = ["id", "username", "firstname", "lastname", "email", "phone1", "phone2", "phone3", "address", "comment"];

    if (!in_array($field, $fields)) {
        echo "<h2>فیلد انتخابی صحیح نیست</h2><br>";
        die();
    }
    if ($field == "id") {
        $query = "SELECT * FROM user WHERE `$field` =?";
        $stmt = $db->prepare($query);
        $result = $stmt->execute(["$value"]);
    } else {
        $query = "SELECT * FROM user WHERE `$field` LIKE ?";
        $stmt = $db->prepare($query);
        $result = $stmt->execute(["%$value%"]);
        //var_dump($stmt->fetchAll());
    }
    if ($result === false) {
        var_dump($db->errorInfo());
        echo "<br>";
        echo $query;
        exit;
    }
    return $stmt->fetchAll();
}
