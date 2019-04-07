<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class agentsApiTest extends TestCase
{
    use MakeagentsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateagents()
    {
        $agents = $this->fakeagentsData();
        $this->json('POST', '/api/v1/agents', $agents);

        $this->assertApiResponse($agents);
    }

    /**
     * @test
     */
    public function testReadagents()
    {
        $agents = $this->makeagents();
        $this->json('GET', '/api/v1/agents/'.$agents->id);

        $this->assertApiResponse($agents->toArray());
    }

    /**
     * @test
     */
    public function testUpdateagents()
    {
        $agents = $this->makeagents();
        $editedagents = $this->fakeagentsData();

        $this->json('PUT', '/api/v1/agents/'.$agents->id, $editedagents);

        $this->assertApiResponse($editedagents);
    }

    /**
     * @test
     */
    public function testDeleteagents()
    {
        $agents = $this->makeagents();
        $this->json('DELETE', '/api/v1/agents/'.$agents->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/agents/'.$agents->id);

        $this->assertResponseStatus(404);
    }
}
