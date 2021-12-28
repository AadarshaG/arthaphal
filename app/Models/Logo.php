<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = ['title','image'];

    public function getRules($act = 'add'){
        $rules = [
            'title'=>'required|string',
            'image'=>'sometimes|image|max:1024'
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }
}
