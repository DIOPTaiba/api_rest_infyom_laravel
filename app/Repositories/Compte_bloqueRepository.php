<?php

namespace App\Repositories;

use App\Models\Compte_bloque;
use App\Repositories\BaseRepository;

/**
 * Class Compte_bloqueRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:25 pm UTC
*/

class Compte_bloqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_comptes',
        'frais_ouverture',
        'montant_remuneration',
        'duree_blocage'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Compte_bloque::class;
    }
}
