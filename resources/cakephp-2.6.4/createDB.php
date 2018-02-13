<?php
$db_server = mysqli_connect('localhost', 'root', '');
$create = 'create database if not exists cakeTut';
$db_server->query($create);
$db_server->close();

?>