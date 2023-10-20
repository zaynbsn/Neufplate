<?php
include_once 'clientInterface/DiceBearClient.php';
include_once 'clientInterface/RobotHashClient.php';

/**
 * Classe abstraite Avatar
 * Représente un avatar généré à partir d'un client d'avatar.
 */
abstract class Avatar {
  public string $url;

  /**
   * Génère un avatar en utilisant un client d'avatar.
   * @param null|string $hash Le hash à utiliser pour générer l'avatar, par défaut null pour un avatar aléatoire.
   */
  public function generate($hash = null): void {
    $client = $this->getClient();

    if ($hash === null) {
      $this->url = $client->getRandomAvatarUrl();
    }else {
      $this->url = $client->getRandomAvatarUrlFromHash($hash);
    }
  }

  /**
   * Méthode abstraite pour obtenir le client d'avatar approprié.
   * @return AvatarClientInterface Le client d'avatar.
   */
  protected abstract function getClient(): AvatarClientInterface;
}
?>
