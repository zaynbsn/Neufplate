<?php 
class Nft {
  public string $title;
  public string $hash;
  public Avatar $avatar;
  public Int $nonce;

  public function getNftCertificate(): String {
    return strval($this->nonce)."#".$this->title;
  }
}
?>