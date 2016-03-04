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
    }

?>
