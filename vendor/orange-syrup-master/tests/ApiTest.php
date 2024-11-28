<?php

class ApiTest extends PHPUnit_Framework_TestCase
{
	public function testGetByKLDI()
	{
		$client = new GuzzleHttp\Client;
		$sirup  = new Rizalmovic\OrangeSyrup\Sirup($client);
		$orange = new Rizalmovic\OrangeSyrup\Orange($sirup);
		$result = $orange->getByKLDI_ID('K4', '2015', 100);

		$this->assertEquals(200, $result->getStatusCode());
		$this->assertNotEmpty(json_decode($result->getBody()));
	}

	public function testGetLelangBySatkerID()
	{
		$client = new GuzzleHttp\Client;
		$sirup  = new Rizalmovic\OrangeSyrup\Sirup($client);
		$orange = new Rizalmovic\OrangeSyrup\Orange($sirup);
		$result = $orange->getLelangBySatker_ID('5807', '2015', 100);

		$this->assertEquals(200, $result->getStatusCode());
		$this->assertNotEmpty(json_decode($result->getBody()));
	}

	public function testGetSwakelolaBySatkerID()
	{
		$client = new GuzzleHttp\Client;
		$sirup  = new Rizalmovic\OrangeSyrup\Sirup($client);
		$orange = new Rizalmovic\OrangeSyrup\Orange($sirup);
		$result = $orange->getSwakelolaBySatker_ID('5807', '2015', 100);

		$this->assertEquals(200, $result->getStatusCode());
		$this->assertNotEmpty(json_decode($result->getBody()));
	}
}