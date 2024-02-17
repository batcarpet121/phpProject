<?php 
class CafeMenuItem {
    private $itemName;
    private $itemPrice;
    private $itemType;
    private $itemImg;

    public function __construct($itemName, $itemPrice, $itemType, $itemImg){
        $this->itemName = $itemName;
        $this->itemPrice = $itemPrice;
        $this->itemType = $itemType;
        $this->itemImg = $itemImg;
    }
    public function getItemName(){
        return $this->itemName;
    }

    public function getItemPrice(){
        return $this->itemPrice;
    }

    public function getItemType(){
        return $this->itemType;
    }

    public function getItemImg(){
        return $this->itemImg;
    }



    public function setItemName($itemName){
        $this->itemName = $itemName;
    }

    public function setItemPrice($itemPrice){
        $this->itemPrice = $itemPrice;
    }

    public function setItemType($itemType){
        $this->itemType = $itemType;
    }

    public function setItemImg($itemImg){
        $this->itemImg = $itemImg;
    }


}

?>