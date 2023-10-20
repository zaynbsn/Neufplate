<?php
class CorporateBsClient {
  /**
 * @var CorporateBsClient
 * @access private
 * @static
 */
  private static $instances = [];

  /**
  * L'URL de l'API Corporate BS.
  */
  private const apiUrl = "https://corporatebs-generator.sameerkumar.website/";

protected function __construct() { }
protected function __clone() { }
public function __wakeup(){
    throw new \Exception("Cannot unserialize a singleton.");
}

  /**
  * Obtient une instance unique de CorporateBsClient en utilisant le modèle de singleton.
  * @return CorporateBsClient Une instance unique de CorporateBsClient.
  */
  public static function getInstance(): CorporateBsClient {
    $cls = static::class;
    if (!isset(self::$instances[$cls])) {
        self::$instances[$cls] = new static();
    }
    return self::$instances[$cls];
  }

  /**
  * Effectue une requête pour obtenir une phrase Corporate BS à partir de l'API.
  * @return string Une phrase Corporate BS.
  */
  public function makeRequest(): string {
    return file_get_contents(self::apiUrl);
  }

  /**
  * Analyse une chaîne JSON et extrait la phrase Corporate BS.
  * @param string $json La chaîne JSON à analyser.
  * @return string La phrase Corporate BS extraite.
  */
  public function parseJson(string $json) {
    $decoded_json = json_decode($json, false);
    return $decoded_json->phrase;
  }

  /**
  * Génère une phrase Corporate BS en effectuant une requête à l'API et en analysant la réponse JSON.
  * @return string Une phrase Corporate BS générée.
  */
  public function generateCorporateBs() {
    return $this->parseJson($this->makeRequest());
  }
}

?>