<?php namespace Tests\Repositories;

use App\Models\Compte_bloque;
use App\Repositories\Compte_bloqueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Compte_bloqueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Compte_bloqueRepository
     */
    protected $compteBloqueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->compteBloqueRepo = \App::make(Compte_bloqueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_compte_bloque()
    {
        $compteBloque = factory(Compte_bloque::class)->make()->toArray();

        $createdCompte_bloque = $this->compteBloqueRepo->create($compteBloque);

        $createdCompte_bloque = $createdCompte_bloque->toArray();
        $this->assertArrayHasKey('id', $createdCompte_bloque);
        $this->assertNotNull($createdCompte_bloque['id'], 'Created Compte_bloque must have id specified');
        $this->assertNotNull(Compte_bloque::find($createdCompte_bloque['id']), 'Compte_bloque with given id must be in DB');
        $this->assertModelData($compteBloque, $createdCompte_bloque);
    }

    /**
     * @test read
     */
    public function test_read_compte_bloque()
    {
        $compteBloque = factory(Compte_bloque::class)->create();

        $dbCompte_bloque = $this->compteBloqueRepo->find($compteBloque->id);

        $dbCompte_bloque = $dbCompte_bloque->toArray();
        $this->assertModelData($compteBloque->toArray(), $dbCompte_bloque);
    }

    /**
     * @test update
     */
    public function test_update_compte_bloque()
    {
        $compteBloque = factory(Compte_bloque::class)->create();
        $fakeCompte_bloque = factory(Compte_bloque::class)->make()->toArray();

        $updatedCompte_bloque = $this->compteBloqueRepo->update($fakeCompte_bloque, $compteBloque->id);

        $this->assertModelData($fakeCompte_bloque, $updatedCompte_bloque->toArray());
        $dbCompte_bloque = $this->compteBloqueRepo->find($compteBloque->id);
        $this->assertModelData($fakeCompte_bloque, $dbCompte_bloque->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_compte_bloque()
    {
        $compteBloque = factory(Compte_bloque::class)->create();

        $resp = $this->compteBloqueRepo->delete($compteBloque->id);

        $this->assertTrue($resp);
        $this->assertNull(Compte_bloque::find($compteBloque->id), 'Compte_bloque should not exist in DB');
    }
}
