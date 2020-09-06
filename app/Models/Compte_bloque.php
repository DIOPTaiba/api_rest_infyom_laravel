<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compte_bloque
 * @package App\Models
 * @version September 6, 2020, 8:25 pm UTC
 *
 * @property \App\Models\Compte $idComptes
 * @property integer $id_comptes
 * @property number $frais_ouverture
 * @property number $montant_remuneration
 * @property integer $duree_blocage
 */
class Compte_bloque extends Model
{
    use SoftDeletes;

    public $table = 'compte_bloque';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_comptes',
        'frais_ouverture',
        'montant_remuneration',
        'duree_blocage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_comptes' => 'integer',
        'frais_ouverture' => 'decimal:0',
        'montant_remuneration' => 'decimal:0',
        'duree_blocage' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_comptes' => 'nullable|integer',
        'frais_ouverture' => 'required|numeric',
        'montant_remuneration' => 'required|numeric',
        'duree_blocage' => 'required|integer',
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
