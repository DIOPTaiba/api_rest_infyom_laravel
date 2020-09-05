<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operations extends Model
{
    protected $fillable = array('type_operation', 'montant', 'id_compte_source', 'id_compte_destinataire', 'date_operation');
    public static $rules = array('id_compte_source'=>'required|integer',
        'id_compte_destinataire'=>'integer',
        'type_operation'=>'required|min:4',
        'montant'=>'required|min:2',
        'date_operation'=>'required|min:4'
    );
    public function comptes()
    {
        return $this->belongsTo('App\Comptes');
    }
    
}
