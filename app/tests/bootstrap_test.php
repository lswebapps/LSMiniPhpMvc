<?php 

require(__DIR__.'/../packages/autoload.php');
/**
* 
*/
class BootstrapTest extends PHPUnit_Framework_TestCase
{
	
	function testExtract_url_segments(){

		//Doesnt matter whats passed in all controller constructors
		$bootstrap = new Bootstrap("index");
		$result = $bootstrap->extract_url_segments("index");
		$expected = array('index');
		$this->assertEquals($expected, $result);

		$bootstrap2 = new Bootstrap("index/index");
		$result2 = $bootstrap2->extract_url_segments("home/index");
		$expected2 = array('home', 'index');
		$this->assertEquals($expected, $result);

		$bootstrap3 = new Bootstrap("index/index/2");
		$result3 = $bootstrap2->extract_url_segments("index/index/2");
		$expected3 = array('index', 'index', 2);
		$this->assertEquals($expected, $result);

		$bootstrap4 = new Bootstrap("index/index");
		$result4 = $bootstrap2->extract_url_segments("");
		$expected4 = array("index");
		$this->assertEquals($expected, $result);
	}
}

?>