<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Responsable_compte
 * @package App\Models
 * @version September 6, 2020, 8:22 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $clients
 * @property string $login
 * @property string $mot_de_passe
 * @property integer $id_employes
 */
class Responsable_compte extends Model
{
    use SoftDeletes;

    public $table = 'responsable_compte';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'login',
        'mot_de_passe',
        'id_employes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'login' => 'string',
        'mot_de_passe' => 'string',
        'id_employes' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'login' => 'required|string|max:255',
        'mot_de_passe' => 'required|string|max:255',
        'id_employes' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clients()
    {
        return $this->hasMany(\App\Models\Client::class, 'id_responsable_compte');
    }
}
