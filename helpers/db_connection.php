<?php
//აქ მე ლოკალჰოსტის დათაბეისი გამოვიყენე, შენ ის ბაზა ჩაწერე რომელსაც დაუკავშირდება შემდგომ.
$serverName = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project';

$connection = new mysqli($serverName, $username, $password, $dbname);