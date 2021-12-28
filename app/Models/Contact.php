<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['address','phone','mail','iframe'];

    public function getRules($act = 'add'){
        $rules = [
            'address'=>'required|string',
            'phone'=>'sometimes|string',
            'mail'=>'sometimes|string',
            'iframe'=>'nullable|string',
        ];
        if($act != 'add'){
            $rules['address'] = 'required|string';
        }
        return $rules;
    }
}
