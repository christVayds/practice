<?php

class Date{
	public $month;
	public $day;
	public $year;

	public function __construct($month, $day, $year){
		$this->month = $month;
		$this->day = $day;
		$this->year = $year;
	}

	public function showDate(){
		$dateformat = $this->month . "/" . $this->day . "/" . $this->year;
		return $dateformat;
	}
}