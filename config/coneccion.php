<?php
$host = "localhost";
$port = "5432";
$dbname = "electrica";
$user = "postgres";
$password = "root";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";

$dbconn = pg_connect($connection_string);
