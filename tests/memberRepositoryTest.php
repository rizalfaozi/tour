<?php

use App\Models\member;
use App\Repositories\memberRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class memberRepositoryTest extends TestCase
{
    use MakememberTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var memberRepository
     */
    protected $memberRepo;

    public function setUp()
    {
        parent::setUp();
        $this->memberRepo = App::make(memberRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatemember()
    {
        $member = $this->fakememberData();
        $createdmember = $this->memberRepo->create($member);
        $createdmember = $createdmember->toArray();
        $this->assertArrayHasKey('id', $createdmember);
        $this->assertNotNull($createdmember['id'], 'Created member must have id specified');
        $this->assertNotNull(member::find($createdmember['id']), 'member with given id must be in DB');
        $this->assertModelData($member, $createdmember);
    }

    /**
     * @test read
     */
    public function testReadmember()
    {
        $member = $this->makemember();
        $dbmember = $this->memberRepo->find($member->id);
        $dbmember = $dbmember->toArray();
        $this->assertModelData($member->toArray(), $dbmember);
    }

    /**
     * @test update
     */
    public function testUpdatemember()
    {
        $member = $this->makemember();
        $fakemember = $this->fakememberData();
        $updatedmember = $this->memberRepo->update($fakemember, $member->id);
        $this->assertModelData($fakemember, $updatedmember->toArray());
        $dbmember = $this->memberRepo->find($member->id);
        $this->assertModelData($fakemember, $dbmember->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletemember()
    {
        $member = $this->makemember();
        $resp = $this->memberRepo->delete($member->id);
        $this->assertTrue($resp);
        $this->assertNull(member::find($member->id), 'member should not exist in DB');
    }
}
