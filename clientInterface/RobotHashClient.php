<?php
include_once 'AvatarClientInterface.php';

/**
 * Classe RobotHashClient
 * Cette classe implémente l'interface AvatarClientInterface et fournit des méthodes pour obtenir des URL d'avatars à partir de RobotHash.
 */
class RobotHashClient implements AvatarClientInterface {
  /**
   * @var RobotHashClient
   * @access private
   * @static
   */
  private static $instances = [];

  protected function __construct() { }
  protected function __clone() { }
  public function __wakeup(){
    throw new \Exception("Cannot unserialize a singleton.");
  }

  /**
   * Obtient une instance unique de RobotHashClient en utilisant le modèle de singleton.
   *
   * @return RobotHashClient Une instance unique de RobotHashClient.
   */
  public static function getInstance(): RobotHashClient
  {
    $cls = static::class;
    if (!isset(self::$instances[$cls])) {
      self::$instances[$cls] = new static();
    }

    return self::$instances[$cls];
  }

  /**
   * Obtient une URL d'avatar aléatoire.
   * @return string Une URL d'avatar aléatoire.
   */
  function getRandomAvatarUrl(): string {
    $seed = $this->getRandomSeed();
    $url = "https://robohash.org/$seed";
    return $url;
  }

  /**
   * Obtient une URL d'avatar en fonction d'un hash spécifié.
   * @param string $hash Le hash à utiliser pour générer l'URL de l'avatar.
   * @return string Une URL d'avatar basée sur le hash spécifié.
   */
  function getRandomAvatarUrlFromHash($hash): string {
    $url = "https://robohash.org/$hash";
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