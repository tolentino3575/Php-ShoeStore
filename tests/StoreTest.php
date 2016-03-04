<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Store.php";
require_once "src/Brand.php";

$server = 'mysql:host=localhost;dbname=shoes_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class StoreTest extends PHPUnit_Framework_TestCase
{
    protected function TearDown()
    {
        Store::deleteAll();
        Brand::deleteAll();
    }

    function test_getStoreName()
    {
        //Arrange
        $store_name = "Macys";
        $id = null;
        $test_store_name = new Store($store_name, $id);

        //Act
        $result = $test_store_name->getStoreName();

        //Assert
        $this->assertEquals($store_name, $result);
    }

    function test_getId()
    {
        //Arrange
        $store_name = "Macys";
        $id = 1;
        $test_store_id = new Store($store_name, $id);

        //Act
        $result = $test_store_id->getId();

        //Assert
        $this->assertEquals($id, $result);
    }

    function test_save()
    {
        //Arrange
        $store_name = "Macys";
        $id = 1;
        $test_store = new Store($store_name, $id);
        $test_store->save();

        //Act
        $result = Store::getAll();

        //Assert
        $this->assertEquals([$test_store], $result);
    }

    function test_getAll()
    {
        //Arrange
        $store_name = "Macys";
        $id = 1;
        $test_store = new Store($store_name, $id);
        $test_store->save();

        $store_name2 = "Shoe";
        $id = 2;
        $test_store2 = new Store($store_name2, $id);
        $test_store2->save();

        //Act
        $result = Store::getAll();

        //Assert
        $this->assertEquals([$test_store, $test_store2], $result);
    }

    function test_find()
    {
        //Arrange
        $store_name = "Macys";
        $id = 1;
        $test_store = new Store($store_name, $id);
        $test_store->save();

        //Act
        $result = Store::find($test_store->getId());

        //Assert
        $this->assertEquals($test_store, $result);
    }

    function test_addBrand()
    {
        //Arrange
        $store_name = "Macys";
        $id = 1;
        $test_store = new Store($store_name, $id);
        $test_store->save();

        $brand_name = "Nike";
        $id = 1;
        $test_brand = new Brand($brand_name, $id);
        $test_brand->save();

        //Act
        $test_store->addBrand($test_brand);
        $result = $test_store->getBrands();

        //Assert
        $this->assertEquals([$test_brand], $result);
    }

    function test_getBrands()
    {
        //Arrange
        $store_name = "Macys";
        $id = 1;
        $test_store = new Store($store_name, $id);
        $test_store->save();

        $brand_name = "Nike";
        $id2 = 2;
        $test_brand = new Brand($brand_name, $id2);
        $test_brand->save();

        $brand_name2 = "Vans";
        $id3 = 3;
        $test_brand2 = new Brand($brand_name2, $id3);
        $test_brand2->save();

        //Act
        $test_store->addBrand($test_brand);
        $test_store->addBrand($test_brand2);

        //Assert
        $this->assertEquals($test_store->getBrands(), [$test_brand, $test_brand2]);
    }

    function test_deleteStore()
    {
        $store_name = "Macys";
        $id = 1;
        $test_store = new Store($store_name, $id);
        $test_store->save();

        $store_name2 = "Shoe";
        $id = 2;
        $test_store2 = new Store($store_name, $id);
        $test_store2->save();

        //Act
        $test_store->deleteStore();
        $result = Store::getAll();

        //Assert
        $this->assertEquals([$test_store2], $result);
    }





}
?>
