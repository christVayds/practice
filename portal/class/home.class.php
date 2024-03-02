<?php

include "date.class.php";

class Post{
	public $Name;
	public $title;
	public $content;
	public $date;
	public $media;

	public function __construct($Name, $title, $content, $date, $media){
		$this->Name = $Name;
		$this->title = $title;
		$this->content = $content;
		$this->date = $date;
		$this->media = $media;
	}
}

class Notification{
	public $_type;
	public $title;
	public $content;
	public $date;

	public function __construct($_type, $title, $content, $date){
		$this->_type = $_type;
		$this->title = $title;
		$this->content = $content;
		$this->date = $date;
	}
}
