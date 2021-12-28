<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title','slug','enabled','image'];
    public function getRules($act='add'){
        $rules = [
            'title'=>'required|string',
            'image'=>'nullable|image|max:2048'
        ];
        if($act != 'add'){
            $rules['title']='required|string';
        }
        return $rules;
    }
}
