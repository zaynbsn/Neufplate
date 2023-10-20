<?php
class SmsNotificationListener implements SplObserver {

  public User $user;
  public Nft $nft;
  public function __construct(User $user, Nft $nft) {
    $this->user = $user;
    $this->nft = $nft;
  }
  public function update(SplSubject $subject): void {
    echo "Sms au " . $this->user->phone . ": Voici votre certificat de propriété : " . $this->nft->nonce;
    echo "<br/>";
  }
}

?>