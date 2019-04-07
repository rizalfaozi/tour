<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class subdistrictsApiTest extends TestCase
{
    use MakesubdistrictsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesubdistricts()
    {
        $subdistricts = $this->fakesubdistrictsData();
        $this->json('POST', '/api/v1/subdistricts', $subdistricts);

        $this->assertApiResponse($subdistricts);
    }

    /**
     * @test
     */
    public function testReadsubdistricts()
    {
        $subdistricts = $this->makesubdistricts();
        $this->json('GET', '/api/v1/subdistricts/'.$subdistricts->id);

        $this->assertApiResponse($subdistricts->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesubdistricts()
    {
        $subdistricts = $this->makesubdistricts();
        $editedsubdistricts = $this->fakesubdistrictsData();

        $this->json('PUT', '/api/v1/subdistricts/'.$subdistricts->id, $editedsubdistricts);

        $this->assertApiResponse($editedsubdistricts);
    }

    /**
     * @test
     */
    public function testDeletesubdistricts()
    {
        $subdistricts = $this->makesubdistricts();
        $this->json('DELETE', '/api/v1/subdistricts/'.$subdistricts->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/subdistricts/'.$subdistricts->id);

        $this->assertResponseStatus(404);
    }
}
