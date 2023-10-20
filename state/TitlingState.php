<?php
include_once 'state/CollisionState.php';

// Class titlingState with parent constructor
// implements Ontitling() -> generate bs -> title -> change state to next state -> return title
class TitlingState extends State {
  function __construct(NeufPlate $neufPlate) {
    parent::__construct($neufPlate);
  }
  function onTitling() {
    $title = CorporateBsClient::getInstance()->generateCorporateBs();
    $this->neufPlate->changeState(new CollisionState($this->neufPlate));
    $this->neufPlate->nft->title = $title;
    return $title;
  }
  function onMakingCollision() {
    return null;
  }
  function onGenerating() {
    return null;
  }
}
?>