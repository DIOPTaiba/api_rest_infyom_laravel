<?php

namespace App\Repositories;

use App\Models\Client_non_salarie;
use App\Repositories\BaseRepository;

/**
 * Class Client_non_salarieRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:24 pm UTC
*/

class Client_non_salarieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_clients',
        'nom',
        'prenom',
        'carte_identite'
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
        return Client_non_salarie::class;
    }
}
