<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client_non_salarie
 * @package App\Models
 * @version September 6, 2020, 8:24 pm UTC
 *
 * @property \App\Models\Client $idClients
 * @property integer $id_clients
 * @property string $nom
 * @property string $prenom
 * @property string $carte_identite
 */
class Client_non_salarie extends Model
{
    use SoftDeletes;

    public $table = 'client_non_salarie';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_clients',
        'nom',
        'prenom',
        'carte_identite'
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
        'carte_identite' => 'string'
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
