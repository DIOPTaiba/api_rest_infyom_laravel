<?php

namespace App\Repositories;

use App\Models\Operations;
use App\Repositories\BaseRepository;

/**
 * Class OperationsRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:27 pm UTC
*/
//Repository Opérations
class OperationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_operation',
        'montant',
        'date_operation',
        'id_compte_source_id',
        'id_compte_destinataire_id'
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
        return Operations::class;
    }
}
