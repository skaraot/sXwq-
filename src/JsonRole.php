<?php
namespace VendingMachine;

interface JsonRole{
	public function __construct($filePath);
	public function load();
}