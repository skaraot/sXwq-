<?php
namespace VendingMachine;

abstract class CheckPlease{

	public   $doorStatus;
	public   $capacityCheck;
	     

 	abstract public function Increment();
 	abstract public function Decrement();
 	abstract public function Status();
 	abstract public function setDoor();
 	
 }