<?php
include_once 'DB-Connection-Model.inc';
$date = $_POST['date'];
$time = $_POST['time'];
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$email = $_POST['email'];
$notes = $_POST['notes'];

$SQL = "INSERT INTO person (date, time, quantity, name, email, notes)VALUES ('$date', '$time', '$quantity', '$name', '$email', '$notes')";
echo $SQL;
$conn->query($SQL);
