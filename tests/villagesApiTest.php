<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class villagesApiTest extends TestCase
{
    use MakevillagesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatevillages()
    {
        $villages = $this->fakevillagesData();
        $this->json('POST', '/api/v1/villages', $villages);

        $this->assertApiResponse($villages);
    }

    /**
     * @test
     */
    public function testReadvillages()
    {
        $villages = $this->makevillages();
        $this->json('GET', '/api/v1/villages/'.$villages->id);

        $this->assertApiResponse($villages->toArray());
    }

    /**
     * @test
     */
    public function testUpdatevillages()
    {
        $villages = $this->makevillages();
        $editedvillages = $this->fakevillagesData();

        $this->json('PUT', '/api/v1/villages/'.$villages->id, $editedvillages);

        $this->assertApiResponse($editedvillages);
    }

    /**
     * @test
     */
    public function testDeletevillages()
    {
        $villages = $this->makevillages();
        $this->json('DELETE', '/api/v1/villages/'.$villages->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/villages/'.$villages->id);

        $this->assertResponseStatus(404);
    }
}
