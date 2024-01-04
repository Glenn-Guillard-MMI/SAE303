<?php
if (!isset($_COOKIE['ACF2L'])) {
$arr_cookie_options = array (
                'expires' => time() + 60*60*24*30, 
                'path' => '/', 
                'secure' => false,     // or false
                'httponly' => true,    // or false
                );
setcookie('ACF2L', 'vu', $arr_cookie_options);  

//GLENN faire la vu qui augmente à chaque et qui l'envoie à la base de donnée

header('location: index.php');
} else {
    header('location: index.php');
}
?>