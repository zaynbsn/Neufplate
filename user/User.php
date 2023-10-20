<?php 
class User {
    public string $firstname;
    public string $lastname;
    public array $nftList = [];
    public string $phone;
    public string $email;
    public string $address;

    public function listUserInfos(): String {
      $userProperties = get_object_vars($this);
        $info = [];

        foreach ($userProperties as $property => $value) {
          if ($property !== 'nftList' && $value !== null) {
            $info[] = ucfirst($property) . ": " . $value;
          }
        }

        return implode(", ", $info);
    }
}
?>