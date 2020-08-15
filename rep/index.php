<?php

/**
 * 
 */
class User
{
	private $name;
	private $greet;
	private $number;

	public function __construct($number){
		//echo 'constructor ran';
		$this->number=$number;
		//echo __CLASS__;
	}

	public function greetings(){

		return	$this->name. '  said  '.$this->greet;

	}

	public function __destruct(){
		//echo "fineshed running instances";
		echo "<br>";


	}

	public function setName($value){
		$this->name=$value;
	}


	public function __get($property){
		if(property_exists($this, $property)){
			return $this->$property;
		}
	}

	public function __set($property, $value){
		if (property_exists($this, $property)) {
			$this->$property=$value;
		}
		return $this;
	}
}

/**
 * 
 */
class bill extends User
{
	protected $drinks;
	protected $food;
	protected $amountf;
	protected $amoutD;

	public function __construct($number){
		parent::__construct($number);
	}
	
	public function __set($property, $value){
		if(property_exists($this, $property)){
			return $this->$property =$value;
		}
		return $this;
	}

	public function food(){
		return $this->amountf +=$this->number * $this->food;
	}

	public function drinks(){
		return $this->amoutD +=$this->number * $this->drinks;
	}

	public function billing(){
		return $this->food()+$this->drinks();
	}
	

}




$use=new User('kolo');
$use->__set('name', 'rukundo');
echo '<br>';
echo $use->__get('name');


$ur=new bill(4);
$ur->__set('food', 20);
$ur->__set('drinks', 24);
echo $ur->billing();



