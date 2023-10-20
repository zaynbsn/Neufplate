<?php
class GeneratingState extends State {
  function __construct(NeufPlate $neufPlate) {
    parent::__construct($neufPlate);
  }
  function onTitling() {
    return null;
  }
  function onMakingCollision() {
    return null;
  }
  function onGenerating() {
    //generation avatar
    switch ($this->neufPlate->provider->type) {
      case ProviderType::DICEBEAR:
          $avatar = new DiceBearAvatar($this->neufPlate->provider->spriteType);
          break;
      case ProviderType::ROBOTHASH:
          $avatar = new RobotHashAvatar();
    }
    $avatar->generate($this->neufPlate->nft->hash);
    $this->neufPlate->nft->avatar = $avatar;
    echo('<br/>');
    echo($avatar->url);
    return $avatar;
  }
}
?>