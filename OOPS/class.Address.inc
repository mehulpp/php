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
		return 'LOOKUP';
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
	
}
?>