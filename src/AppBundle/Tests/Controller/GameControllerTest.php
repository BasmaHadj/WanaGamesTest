<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    public function testListgame()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ListGame');
    }

}
