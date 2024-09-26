<?php
session_start();

$_SESSION["user_name"] = "alhiefikri";
$_SESSION["age"] = "21";

// echo $_SESSION["user_name"];

if (isset($_SESSION['user_name'])) {
    echo $_SESSION['user_name'];
} else {
    echo 'session tidak ditemukan';
}
if (isset($_SESSION['age'])) {
    echo $_SESSION['age'];
} else {
    echo 'session tidak ditemukan';
}

unset($_SESSION['user_name']);

session_destroy();
$_SESSION = [];

echo "<br>" . $_SESSION['user_name'];
echo $_SESSION['age'];
