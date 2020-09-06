<?php

namespace App\Repositories;

use App\Models\Responsable_compte;
use App\Repositories\BaseRepository;

/**
 * Class Responsable_compteRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:22 pm UTC
*/

class Responsable_compteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'login',
        'mot_de_passe',
        'id_employes'
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
        return Responsable_compte::class;
    }
}
