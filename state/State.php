<?php
abstract class State implements SplSubject {
  public NeufPlate $neufPlate;
  private SplObjectStorage $observers;

  public function __construct(NeufPlate $neufPlate) { 
    $this->neufPlate = $neufPlate;
    $this->observers = new SplObjectStorage();
  }

  abstract function onTitling();
  abstract function onMakingCollision();
  abstract function onGenerating();

  public function attach(SplObserver $observer): void {
    $this->observers->attach($observer);
  }
  public function detach(SplObserver $observer): void {
    $this->observers->detach($observer);
  }
  public function notify(): void{
    foreach ($this->observers as $observer) {
        $observer->update($this);
    }
  }
}
?>
