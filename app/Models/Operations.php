<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operations
 * @package App\Models
 * @version September 6, 2020, 8:27 pm UTC
 *
 * @property \App\Models\Compte $idCompteDestinataire
 * @property \App\Models\Compte $idCompteSource
 * @property string $type_operation
 * @property integer $montant
 * @property string|\Carbon\Carbon $date_operation
 * @property integer $id_compte_source_id
 * @property integer $id_compte_destinataire_id
 */
class Operations extends Model
{
    use SoftDeletes;

    public $table = 'operations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'type_operation',
        'montant',
        'date_operation',
        'id_compte_source_id',
        'id_compte_destinataire_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_operation' => 'string',
        'montant' => 'integer',
        'date_operation' => 'datetime',
        'id_compte_source_id' => 'integer',
        'id_compte_destinataire_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_operation' => 'required|string|max:255',
        'montant' => 'required|integer',
        'date_operation' => 'required',
        'id_compte_source_id' => 'required|integer',
        'id_compte_destinataire_id' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idCompteDestinataire()
    {
        return $this->belongsTo(\App\Models\Compte::class, 'id_compte_destinataire_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idCompteSource()
    {
        return $this->belongsTo(\App\Models\Compte::class, 'id_compte_source_id');
    }
}
