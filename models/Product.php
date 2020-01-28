<?php

/*
* Product
* Classe miroir permettant de manipuler les données de la table 'product' sous forme d'objets
* Responsable des interactions avec la table 'product' dans la base de données
*/
class Product {
    private $id;
    private $serialNumber;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $weight;
    private $picture;
    private $brandId;

    // Constructeur permettant d'initialiser les propriétés d'un produit
    public function __construct(
        $id = null,
        $serialNumber = '',
        $name = '',
        $description = '',
        $price = 0,
        $stock = 0,
        $weight = 0,
        $picture = '',
        $brandId = null
    ) {
        $this->id = $id;
        $this->serialNumber = $serialNumber;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->weight = $weight;
        $this->picture = $picture;
        $this->brandId = $brandId;
    }

    // Méthode réutilisable permettant de convertir les résultats des requêtes en base de données
    // en objets Product
    private static function convertDataToProducts($data) {
        // Transforme chaque tableau de données sortant de la base de données...
        return array_map(function($item) {
            // ...en un objet Product qui possède les mêmes propriétés
            return new Product(
                $item['id'],
                $item['serial_number'],
                $item['name'],
                $item['description'],
                $item['price'],
                $item['stock'],
                $item['weight'],
                $item['picture'],
                $item['brand_id']
            );
        }, $data);
    }

    // Renvoie la liste de tous les produits sous forme d'objets Product
    public static function findAll() {
        $dbManager = new DatabaseManager;
        $statement = $dbManager->query('SELECT * FROM `product`');
        $results = self::convertDataToProducts($statement->fetchAll());
        
        return $results;
    }

    // Renvoie un produit identifié par son numéro sous la forme d'un objet Product
    public static function find($id) {
        $dbManager = new DatabaseManager;
        $statement = $dbManager->query('SELECT * FROM `product` WHERE `id`=' . $id);
        $results = $statement->fetchAll();

        if (empty($results)) {
            return null;
        }

        $results = self::convertDataToProducts($results);
        
        return $results[0];
    }

    // Met à jour les informations de produit concerné dans la base de données
    public function update() {
        $dbManager = new DatabaseManager;
        // Crée le modèle de la requête SQL
        $sql = <<<SQL
            UPDATE `product`
            SET `serial_number` = ?,
                `name` = ?,
                `description` = ?,
                `price` = ?,
                `stock` = ?,
                `weight` = ?,
                `picture` = ?,
                `brand_id` = ?
            WHERE `id` = ?
        SQL;

        // Prépare la requête SQL à recevoir les données pour remplacer les '?'
        $statement = $dbManager->prepare($sql);
        // Exécute la requête en remplaçant tous les '?' par les valeurs ci-dessous, dans l'ordre
        $statement->execute([
            $this->serialNumber,
            $this->name,
            $this->description,
            $this->price,
            $this->stock,
            $this->weight,
            $this->picture, 
            $this->brandId,
            $this->id
        ]);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of serialNumber
     */ 
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Set the value of serialNumber
     *
     * @return  self
     */ 
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of brandId
     */ 
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * Set the value of brandId
     *
     * @return  self
     */ 
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }
}