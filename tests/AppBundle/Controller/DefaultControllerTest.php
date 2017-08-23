<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function testReportAction()
    {
    	$dateTime = new \DateTime;

    	$mockedResultArray = [
    		[
    			'id' => 1,
    			'room' => 101,
    			'date' => $dateTime,
    			'price' => 100,
    			'type' => 'suite'
    		],
    		[
    			'id' => 2,
    			'room' => 102,
    			'date' => $dateTime,
    			'price' => 200,
    			'type' => 'premium'
    		]
    	];

	    // get mock of lookup repository object
    	$mockLookup = $this->getMockBuilder('AppBundle\\Repository\\Lookup')
    		->disableOriginalConstructor()
	    	->setMethods(array('getRoomsSoldByDateRange'))
	    	->getMock();
	    $mockLookup->expects($this->once())
	    	->method('getRoomsSoldByDateRange')
	    	->will($this->returnValue($mockedResultArray));

    	// get mock of controller
    	$mockController = $this->getMockBuilder('AppBundle\\Controller\\DefaultController')
	    	->setMethods(array('getRepository'))
	    	->getMock();
	    $mockController->expects($this->once())
	    	->method('getRepository')
	    	->will($this->returnValue($mockLookup));

	    // get page
        $client = static::createClient();

        $content = $client->getResponse()->getContent();

        $json = json_decode($content);

        // test result
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(150, $json['averagePrice']);
        $this->assertEquals(1250.0, $json['sdPrice']);
        $this->assertEquals(2, $json['numberOfRoomsSold']);
        $this->assertEquals(['suite', 'premium'], $json['typesOfRoomsSold']);
        $this->assertEquals($dateTime->format('c'), $json['dateRange']['from']);
        $this->assertEquals($dateTime->format('c'), $json['dateRange']['to']);
    }
}
