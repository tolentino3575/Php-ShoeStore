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
    }

?>
