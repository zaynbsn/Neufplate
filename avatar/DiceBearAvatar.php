<?php 
/**
 * Classe DiceBearAvatar
 * Représente un avatar généré à partir de DiceBearClient en utilisant un SpriteType spécifié.
 */
class DiceBearAvatar extends Avatar {

  /**
   * Constructeur de la classe DiceBearAvatar.
   * @param SpriteType $spriteType Le type de sprite associé à l'avatar.
   */
  public function __construct(SpriteType $spriteType) {
      $this->spriteType = $spriteType;
  }

  public SpriteType $spriteType;

  /**
   * Obtient le client DiceBear approprié pour générer l'avatar en utilisant le type de sprite spécifié.
   * @return AvatarClientInterface Le client DiceBear pour générer l'avatar.
   */
  public function getClient(): AvatarClientInterface {
    DiceBearClient::getInstance()->setSpriteType($this->spriteType);
    return DiceBearClient::getInstance();
  }
}

?>