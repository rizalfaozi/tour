<?php

use App\Models\roles;
use App\Repositories\rolesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class rolesRepositoryTest extends TestCase
{
    use MakerolesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var rolesRepository
     */
    protected $rolesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->rolesRepo = App::make(rolesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateroles()
    {
        $roles = $this->fakerolesData();
        $createdroles = $this->rolesRepo->create($roles);
        $createdroles = $createdroles->toArray();
        $this->assertArrayHasKey('id', $createdroles);
        $this->assertNotNull($createdroles['id'], 'Created roles must have id specified');
        $this->assertNotNull(roles::find($createdroles['id']), 'roles with given id must be in DB');
        $this->assertModelData($roles, $createdroles);
    }

    /**
     * @test read
     */
    public function testReadroles()
    {
        $roles = $this->makeroles();
        $dbroles = $this->rolesRepo->find($roles->id);
        $dbroles = $dbroles->toArray();
        $this->assertModelData($roles->toArray(), $dbroles);
    }

    /**
     * @test update
     */
    public function testUpdateroles()
    {
        $roles = $this->makeroles();
        $fakeroles = $this->fakerolesData();
        $updatedroles = $this->rolesRepo->update($fakeroles, $roles->id);
        $this->assertModelData($fakeroles, $updatedroles->toArray());
        $dbroles = $this->rolesRepo->find($roles->id);
        $this->assertModelData($fakeroles, $dbroles->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteroles()
    {
        $roles = $this->makeroles();
        $resp = $this->rolesRepo->delete($roles->id);
        $this->assertTrue($resp);
        $this->assertNull(roles::find($roles->id), 'roles should not exist in DB');
    }
}
