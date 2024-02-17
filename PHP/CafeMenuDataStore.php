<?php 

class CafeMenuDataStore {
    private $filePointer;
    private $buffer;
    private $record;

    public function __construct($fileName){
       $this->filePointer = fopen($fileName, "r");
       include "CafeMenuConstruct.php";
    }

    public function getNext(){
        if(!feof($this->filePointer)){
            $this->buffer = fgets($this->filePointer);
            $this->record = explode(",",$this->buffer);

            return new CafeMenuItem($this-> record[0], $this-> record[1], $this-> record[2], $this-> record[3]);
        }else{
            $this->record = NULL;
        }
        return $this->record;
    }

    function __destruct(){
        fclose($this->filePointer);
    }
}

?> 