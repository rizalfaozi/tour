<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class districtsApiTest extends TestCase
{
    use MakedistrictsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatedistricts()
    {
        $districts = $this->fakedistrictsData();
        $this->json('POST', '/api/v1/districts', $districts);

        $this->assertApiResponse($districts);
    }

    /**
     * @test
     */
    public function testReaddistricts()
    {
        $districts = $this->makedistricts();
        $this->json('GET', '/api/v1/districts/'.$districts->id);

        $this->assertApiResponse($districts->toArray());
    }

    /**
     * @test
     */
    public function testUpdatedistricts()
    {
        $districts = $this->makedistricts();
        $editeddistricts = $this->fakedistrictsData();

        $this->json('PUT', '/api/v1/districts/'.$districts->id, $editeddistricts);

        $this->assertApiResponse($editeddistricts);
    }

    /**
     * @test
     */
    public function testDeletedistricts()
    {
        $districts = $this->makedistricts();
        $this->json('DELETE', '/api/v1/districts/'.$districts->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/districts/'.$districts->id);

        $this->assertResponseStatus(404);
    }
}
