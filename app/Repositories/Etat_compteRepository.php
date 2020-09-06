<?php

namespace App\Repositories;

use App\Models\Etat_compte;
use App\Repositories\BaseRepository;

/**
 * Class Etat_compteRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:26 pm UTC
*/

class Etat_compteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'etat_compte',
        'date_changement_etat'
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
        return Etat_compte::class;
    }
}
