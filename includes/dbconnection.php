<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con=mysqli_connect("localhost", "root", "", "fosdb");
if(mysqli_connect_errno()){
    die("Database unavailable: " . mysqli_connect_error());
}
mysqli_set_charset($con, 'utf8mb4');

function app_verify_password($plainPassword, $hash) {
    if (password_verify($plainPassword, $hash)) {
        return true;
    }
    return md5($plainPassword) === $hash;
}

function app_hash_password($plainPassword) {
    return password_hash($plainPassword, PASSWORD_DEFAULT);
}

?>

