<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Store.php";

$server = 'mysql:host=localhost;dbname=shoes_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class StoreTest extends PHPUnit_Framework_TestCase
{

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
        $store_name = "Macts";
        $id = 1;
        $test_store_id = new Store($store_name, $id);

        //Act
        $result = $test_store_id->getId();

        //Assert
        $this->assertEquals($id, $result);
    }


}
?>
