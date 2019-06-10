<?php
namespace VendingMachine;
class Machine extends CheckPlease{

	private    $rackList;
	protected  $limit;
	protected  $maxCapacity = 60; 
	private    $currentCount;
	public 	   $filePath;
	private    $minCountRack;
	private    $maxCountRack;	

	public function __construct($filePath){
		$this->filePath = $filePath;
		$this->reFresh();
		$this->limit = 1;
	}

	private function reFresh(){
		$this->rackList = (new JsonLoad($this->filePath))->load();
		$this->currentCount = 0;
		$min = -1;
		$max = -1;
		foreach ($this->rackList as $key => $value) {
			
			if ($min < 0){
				$min = $value;
				$this->minCountRack = $key;
			}else{
				if ($value < $min){
					$this->minCountRack = $key;
					$min = $value;
				}
			}

			if ($max < 0){
				$max = $value;
				$this->maxCountRack = $key;
			}else{
				if ($value > $max){
					$this->maxCountRack = $key;
					$max = $value;
				}
			}

		 	$this->currentCount += $value;
		}

	}

	public function Increment(){
		if ($this->doorStatus == true){
			if($this->currentCount < $this->maxCapacity){
			$result = "Kapak açık, yer var bir adet eklendi. Raf [{$this->minCountRack}]";
			}else{
				$result = "Kapak açık, yer yok eklenmedi";
			}
		}else{
			$result = "Kapak kapalı, ekleme yapılamaz";
		}
		return $result;
	}	

	public function Decrement(){
		if($this->doorStatus == false){
			if ($this->currentCount > $this->limit){
				return "Kapak kapalı, bir tane verildi. Raf [{$this->maxCountRack}]";
			}else{
				$result = "Kapak kapalı, ürün yok";
			}
		}else{
			$result = "Kapak açık, bekleniyor.";
		}

	}

	public function Status(){
		$this->reFresh();
		$percentStatus = number_format((($this->currentCount / $this->maxCapacity)*100),2);
		return $percentStatus;
	}

	public function setDoor($changeDoorStatu = false){
		/*
		* door true  --> open
		* door false --> close
		*/
		$this->doorStatus = $changeDoorStatu;
	}
}
