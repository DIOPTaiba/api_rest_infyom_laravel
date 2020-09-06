<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clients
 * @package App\Models
 * @version September 6, 2020, 8:23 pm UTC
 *
 * @property \App\Models\ResponsableCompte $idResponsableCompte
 * @property \Illuminate\Database\Eloquent\Collection $clientMorals
 * @property \Illuminate\Database\Eloquent\Collection $clientNonSalaries
 * @property \Illuminate\Database\Eloquent\Collection $clientSalaries
 * @property \Illuminate\Database\Eloquent\Collection $comptes
 * @property integer $id_responsable_compte
 * @property string $adresse
 * @property string $telephone
 * @property string $email
 * @property string|\Carbon\Carbon $date_inscription
 * @property string $type_client
 */
class Clients extends Model
{
    use SoftDeletes;

    public $table = 'clients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_responsable_compte',
        'adresse',
        'telephone',
        'email',
        'date_inscription',
        'type_client'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_responsable_compte' => 'integer',
        'adresse' => 'string',
        'telephone' => 'string',
        'email' => 'string',
        'date_inscription' => 'datetime',
        'type_client' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_responsable_compte' => 'nullable|integer',
        'adresse' => 'required|string|max:255',
        'telephone' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'date_inscription' => 'required',
        'type_client' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idResponsableCompte()
    {
        return $this->belongsTo(\App\Models\ResponsableCompte::class, 'id_responsable_compte');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clientMorals()
    {
        return $this->hasMany(\App\Models\ClientMoral::class, 'id_clients');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clientNonSalaries()
    {
        return $this->hasMany(\App\Models\ClientNonSalarie::class, 'id_clients');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clientSalaries()
    {
        return $this->hasMany(\App\Models\ClientSalarie::class, 'id_clients');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function comptes()
    {
        return $this->hasMany(\App\Models\Compte::class, 'id_clients');
    }
}
