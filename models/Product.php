<?php

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

    private static function convertDataToProducts($data) {
        return array_map(function($item) {
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

    public static function findAll() {
        $dbManager = new DatabaseManager;
        $statement = $dbManager->query('SELECT * FROM `product`');
        $results = self::convertDataToProducts($statement->fetchAll());
        
        return $results;
    }

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