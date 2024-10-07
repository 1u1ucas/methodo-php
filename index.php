<?php

class VendingMachine {

    private $isOn;
  
    private $snacksQty;
  
    private $money;
  
    private function turnOnOff() {
      $this->isOn = !$this->isOn;
    }
  
    public function constructor() {
      $this->isOn = false;
      $this->snacksQty = 50;
      $this->money = 0;
      $this->turnOnOff();
    }
  
    public function buySnack() {
  
      if (!$this->isOn) {
        throw new Error('Vending machine is off');
      }
  
      if ($this->snacksQty === 0) {
        throw new Error('No snacks left');
      }
  
  
      $this->snacksQty--;
      $this->money += 2;
  
      return 'Enjoy your snack!';
  
    }
  
    public function reset() {
  
      $this->isOn = false;
  
    $qtyLeft = $this->snacksQty;
  
      $this->snacksQty = $this->snacksQty + (50 - $qtyLeft);
  
      $this->money = 0;
      $this->turnOnOff();
  
      return 'Vending machine is now reset';
    }
  
    public function shootWithFoot() {
  
      if (!$this->isOn) {
        throw new Error('Vending machine is off');
      }
  
      $snacksToDrop = floor(mt_rand(0, 5));
      if ($this->snacksQty < $snacksToDrop) {
        $snacksToDrop = $this->snacksQty;
      }
  
      $this->snacksQty -= $snacksToDrop;
  
      $moneyToDrop = floor(mt_rand(0, 20));
      if ($this->money < $moneyToDrop) {
          $moneyToDrop = $this->money;
      }
  
      $this->money -= $moneyToDrop;
  
      $this->turnOnOff();

        return 'You have won ' . $snacksToDrop . ' snacks and ' . $moneyToDrop . ' money. Vending machine is now off';
    }
  
  }

    $vendingMachine = new VendingMachine();
  
  