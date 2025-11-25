<?php
$host = "localhost";
$port = "5432";
$dbname = "nucleodiagnostico";
$user = "postgres";
$password = "12345"; // ccontraseña para acceder a postgresql

$conexion = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
