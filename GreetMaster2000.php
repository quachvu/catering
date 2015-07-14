<?php
class GreetMaster2000
{
	private $greeting;
	private $name;
	
	public function __construct()
	{
		$this->name = "The GreetMaster 2000 (model Z)";
	}
	
	public function setGreeting($message)
	{
		$this->greeting = $message;
	}
	
	public function getGreeting()
	{
		return $this->greeting;
	}
	
	public function getFormalGreeting()
	{
		return "I, the " . $this->name . ", say to you:  \"" . $this->getGreeting() . "\"";
	}
	
}
?>