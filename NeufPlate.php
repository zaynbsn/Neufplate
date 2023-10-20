<?php
include_once 'state/State.php';
include_once 'state/TitlingState.php';

/**
* La classe NeufPlate représente un objet qui gère le processus de création et de gestion d'une NFT (Non-Fungible Token).
* Elle permet de définir l'état actuel de la NFT et de passer à des états différents pour effectuer diverses opérations.
*/
class NeufPlate {
  public State $state;
  public Nft $nft;
  public Provider $provider;
  public User $user;

  /**
   * Initialise un nouvel objet NeufPlate avec un état par défaut.
   * @param User $user L'utilisateur associé à la NFT.
   * @param Provider $provider Le fournisseur de la NFT.
   */
  function process(User $user, Provider $provider) {
    $this->nft = New Nft();
    $this->user = $user;
    $this->provider = $provider;

    $this->state = new TitlingState($this);
    $title = $this->state->onTitling();
    $hash = $this->state->onMakingCollision($title);
    echo($hash);
    $avatar = $this->state->onGenerating($hash);

    array_push($this->user->nftList, $this->nft);
    return $this->nft;
  }

  /**
   * Change l'état actuel de l'objet NeufPlate vers un nouvel état.
   * @param State $newState Le nouvel état de l'objet.
   */
  function changeState(State $newState) {
    $this->state = $newState;
  }
}
?>