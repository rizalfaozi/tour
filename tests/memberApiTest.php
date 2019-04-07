<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class memberApiTest extends TestCase
{
    use MakememberTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatemember()
    {
        $member = $this->fakememberData();
        $this->json('POST', '/api/v1/members', $member);

        $this->assertApiResponse($member);
    }

    /**
     * @test
     */
    public function testReadmember()
    {
        $member = $this->makemember();
        $this->json('GET', '/api/v1/members/'.$member->id);

        $this->assertApiResponse($member->toArray());
    }

    /**
     * @test
     */
    public function testUpdatemember()
    {
        $member = $this->makemember();
        $editedmember = $this->fakememberData();

        $this->json('PUT', '/api/v1/members/'.$member->id, $editedmember);

        $this->assertApiResponse($editedmember);
    }

    /**
     * @test
     */
    public function testDeletemember()
    {
        $member = $this->makemember();
        $this->json('DELETE', '/api/v1/members/'.$member->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/members/'.$member->id);

        $this->assertResponseStatus(404);
    }
}
