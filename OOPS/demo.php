<?php
require 'class.Address.inc';
require 'class.Database.inc';
echo "<h2>Instatiating Address</h2>";
$address =new Address;

echo "<h2>Empty Address</h2>";
echo "<tt><pre>".var_export($address,true)."</pre></tt>";



echo "<h2>Setting Properties....</h2>";
$address->street_address_1 ="CHARKOP";
$address->city_name='Mumbai';
$address->subdivision_name="Sector 7";
$address->postal_code="400067";
$address->country_name="India";
$address->address_type_id=1;
echo "<tt><pre>".var_export($address,true)."</pre></tt>";

echo "<h2>Displaying Address......</h2>";
echo $address->display();


echo "<h2>Testing protected access</h2>";


// echo "Address id :{$address->_address_id}";


echo "<h2>Testing magic __get and __set</h2>";

unset($address->postal_code);
echo $address->display();



echo "<h2>Testing address __constrcut with an array</h2>";

$address2=new Address(array(
		'street_address_1'=>'123 Test',
		'city_name'=>'Bhuj',
		'subdivision_name'=>'Kutch',
		'postal_code'=>'123456',
		'country_name'=>'India',
));
echo $address2->display();


echo "<h2>Address __toString</h2>";

echo $address2;


echo "<h2>Displaying address types...</h2>";
echo "<tt><pre>".var_export($address->valid_address_types,true)."</pre></tt>";
echo "<tt><pre>".var_export(Address::$valid_address_types,true)."</pre></tt>";


echo "<h2>Testing address type Id Validation</h2>";



for ($id=0;$id<=4;$id++){
	echo "<div>$id :";
	 echo Address::isValidAddressTypeId($id) ? "Valid" :"Invalid";
	 echo "</div>";
}