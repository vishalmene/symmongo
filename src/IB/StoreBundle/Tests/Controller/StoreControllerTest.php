<?php

namespace IB\StoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StoreControllerTest extends WebTestCase
{
	public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show');
    }
}
