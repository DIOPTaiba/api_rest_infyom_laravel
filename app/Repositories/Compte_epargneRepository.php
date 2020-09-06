<?php

namespace App\Repositories;

use App\Models\Compte_epargne;
use App\Repositories\BaseRepository;

/**
 * Class Compte_epargneRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:26 pm UTC
*/

class Compte_epargneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_comptes',
        'frais_ouverture',
        'montant_remuneration'
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
        return Compte_epargne::class;
    }
}
