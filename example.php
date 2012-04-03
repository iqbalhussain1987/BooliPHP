<?php
error_reporting(E_ALL | E_STRICT);
require('Booli.php');

//Set caller id and private key.
//TODO: YOU MUST CHANGE THESE
$callerId = 'TEST';
$key = 'TEST';

//Create instance of Booli object
$booli = new Booli( $callerId, $key );

//Get listing from Booli
$result = $booli->getListing('solna, stockholm');

//Display results
print_r( $result );

?>
