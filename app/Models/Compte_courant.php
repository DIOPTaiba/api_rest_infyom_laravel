<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compte_courant
 * @package App\Models
 * @version September 6, 2020, 8:25 pm UTC
 *
 * @property \App\Models\Compte $idComptes
 * @property integer $id_comptes
 * @property number $agios
 */
class Compte_courant extends Model
{
    use SoftDeletes;

    public $table = 'compte_courant';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_comptes',
        'agios'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_comptes' => 'integer',
        'agios' => 'decimal:0'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_comptes' => 'nullable|integer',
        'agios' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idComptes()
    {
        return $this->belongsTo(\App\Models\Compte::class, 'id_comptes');
    }
}
