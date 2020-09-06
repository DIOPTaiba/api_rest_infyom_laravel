<?php

namespace App\Repositories;

use App\Models\Client_salarie;
use App\Repositories\BaseRepository;

/**
 * Class Client_salarieRepository
 * @package App\Repositories
 * @version September 6, 2020, 8:25 pm UTC
*/

class Client_salarieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_clients',
        'nom',
        'prenom',
        'carte_identite',
        'profession',
        'salaire',
        'nom_employeur',
        'adresse_entreprise',
        'raison_social',
        'identifiant_entreprise'
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
        return Client_salarie::class;
    }
}
