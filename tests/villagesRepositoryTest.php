<?php

use App\Models\villages;
use App\Repositories\villagesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class villagesRepositoryTest extends TestCase
{
    use MakevillagesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var villagesRepository
     */
    protected $villagesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->villagesRepo = App::make(villagesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatevillages()
    {
        $villages = $this->fakevillagesData();
        $createdvillages = $this->villagesRepo->create($villages);
        $createdvillages = $createdvillages->toArray();
        $this->assertArrayHasKey('id', $createdvillages);
        $this->assertNotNull($createdvillages['id'], 'Created villages must have id specified');
        $this->assertNotNull(villages::find($createdvillages['id']), 'villages with given id must be in DB');
        $this->assertModelData($villages, $createdvillages);
    }

    /**
     * @test read
     */
    public function testReadvillages()
    {
        $villages = $this->makevillages();
        $dbvillages = $this->villagesRepo->find($villages->id);
        $dbvillages = $dbvillages->toArray();
        $this->assertModelData($villages->toArray(), $dbvillages);
    }

    /**
     * @test update
     */
    public function testUpdatevillages()
    {
        $villages = $this->makevillages();
        $fakevillages = $this->fakevillagesData();
        $updatedvillages = $this->villagesRepo->update($fakevillages, $villages->id);
        $this->assertModelData($fakevillages, $updatedvillages->toArray());
        $dbvillages = $this->villagesRepo->find($villages->id);
        $this->assertModelData($fakevillages, $dbvillages->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletevillages()
    {
        $villages = $this->makevillages();
        $resp = $this->villagesRepo->delete($villages->id);
        $this->assertTrue($resp);
        $this->assertNull(villages::find($villages->id), 'villages should not exist in DB');
    }
}
