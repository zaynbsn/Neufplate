# Neufplate
Cours Design Pattern L'ecole by cci campus Gobelins Annecy.
TP créé et suivi du cours par Damien Dabernat, Intervenant à l'Ecole by CCI.

## Objectifs
- Apprendre les principes des designs patterns suivants :
  - Singleton
  - Factory
  - Builder
  - Etat
  - Observeur
- Respecter la méthode SOLID
- Appréhender les bons principes pour bien coder
- Faire le TP en deux language php/kotlin (ici uniquement php)

##  Build un User
```php
$builder = new UserBuilder();
$user = $builder
->addNames('John', 'Doe')
->addAddress("Fake address 1234")
->addEmail("john.doe@yopmail.com")
->addPhone("07 69 80 25 77")
->build();
```

## Instancier Neufplate et son provider (avec le client api DiceBear)
```php
$neufplate = New NeufPlate();
$provider = new Provider(ProviderType::DICEBEAR, SpriteType::lorelei);
```

## Générer un nft
```php
$nft = $neufplate->process($user, $provider);
```

## Exemple avec le client api RobotHash
```php
$robotProvider = new Provider(ProviderType::ROBOTHASH);
$robotNft = $neufplate->process($user, $robotProvider);
```
