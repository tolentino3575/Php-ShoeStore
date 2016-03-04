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
}
