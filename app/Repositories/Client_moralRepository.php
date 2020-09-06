<?php

namespace App\Repositories;

use App\Models\Client_moral;
use App\Repositories\BaseRepository;

/**
 * Class Client_moralRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:24 pm UTC
*/

class Client_moralRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_clients',
        'nom_entreprise',
        'identifiant_entreprise',
        'raison_social'
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
        return Client_moral::class;
    }
}
