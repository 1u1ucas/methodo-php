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
    
    public function snacksToDrop() {
        $snacksToDrop = floor(mt_rand(0, 5));
        if ($this->snacksQty < $snacksToDrop) {
          $snacksToDrop = $this->snacksQty;
        }
    
        $this->snacksQty -= $snacksToDrop;

        return $snacksToDrop;
    }

    public function moneyToDrop() {
        $moneyToDrop = floor(mt_rand(0, 20));
        if ($this->money < $moneyToDrop) {
            $moneyToDrop = $this->money;
        }
    
        $this->money -= $moneyToDrop;

        return $moneyToDrop;
    }

    public function shootWithFoot() {
  
      if (!$this->isOn) {
        throw new Error('Vending machine is off');
      }
  
  
      $this->turnOnOff();

        return 'You have won ' . $this->snacksToDrop() . ' snacks and ' . $this->moneyToDrop() . ' money. Vending machine is now off';
    }
  
  }

    $vendingMachine = new VendingMachine();

    $vendingMachine->constructor();

    echo $vendingMachine->buySnack();

    echo $vendingMachine->reset();

    echo $vendingMachine->shootWithFoot();


  
  