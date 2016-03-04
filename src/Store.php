<?php

    class Store
    {
        private $store_name;
        private $id;

        function __construct($store_name, $id=null)
        {
            $this->store_name = $store_name;
            $this->id = $id;
        }

        function setStoreName($new_storeName)
        {
            $this->store_name = (string) $new_storeName;
        }

        function getStoreName()
        {
            return $this->store_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stores (store_name) VALUES ('{$this->getStoreName()}');");
            $this->id=$GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_store = $GLOBALS['DB']->query("SELECT * FROM stores");
            $stores = array();
            foreach($returned_store as $store){
                $store_name = $store['store_name'];
                $id = $store['id'];
                $new_store = new Store($store_name, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores");
        }

        static function find($search_id)
        {
            $found_store = null;
            $stores = Store::getAll();

            foreach ($stores as $store)
            {
                $store_id = $store->getId();
                if ($store_id == $search_id)
                {
                    $found_store = $store;
                }
            }
            return $found_store;
        }

        function addBrand($brand)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (brand_id, store_id) VALUES ({$brand->getId()}, {$this->getId()});");
        }

        function getBrands()
        {
            $brands = $GLOBALS['DB']->query("SELECT brands.* FROM stores
                JOIN brands_stores ON (stores.id = brands_stores.store_id)
                JOIN brands ON (brands_stores.brand_id = brands.id)
                WHERE stores.id = {$this->getId()};");

            $result_brands = array();
            foreach ($brands as $brand)
            {
                $brand_name = $brand['brand_name'];
                $id = $brand['id'];
                $new_brand = new Brand($brand_name, $id);
                array_push($result_brands, $new_brand);
            }
            return $result_brands;
        }
        
        function deleteStore()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
        }
    }






?>
