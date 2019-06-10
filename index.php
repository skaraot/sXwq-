<?php
use VendingMachine\Machine;
require 'vendor/autoload.php';

$machine = new Machine('products/rackList.json');

$machine->setDoor(true);

echo "<pre>";
echo "Doluluk Oranı (%) " . $machine->Status();
echo "<pre>";

echo $machine->Increment();