<?php
    require "libs/rb.php";
    R::setup( 'mysql:host=127.0.0.1;dbname=test', 'root', 'root');
    if ( !R::testConnection() )
{
        exit ('Нет соединения с базой данных');
}
    $con = mysqli_connect('localhost', 'root' ,'root', 'test');     
?>