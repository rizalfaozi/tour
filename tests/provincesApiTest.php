<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class provincesApiTest extends TestCase
{
    use MakeprovincesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateprovinces()
    {
        $provinces = $this->fakeprovincesData();
        $this->json('POST', '/api/v1/provinces', $provinces);

        $this->assertApiResponse($provinces);
    }

    /**
     * @test
     */
    public function testReadprovinces()
    {
        $provinces = $this->makeprovinces();
        $this->json('GET', '/api/v1/provinces/'.$provinces->id);

        $this->assertApiResponse($provinces->toArray());
    }

    /**
     * @test
     */
    public function testUpdateprovinces()
    {
        $provinces = $this->makeprovinces();
        $editedprovinces = $this->fakeprovincesData();

        $this->json('PUT', '/api/v1/provinces/'.$provinces->id, $editedprovinces);

        $this->assertApiResponse($editedprovinces);
    }

    /**
     * @test
     */
    public function testDeleteprovinces()
    {
        $provinces = $this->makeprovinces();
        $this->json('DELETE', '/api/v1/provinces/'.$provinces->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/provinces/'.$provinces->id);

        $this->assertResponseStatus(404);
    }
}
