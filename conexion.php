<?php
$con = mysqli_connect('localhost', 'root', '', 'library', '3306');

if(!$con){
    echo 'Error al conectar';
}