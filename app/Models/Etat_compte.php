<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Etat_compte
 * @package App\Models
 * @version September 6, 2020, 8:26 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $comptes
 * @property string $etat_compte
 * @property string|\Carbon\Carbon $date_changement_etat
 */
class Etat_compte extends Model
{
    use SoftDeletes;

    public $table = 'etat_compte';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'etat_compte',
        'date_changement_etat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etat_compte' => 'string',
        'date_changement_etat' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'etat_compte' => 'required|string|max:255',
        'date_changement_etat' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function comptes()
    {
        return $this->belongsToMany(\App\Models\Compte::class, 'comptes_etats');
    }
}
