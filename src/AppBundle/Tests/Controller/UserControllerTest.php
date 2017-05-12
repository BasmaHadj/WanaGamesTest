<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testListuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ListUser');
    }

}
