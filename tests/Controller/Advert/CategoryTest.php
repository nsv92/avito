<?php

namespace App\Tests\Controller\Advert;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class CategoryTest.
 */
class CategoryTest extends WebTestCase
{
    /**
     * Test get all categories.
     *
     * @return void
     */
    public function testCategories()
    {
        $client = static::createClient([], [
            'HTTP_HOST' => '127.0.0.1:8000',
        ]);
        $client->request('GET', '/api/v1/advert/category');
        $requestContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonFile(
            __DIR__.'/response/CategoryTest_testCategories.json',
            $requestContent
        );
    }
}
