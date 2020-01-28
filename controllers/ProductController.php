<?php

/*
* ProductController
* Contrôleur permettant de gérer les actions utilisateur liées aux produits
*/
class ProductController extends AbstractController {
    // Affiche la fiche d'un produit donné
    public function show($parameters) {
        // Récupère le numéro du produit dans les paramètres de la requête
        $id = $parameters[1];
        // Récupère le produit demandé dans la base de données
        $product = Product::find($id);

        // Si le produit n'existe pas, renvoyer une page d'erreur 404
        if (is_null($product)) {
            $errorController = new ErrorController;
            return $errorController->notFound();
        }

        // Sinon, affiche la fiche produit, en y injectant les données du produit demandé
        parent::showTemplate('product', [
            'product' => $product
        ]);
    }

    // Affiche la liste de tous les produits
    public function list() {
        // Récupère tous les produits en base de données
        $products = Product::findAll();
        
        // Affiche la liste des produits, en y injectant les données des produits demandés
        parent::showTemplate('product_list', [
            'products' => $products
        ]);
    }

    // Affiche le formulaire de modification d'un produit donné
    public function updateForm($parameters) {
        // Récupère le numéro du produit dans les paramètres de la requête
        $id = $parameters[1];
        // Récupère le produit demandé dans la base de données
        $product = Product::find($id);

        // Si le produit n'existe pas, renvoyer une page d'erreur 404
        if (is_null($product)) {
            $errorController = new ErrorController;
            return $errorController->notFound();
        }

        // Sinon, affiche le formulaire de modification, en y injectant les données du produit demandé
        parent::showTemplate('product_edit', [
            'product' => $product
        ]);
    }

    // Traite le formulaire de modification d'un produit donné
    public function update($parameters) {
        // Récupère le numéro du produit dans les paramètres de la requête
        $id = $parameters[1];
        // Récupère le produit demandé dans la base de données
        $product = Product::find($id);

        // Si le produit n'existe pas, renvoyer une page d'erreur 404
        if (is_null($product)) {
            $errorController = new ErrorController;
            return $errorController->notFound();
        }

        // Remplace les propriétés du produit par les données du formulaire
        $product->setName($_POST['name']);
        $product->setSerialNumber($_POST['serialNumber']);
        $product->setPrice($_POST['price']);
        
        // Met à jour le produit en base de données
        $product->update();

        // Affiche le formulaire de modification de produit
        $this->updateForm($parameters);
    }
}
