<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class rolesApiTest extends TestCase
{
    use MakerolesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateroles()
    {
        $roles = $this->fakerolesData();
        $this->json('POST', '/api/v1/roles', $roles);

        $this->assertApiResponse($roles);
    }

    /**
     * @test
     */
    public function testReadroles()
    {
        $roles = $this->makeroles();
        $this->json('GET', '/api/v1/roles/'.$roles->id);

        $this->assertApiResponse($roles->toArray());
    }

    /**
     * @test
     */
    public function testUpdateroles()
    {
        $roles = $this->makeroles();
        $editedroles = $this->fakerolesData();

        $this->json('PUT', '/api/v1/roles/'.$roles->id, $editedroles);

        $this->assertApiResponse($editedroles);
    }

    /**
     * @test
     */
    public function testDeleteroles()
    {
        $roles = $this->makeroles();
        $this->json('DELETE', '/api/v1/roles/'.$roles->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/roles/'.$roles->id);

        $this->assertResponseStatus(404);
    }
}
