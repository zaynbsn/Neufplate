<?php
include_once 'AvatarClientInterface.php';

/**
 * Classe DiceBearClient
 * Cette classe implémente l'interface AvatarClientInterface et fournit des méthodes pour obtenir des URL d'avatars à partir de DiceBear.
 */
class DiceBearClient implements AvatarClientInterface{
  /**
   * @var DiceBearClient
   * @access private
   * @static
   */
  private static $instances = [];

  protected function __construct() { }
  protected function __clone() { }
  public function __wakeup(){
    throw new \Exception("Cannot unserialize a singleton.");
  }

  public $spriteType = null;

  /**
   * Obtient une instance unique de DiceBearClient en utilisant le modèle de singleton.
   *
   * @return DiceBearClient Une instance unique de DiceBearClient.
   */
  public static function getInstance(): DiceBearClient
  {
    $cls = static::class;
    if (!isset(self::$instances[$cls])) {
      self::$instances[$cls] = new static();
    }

    return self::$instances[$cls];
  }
  
  /**
   * Définit le type de sprite à utiliser pour générer les avatars.
   * @param $spriteType Le type de sprite.
   */
  function setSpriteType($spriteType) {
    $this->spriteType = $spriteType->value;
  }

  
  /**
   * Obtient une URL d'avatar aléatoire.
   * @return string Une URL d'avatar aléatoire.
   */
  function getRandomAvatarUrl(): string {
    $seed = $this->getRandomSeed();
    $url = "https://api.dicebear.com/7.x/$this->spriteType/svg?seed=$seed";
    return $url;
  }

  /**
   * Obtient une URL d'avatar en fonction d'un hash spécifié.
   * @param string $hash Le hash à utiliser pour générer l'URL de l'avatar.
   * @return string Une URL d'avatar basée sur le hash spécifié.
   */
  function getRandomAvatarUrlFromHash($hash): string {
    $url = "https://api.dicebear.com/7.x/$this->spriteType/svg?seed=$hash";
    return $url;
  } 

  /**
   * Génère une séquence aléatoire de caractères pour être utilisée comme seed.
   * @return string Une séquence aléatoire de caractères.
   */
  function getRandomSeed(): string {
    $length = rand(5, 10);
    $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randString = '';
    for ($i = 0; $i < $length; $i++) {
        $randString .= $char[rand(0, strlen($char) - 1)];
    }
    return $randString;
  }
}

?>  