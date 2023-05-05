<?php


if (!file_exists("image/")) {
    mkdir("image/");
}

if (isset($_FILES['test'])) {

    $key = bin2hex(openssl_random_pseudo_bytes(32));
    $allow = ['jpg', 'png', 'gif', 'txt'];
    $info = pathinfo($_FILES['test']['name'], PATHINFO_EXTENSION);
    if (!in_array($info, $allow)) {
        die("Error !");
    } else {
        $path = $_FILES['test']['tmp_name'];
        $basePath = __DIR__ . "/image/{$key}.{$info}";
        if (move_uploaded_file($path, $basePath)) {
            die("DOWN!");
        } else {
            die("Error !");
        }
    }

}



?>