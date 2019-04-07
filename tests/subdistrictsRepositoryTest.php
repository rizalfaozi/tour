<?php

use App\Models\subdistricts;
use App\Repositories\subdistrictsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class subdistrictsRepositoryTest extends TestCase
{
    use MakesubdistrictsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var subdistrictsRepository
     */
    protected $subdistrictsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->subdistrictsRepo = App::make(subdistrictsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesubdistricts()
    {
        $subdistricts = $this->fakesubdistrictsData();
        $createdsubdistricts = $this->subdistrictsRepo->create($subdistricts);
        $createdsubdistricts = $createdsubdistricts->toArray();
        $this->assertArrayHasKey('id', $createdsubdistricts);
        $this->assertNotNull($createdsubdistricts['id'], 'Created subdistricts must have id specified');
        $this->assertNotNull(subdistricts::find($createdsubdistricts['id']), 'subdistricts with given id must be in DB');
        $this->assertModelData($subdistricts, $createdsubdistricts);
    }

    /**
     * @test read
     */
    public function testReadsubdistricts()
    {
        $subdistricts = $this->makesubdistricts();
        $dbsubdistricts = $this->subdistrictsRepo->find($subdistricts->id);
        $dbsubdistricts = $dbsubdistricts->toArray();
        $this->assertModelData($subdistricts->toArray(), $dbsubdistricts);
    }

    /**
     * @test update
     */
    public function testUpdatesubdistricts()
    {
        $subdistricts = $this->makesubdistricts();
        $fakesubdistricts = $this->fakesubdistrictsData();
        $updatedsubdistricts = $this->subdistrictsRepo->update($fakesubdistricts, $subdistricts->id);
        $this->assertModelData($fakesubdistricts, $updatedsubdistricts->toArray());
        $dbsubdistricts = $this->subdistrictsRepo->find($subdistricts->id);
        $this->assertModelData($fakesubdistricts, $dbsubdistricts->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesubdistricts()
    {
        $subdistricts = $this->makesubdistricts();
        $resp = $this->subdistrictsRepo->delete($subdistricts->id);
        $this->assertTrue($resp);
        $this->assertNull(subdistricts::find($subdistricts->id), 'subdistricts should not exist in DB');
    }
}
