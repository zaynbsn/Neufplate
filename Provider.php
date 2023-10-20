<?php
/**
 * La classe Provider représente un fournisseur de services liés aux types de données et aux sprites.
 */
class Provider
{
    public ProviderType $type;
    public ?SpriteType $spriteType;
    
    /**
     * Initialise un nouvel objet Provider avec le type de fournisseur et le type de sprite spécifiés.
     * @param ProviderType $type Le type de fournisseur.
     * @param SpriteType $spriteType Le type de sprite associé au fournisseur.
     */
    function __construct(ProviderType $type, SpriteType $spriteType = null) {
      $this->type = $type;
      $this->spriteType = $spriteType;
    }
}
?>
