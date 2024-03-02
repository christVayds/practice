<?php

class Security{
	public string $pass1;
	public string $pass2;

	public function __construct($pass1, $pass2){
		$this->pass1 = $pass1;
		$this->pass2 = $pass2;

		if($this->compare() == true && $this->checkLenght() == true){
			return true;
		}
		return false;
	}

	public function compare(){
		if($this->pass1 == $this->pass2){
			return true;
		}
		return false;
	}

	public function checkLenght(){
		if(strlen($this->pass1) >= 8){
			return true;
		}
		return false;
	}
}