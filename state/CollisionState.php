<?php
include_once 'state/GeneratingState.php';
include_once 'listener/EmailNotificationListener.php';
include_once 'listener/SmsNotificationListener.php';
class CollisionState extends State {

  function __construct(NeufPlate $neufPlate) {
    parent::__construct($neufPlate);
    
  }


  function onTitling() {
    return null;
  }
  function onMakingCollision() {
    $this->attachNotificationListener();

    $hash = '';
    $nonce = 0;
    while (!str_starts_with($hash, '0000')) {
      $nonce ++;
      $hash = sha1(strval($nonce) . "#" . $this->neufPlate->nft->title);
    }
    $this->neufPlate->nft->nonce = $nonce;
    $this->neufPlate->nft->hash = $hash;
    $this->notify();
    $this->neufPlate->changeState(new GeneratingState($this->neufPlate));
  
    return $hash;
  }
  function onGenerating() {
    return null;
  }
  private function attachNotificationListener() {
    if (isset($this->neufPlate->user->email)) {
      $this->attach(new EmailNotificationListener($this->neufPlate->user, $this->neufPlate->nft));
    }
    if (isset($this->neufPlate->user->phone)) {
      $this->attach(new SmsNotificationListener($this->neufPlate->user, $this->neufPlate->nft));
    }
  }
}
?>