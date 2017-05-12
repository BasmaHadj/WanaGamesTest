<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlayerControllerTest extends WebTestCase
{
    public function testListplayer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ListPlayer');
    }

}
