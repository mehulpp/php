<?php
require 'class.Address.inc';
require 'class.Database.inc';

echo "<h2>Instantiating Address</h2>";

$address = new Address();

echo "<h2>Setting Properties</h2>";
$address->street_address_1='Charkop';
$address->city_name="Mumbai";
$address->subdivision_name="Borivali";
$address->country_name="India";
$address->address_type_id='1';
echo $address;

echo "<h2>Testing Address __construct with an array</h2>";
$address_2=new Address(array(
		'street_address_1'=>'Bhuj',
		'city_name'=>'Kutch',
		'subdivision_name'=>'Region',
		'country_name'=>'India'
));

echo $address_2;
