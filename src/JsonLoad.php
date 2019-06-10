<?php
namespace VendingMachine;

class JsonLoad implements JsonRole
{
    private $file;
    

    public function __construct($filePath)
    {
        $this->file = file_get_contents($filePath);
    }

    public function load()
    {
        $result = json_decode($this->file, true);
        if(json_last_error() === 0){
            return $result;
        } else {
            echo "JSON file has invalid format!";
            return null;
        }
    }
}