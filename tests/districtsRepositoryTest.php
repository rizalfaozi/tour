<?php

use App\Models\districts;
use App\Repositories\districtsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class districtsRepositoryTest extends TestCase
{
    use MakedistrictsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var districtsRepository
     */
    protected $districtsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->districtsRepo = App::make(districtsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedistricts()
    {
        $districts = $this->fakedistrictsData();
        $createddistricts = $this->districtsRepo->create($districts);
        $createddistricts = $createddistricts->toArray();
        $this->assertArrayHasKey('id', $createddistricts);
        $this->assertNotNull($createddistricts['id'], 'Created districts must have id specified');
        $this->assertNotNull(districts::find($createddistricts['id']), 'districts with given id must be in DB');
        $this->assertModelData($districts, $createddistricts);
    }

    /**
     * @test read
     */
    public function testReaddistricts()
    {
        $districts = $this->makedistricts();
        $dbdistricts = $this->districtsRepo->find($districts->id);
        $dbdistricts = $dbdistricts->toArray();
        $this->assertModelData($districts->toArray(), $dbdistricts);
    }

    /**
     * @test update
     */
    public function testUpdatedistricts()
    {
        $districts = $this->makedistricts();
        $fakedistricts = $this->fakedistrictsData();
        $updateddistricts = $this->districtsRepo->update($fakedistricts, $districts->id);
        $this->assertModelData($fakedistricts, $updateddistricts->toArray());
        $dbdistricts = $this->districtsRepo->find($districts->id);
        $this->assertModelData($fakedistricts, $dbdistricts->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedistricts()
    {
        $districts = $this->makedistricts();
        $resp = $this->districtsRepo->delete($districts->id);
        $this->assertTrue($resp);
        $this->assertNull(districts::find($districts->id), 'districts should not exist in DB');
    }
}
