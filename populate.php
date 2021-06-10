<?php 

require_once 'database.php';

$db = new database();
$sql = "INSERT INTO medewerker VALUES (:id, :naam, :tussenvoegsel, :achternaam, :uname, :psw)";


$placeholders = [
    'id'=> NULL,
    'naam'=> 'Sameer',
    'tussenvoegsel'=> '',
    'achternaam'=> 'Bhageloe',
    'uname'=> 'user',
    'psw'=> password_hash('user', PASSWORD_DEFAULT)
];

$db->insert($sql, $placeholders);
?>