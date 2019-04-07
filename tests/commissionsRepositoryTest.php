<?php

use App\Models\commissions;
use App\Repositories\commissionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class commissionsRepositoryTest extends TestCase
{
    use MakecommissionsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var commissionsRepository
     */
    protected $commissionsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->commissionsRepo = App::make(commissionsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatecommissions()
    {
        $commissions = $this->fakecommissionsData();
        $createdcommissions = $this->commissionsRepo->create($commissions);
        $createdcommissions = $createdcommissions->toArray();
        $this->assertArrayHasKey('id', $createdcommissions);
        $this->assertNotNull($createdcommissions['id'], 'Created commissions must have id specified');
        $this->assertNotNull(commissions::find($createdcommissions['id']), 'commissions with given id must be in DB');
        $this->assertModelData($commissions, $createdcommissions);
    }

    /**
     * @test read
     */
    public function testReadcommissions()
    {
        $commissions = $this->makecommissions();
        $dbcommissions = $this->commissionsRepo->find($commissions->id);
        $dbcommissions = $dbcommissions->toArray();
        $this->assertModelData($commissions->toArray(), $dbcommissions);
    }

    /**
     * @test update
     */
    public function testUpdatecommissions()
    {
        $commissions = $this->makecommissions();
        $fakecommissions = $this->fakecommissionsData();
        $updatedcommissions = $this->commissionsRepo->update($fakecommissions, $commissions->id);
        $this->assertModelData($fakecommissions, $updatedcommissions->toArray());
        $dbcommissions = $this->commissionsRepo->find($commissions->id);
        $this->assertModelData($fakecommissions, $dbcommissions->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecommissions()
    {
        $commissions = $this->makecommissions();
        $resp = $this->commissionsRepo->delete($commissions->id);
        $this->assertTrue($resp);
        $this->assertNull(commissions::find($commissions->id), 'commissions should not exist in DB');
    }
}
