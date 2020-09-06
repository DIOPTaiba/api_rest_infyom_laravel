<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client_moral
 * @package App\Models
 * @version September 6, 2020, 8:24 pm UTC
 *
 * @property \App\Models\Client $idClients
 * @property integer $id_clients
 * @property string $nom_entreprise
 * @property string $identifiant_entreprise
 * @property string $raison_social
 */
class Client_moral extends Model
{
    use SoftDeletes;

    public $table = 'client_moral';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_clients',
        'nom_entreprise',
        'identifiant_entreprise',
        'raison_social'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_clients' => 'integer',
        'nom_entreprise' => 'string',
        'identifiant_entreprise' => 'string',
        'raison_social' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_clients' => 'nullable|integer',
        'nom_entreprise' => 'required|string|max:255',
        'identifiant_entreprise' => 'required|string|max:255',
        'raison_social' => 'required|string|max:255',
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
