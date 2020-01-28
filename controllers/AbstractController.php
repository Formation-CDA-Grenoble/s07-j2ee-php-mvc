<?php

/*
* AbstractController
* Cette classe permet de factoriser le code commun de tous les autres contrôleurs
* Elle ne sera jamais utilisée en tant que telle, on la qualifie donc d'"abstraite"
*/
abstract class AbstractController {
    // Méthode générique permettant d'afficher une page de notre application en incluant un modèle
    public function showTemplate($templateName, $data = []) {
        foreach ($data as $key => $value) {
            // Crée des variables à partir des données reçues du contrôleur
            // Exemple: transforme ['machin' => 'truc'] en $machin = 'truc'
            $$key = $value;
        }

        include('./views/head.php');
        include('./views/navbar.php');
        include('./views/' . $templateName . '.php');
        include('./views/footer.php');
        include('./views/foot.php');
    }
}
