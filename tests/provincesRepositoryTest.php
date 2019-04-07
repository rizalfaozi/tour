<?php

use App\Models\provinces;
use App\Repositories\provincesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class provincesRepositoryTest extends TestCase
{
    use MakeprovincesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var provincesRepository
     */
    protected $provincesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->provincesRepo = App::make(provincesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateprovinces()
    {
        $provinces = $this->fakeprovincesData();
        $createdprovinces = $this->provincesRepo->create($provinces);
        $createdprovinces = $createdprovinces->toArray();
        $this->assertArrayHasKey('id', $createdprovinces);
        $this->assertNotNull($createdprovinces['id'], 'Created provinces must have id specified');
        $this->assertNotNull(provinces::find($createdprovinces['id']), 'provinces with given id must be in DB');
        $this->assertModelData($provinces, $createdprovinces);
    }

    /**
     * @test read
     */
    public function testReadprovinces()
    {
        $provinces = $this->makeprovinces();
        $dbprovinces = $this->provincesRepo->find($provinces->id);
        $dbprovinces = $dbprovinces->toArray();
        $this->assertModelData($provinces->toArray(), $dbprovinces);
    }

    /**
     * @test update
     */
    public function testUpdateprovinces()
    {
        $provinces = $this->makeprovinces();
        $fakeprovinces = $this->fakeprovincesData();
        $updatedprovinces = $this->provincesRepo->update($fakeprovinces, $provinces->id);
        $this->assertModelData($fakeprovinces, $updatedprovinces->toArray());
        $dbprovinces = $this->provincesRepo->find($provinces->id);
        $this->assertModelData($fakeprovinces, $dbprovinces->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteprovinces()
    {
        $provinces = $this->makeprovinces();
        $resp = $this->provincesRepo->delete($provinces->id);
        $this->assertTrue($resp);
        $this->assertNull(provinces::find($provinces->id), 'provinces should not exist in DB');
    }
}
