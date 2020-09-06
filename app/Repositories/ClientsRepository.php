<?php

namespace App\Repositories;

use App\Models\Clients;
use App\Repositories\BaseRepository;

/**
 * Class ClientsRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:23 pm UTC
*/

class ClientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_responsable_compte',
        'adresse',
        'telephone',
        'email',
        'date_inscription',
        'type_client'
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
        return Clients::class;
    }
}
