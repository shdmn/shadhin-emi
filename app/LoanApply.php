<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanApply extends Model
{
    public function user_info(){
    	return $this->belongsTo('App\User','userId');
    }
}
