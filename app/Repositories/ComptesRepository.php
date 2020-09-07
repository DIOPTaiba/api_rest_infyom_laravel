<?php

namespace App\Repositories;

use App\Models\Comptes;
use App\Repositories\BaseRepository;

/**
 * Class ComptesRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:25 pm UTC
*/
//Repository Comptes
class ComptesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_clients',
        'numero_compte',
        'cle_rib',
        'solde',
        'date_ouverture',
        'numero_agence'
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
        return Comptes::class;
    }
}
