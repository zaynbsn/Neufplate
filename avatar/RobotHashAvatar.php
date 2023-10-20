<?php
/**
 * Classe RobotHashAvatar
 * Représente un avatar généré à partir de RobotHashClient.
 */
class RobotHashAvatar extends Avatar {
  /**
   * Obtient le client RobotHash approprié pour générer l'avatar.
   * @return AvatarClientInterface Le client RobotHash pour générer l'avatar.
   */
  public function getClient(): AvatarClientInterface {
    return RobotHashClient::getInstance();
  }
}
?>