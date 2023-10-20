<?php
include 'includes.php';

$builder = new UserBuilder();
$user = $builder
->addNames('John', 'Doe')
->addAddress("Fake address 1234")
->addEmail("john.doe@yopmail.com")
->addPhone("07 69 80 25 77")
->build();

// echo($user->listUserInfos());
// lineBreak();

$neufplate = New NeufPlate();

$provider = new Provider(ProviderType::DICEBEAR, SpriteType::lorelei);
$nft = $neufplate->process($user, $provider);

// lineBreak(2);

// $robotProvider = new Provider(ProviderType::ROBOTHASH);
// $neufplate->process($user, $robotProvider);

?>