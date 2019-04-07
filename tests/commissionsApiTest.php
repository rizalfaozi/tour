<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class commissionsApiTest extends TestCase
{
    use MakecommissionsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecommissions()
    {
        $commissions = $this->fakecommissionsData();
        $this->json('POST', '/api/v1/commissions', $commissions);

        $this->assertApiResponse($commissions);
    }

    /**
     * @test
     */
    public function testReadcommissions()
    {
        $commissions = $this->makecommissions();
        $this->json('GET', '/api/v1/commissions/'.$commissions->id);

        $this->assertApiResponse($commissions->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecommissions()
    {
        $commissions = $this->makecommissions();
        $editedcommissions = $this->fakecommissionsData();

        $this->json('PUT', '/api/v1/commissions/'.$commissions->id, $editedcommissions);

        $this->assertApiResponse($editedcommissions);
    }

    /**
     * @test
     */
    public function testDeletecommissions()
    {
        $commissions = $this->makecommissions();
        $this->json('DELETE', '/api/v1/commissions/'.$commissions->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/commissions/'.$commissions->id);

        $this->assertResponseStatus(404);
    }
}
