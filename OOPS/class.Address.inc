<?php
/*
 * Physcial address  */
class Address{
	const ADDRESS_TYPE_RESIDENCE=1;
	CONST ADDRESS_TYPE_BUSINESS=2;
	CONST ADDRESS_TYPE_PARK=3;
	static public $valid_address_types=array(
 			/* 1=>'Residence',
			2=>'Business',
			3=>'Park', */
			Address::ADDRESS_TYPE_RESIDENCE=>'Residence',
			Address::ADDRESS_TYPE_BUSINESS=>'Business',
			Address::ADDRESS_TYPE_PARK=>'Park',
			
	);
	
	/* public $streetName;
	public $subdivision_name ='Mumbai';
	public $_city; */
	//Strert Address
	public $street_address_1;
	public $street_address_2;
	//name of the city;
	public $city_name;
	//name of the sub divsion
	public $subdivision_name;
	
	//postal code;
	protected  $_postal_code;
	
	//country name;
	public $country_name;
	
	//primary key of address
	protected $_address_id;
	protected $_address_type_id;
	protected $_time_created;
	protected $_time_updated;
	
	/*
	 * Constuctor
	 * @param array $data optional array of property names and values.
	 *   */
	function __construct($data=array()){
		$this->_time_created=time();
		//Emsures that the adddress can be populated .
		if (!is_array($data)){
			trigger_error('Unable to constrcut address with a '.get_class($name));
		}
		
		//if there is at least one values .polulated the address with it.
		if (count($data) > 0){
			foreach ($data as $name=>$value){
				//special case for protected properties.
				if (in_array($name, array(
						'time_created',
						'time_updated'
						
				))){
					$name='_'.$name;
				}
				$this->$name=$value;
			}
		}
	}
	/* 
	 * magic __get
	 * @param string $name
	 * @return mixed
	 *  */
	function __get($name){
		//postal code lookup if unset
		if (!$this->_postal_code){
			$this->_postal_code=$this->_postal_code_guess();
		}
		//attempt to return a protected proprty by name.
		$protected_property_name='_'.$name;
		if (property_exists($this, $protected_property_name)){
			return $this->$protected_property_name;
		}
		
		//unable to access property:trigger error
		trigger_error('Undefined propert via _get:'.$name);
		return null;
	}
	/* 
	 * magic __set
	 * @prama strign $name
	 * @param mixed $value */
	function __set($name,$value){
		//only set valid address type id
		if('address_type_id' == $name){
			$this->_setAddressTypeId($value);
			return;
		}
		//allow anything to set the potal code
		if ('postal_code' == $name) {
			$this->$name = $value;
			return ;
		}
		
		//unable to access property :trigger error
		trigger_error('Undefined or Allowed property via __set():'.$name);
	}
	
	function __toString(){
		return $this->display();
		
	}
	/* guess the postal code given the subdivsion and city name
	 * @todo replace with a database lookup.
	 *  */
	protected function _postal_code_guess(){
		//return 'LOOKUP';
		
		$db=Database::getInstance();
		$mysqli=$db->getConnection();
		
		$sql_query="SELECT postal_code ";
		$sql_query .="from location";
		
		$city_name =$mysqli->real_escape_string($this->city_name);
		$sql_query .=" where city_name = '".$city_name."' ";
		
		$subdivision_name=$mysqli->real_escape_string($this->subdivision_name);
		$sql_query .="and subdivision_name = '".$subdivision_name."'";
		
		
		//echo $sql_query;
		$result=$mysqli->query($sql_query);
		
		if ($row = $result->fetch_assoc()){
			return $row['postal_code'];
		}
		
	}
	
	/* display address in broswer */
	function display(){
		$output='';
		$output.=$this->street_address_1;
		if ($this->street_address_2){
			$output .= '<br/>'.$this->street_address_2;
		}
		$output .="<br/>";
		$output .=$this->city_name.", ".$this->subdivision_name;
		$output .=" ".$this->postal_code;
		
		$output .="<br/>".$this->country_name;
		
		
		return $output;
	}
	
	/* 
	 * Determine if an address type is valid
	 * @param int address
	 * @return boolean */
	static public function isValidAddressTypeId($address_type_id){
		return array_key_exists($address_type_id, self::$valid_address_types);
	}
	
	/* 
	 * if valid set the address type id
	 * @prama int $address type id
	 *  */
	protected function _setAddressTypeId($address_type_id){
		if (self::isValidAddressTypeId($address_type_id)){
			$this->_address_type_id=$address_type_id;
			
		}
	}
}
?>