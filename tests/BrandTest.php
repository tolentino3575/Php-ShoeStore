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

class BrandTest extends PHPUnit_Framework_TestCase
{
    protected function TearDown()
    {
        Brand::deleteAll();
    }

    function test_getBrandName()
    {
        //Arrange
        $brand_name = "Nike";
        $id = 1;
        $test_brand_name = new Brand($brand_name, $id);

        //Act
        $result = $test_brand_name->getBrandName();

        //Assert
        $this->assertEquals($brand_name, $result);
    }

    function test_getId()
    {
        //Arrange
        $brand_name = "Nike";
        $id = 1;
        $test_brand_id = new Brand($brand_name, $id);

        //Act
        $result = $test_brand_id->getId();

        //Assert
        $this->assertEquals($id, $result);
    }

    function test_save()
    {
        //Arrange
        $brand_name = "Nike";
        $id = 1;
        $test_brand = new Brand($brand_name, $id);
        $test_brand->save();

        //Act
        $result = Brand::getAll();

        //Assert
        $this->assertEquals([$test_brand], $result);
    }

    function test_getAll()
    {
        //Arrange
        $brand_name = "Nike";
        $id = 1;
        $test_brand = new Brand($brand_name, $id);
        $test_brand->save();

        $brand_name2 = "Vans";
        $id = 2;
        $test_brand2 = new Brand($brand_name2, $id);
        $test_brand2->save();

        //Act
        $result = Brand::getAll();

        //Assert
        $this->assertEquals([$test_brand, $test_brand2], $result);
    }

    function test_find()
    {
        //Arrange
        $brand_name = "Nike";
        $id = 1;
        $test_brand = new Brand($brand_name, $id);
        $test_brand->save();

        //Act
        $result = Brand::find($test_brand->getId());

        //Assert
        $this->assertEquals($test_brand, $result);
    }

    function test_addStore()
    {
        //Arrange
        $brand_name = "Nike";
        $id = 1;
        $test_brand = new Brand($brand_name, $id);
        $test_brand->save();

        $store_name = "Macys";
        $id2 = 2;
        $test_store = new Store($store_name, $id);
        $test_store->save();

        //Act
        $test_brand->addStore($test_store);
        $result = $test_brand->getStores();

        //Assert
        $this->assertEquals([$test_store], $result);
    }

    function test_getStores()
    {
        //Arrange
        $brand_name = "Nike";
        $id = 1;
        $test_brand = new Brand($brand_name, $id);
        $test_brand->save();

        $store_name = "Macys";
        $id2 = 2;
        $test_store = new Store($store_name, $id2);
        $test_store->save();

        $store_name2 = "Shoe";
        $id3 = 3;
        $test_store2 = new Store($store_name2, $id3);
        $test_store2->save();

        //Act
        $test_brand->addStore($test_store);
        $test_brand->addStore($test_store2);

        //Assert
        $this->assertEquals($test_brand->getStores(), [$test_store, $test_store2]);
    }


}
?>
