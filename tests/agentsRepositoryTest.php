<?php

use App\Models\agents;
use App\Repositories\agentsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class agentsRepositoryTest extends TestCase
{
    use MakeagentsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var agentsRepository
     */
    protected $agentsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->agentsRepo = App::make(agentsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateagents()
    {
        $agents = $this->fakeagentsData();
        $createdagents = $this->agentsRepo->create($agents);
        $createdagents = $createdagents->toArray();
        $this->assertArrayHasKey('id', $createdagents);
        $this->assertNotNull($createdagents['id'], 'Created agents must have id specified');
        $this->assertNotNull(agents::find($createdagents['id']), 'agents with given id must be in DB');
        $this->assertModelData($agents, $createdagents);
    }

    /**
     * @test read
     */
    public function testReadagents()
    {
        $agents = $this->makeagents();
        $dbagents = $this->agentsRepo->find($agents->id);
        $dbagents = $dbagents->toArray();
        $this->assertModelData($agents->toArray(), $dbagents);
    }

    /**
     * @test update
     */
    public function testUpdateagents()
    {
        $agents = $this->makeagents();
        $fakeagents = $this->fakeagentsData();
        $updatedagents = $this->agentsRepo->update($fakeagents, $agents->id);
        $this->assertModelData($fakeagents, $updatedagents->toArray());
        $dbagents = $this->agentsRepo->find($agents->id);
        $this->assertModelData($fakeagents, $dbagents->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteagents()
    {
        $agents = $this->makeagents();
        $resp = $this->agentsRepo->delete($agents->id);
        $this->assertTrue($resp);
        $this->assertNull(agents::find($agents->id), 'agents should not exist in DB');
    }
}
