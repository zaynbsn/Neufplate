<?php
/**
 * Interface AvatarClientInterface
 * Cette interface définit les méthodes nécessaires pour obtenir des URL d'avatar.
 */
  interface AvatarClientInterface {
    /**
     * Obtient une URL d'avatar aléatoire.
     * @return string Une URL d'avatar aléatoire.
     */
    public function getRandomAvatarUrl();

    /**
     * Obtient une URL d'avatar en fonction d'un hash spécifié.
     * @param string $hash Le hash à utiliser pour générer l'URL de l'avatar.
     * @return string Une URL d'avatar basée sur le hash spécifié.
     */
    public function getRandomAvatarUrlFromHash(string $hash);
  }
?>