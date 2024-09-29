<?php
// hash password dengan bcrypt
$password = 'mypassword123';
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// echo $hashed_password;

if (password_verify($password, $hashed_password)) {
    echo "Password is valid";
} else {
    echo "Invalid password";
}

=>
?>

<!--  -->