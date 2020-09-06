<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client_salarie
 * @package App\Models
 * @version September 6, 2020, 8:25 pm UTC
 *
 * @property \App\Models\Client $idClients
 * @property integer $id_clients
 * @property string $nom
 * @property string $prenom
 * @property string $carte_identite
 * @property string $profession
 * @property number $salaire
 * @property string $nom_employeur
 * @property string $adresse_entreprise
 * @property string $raison_social
 * @property string $identifiant_entreprise
 */
class Client_salarie extends Model
{
    use SoftDeletes;

    public $table = 'client_salarie';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_clients' => 'integer',
        'nom' => 'string',
        'prenom' => 'string',
        'carte_identite' => 'string',
        'profession' => 'string',
        'salaire' => 'decimal:0',
        'nom_employeur' => 'string',
        'adresse_entreprise' => 'string',
        'raison_social' => 'string',
        'identifiant_entreprise' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_clients' => 'nullable|integer',
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'carte_identite' => 'required|string|max:255',
        'profession' => 'required|string|max:255',
        'salaire' => 'required|numeric',
        'nom_employeur' => 'required|string|max:255',
        'adresse_entreprise' => 'required|string|max:255',
        'raison_social' => 'required|string|max:255',
        'identifiant_entreprise' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idClients()
    {
        return $this->belongsTo(\App\Models\Client::class, 'id_clients');
    }
}
