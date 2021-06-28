<?php 

include 'database.php';

$sql = "INSERT INTO medewerker VALUES (:id, :naam, :tussenvoegsel, :achternaam, :uname, :psw)";


$placeholders = [
    'id'=> NULL,
    'naam'=> 'Sameer',
    'tussenvoegsel'=> '',
    'achternaam'=> 'Bhageloe',
    'uname'=> 'user',
    'psw'=> password_hash('user', PASSWORD_DEFAULT)
];

$db = new database();
$db->insert($sql, $placeholders);
?>
