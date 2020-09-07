<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comptes
 * @package App\Models
 * @version September 6, 2020, 8:25 pm UTC
 *
 * @property \App\Models\Client $idClients
 * @property \Illuminate\Database\Eloquent\Collection $compteBloques
 * @property \Illuminate\Database\Eloquent\Collection $compteCourants
 * @property \Illuminate\Database\Eloquent\Collection $compteEpargnes
 * @property \Illuminate\Database\Eloquent\Collection $etatComptes
 * @property \Illuminate\Database\Eloquent\Collection $operations
 * @property \Illuminate\Database\Eloquent\Collection $operation1s
 * @property integer $id_clients
 * @property string $numero_compte
 * @property integer $cle_rib
 * @property number $solde
 * @property string|\Carbon\Carbon $date_ouverture
 * @property integer $numero_agence
 */
class Comptes extends Model
{
    use SoftDeletes;

    public $table = 'comptes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


//Champs dans la table Compte
    public $fillable = [
        'id_clients',
        'numero_compte',
        'cle_rib',
        'solde',
        'date_ouverture',
        'numero_agence'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_clients' => 'integer',
        'numero_compte' => 'string',
        'cle_rib' => 'integer',
        'solde' => 'decimal:0',
        'date_ouverture' => 'datetime',
        'numero_agence' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_clients' => 'nullable|integer',
        'numero_compte' => 'required|string|max:255',
        'cle_rib' => 'required|integer',
        'solde' => 'required|numeric',
        'date_ouverture' => 'required',
        'numero_agence' => 'required|integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function compteBloques()
    {
        return $this->hasMany(\App\Models\CompteBloque::class, 'id_comptes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function compteCourants()
    {
        return $this->hasMany(\App\Models\CompteCourant::class, 'id_comptes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function compteEpargnes()
    {
        return $this->hasMany(\App\Models\CompteEpargne::class, 'id_comptes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function etatComptes()
    {
        return $this->belongsToMany(\App\Models\EtatCompte::class, 'comptes_etats');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function operations()
    {
        return $this->hasMany(\App\Models\Operation::class, 'id_compte_destinataire_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function operation1s()
    {
        return $this->hasMany(\App\Models\Operation::class, 'id_compte_source_id');
    }
}
