<?php

namespace App\Repositories;

use App\Models\Compte_courant;
use App\Repositories\BaseRepository;

/**
 * Class Compte_courantRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:25 pm UTC
*/

class Compte_courantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_comptes',
        'agios'
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
        return Compte_courant::class;
    }
}
