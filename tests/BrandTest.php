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







}
