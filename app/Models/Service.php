<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title','slug','image','enabled','description',
        'meta_title','meta_keywords','meta_description'];

    public function getRules($act='add'){
        $rules = [
            'title'=>'required|string',
            'description'=>'nullable|string',
            'meta_title'=>'nullable|string',
            'meta_keywords'=>'nullable|string',
            'meta_description'=>'nullable|string',
            'image'=>'nullable|image|max:2048'
        ];
        if($act != 'add'){
            $rules['title']='required|string';
        }
        return $rules;
    }

    public function servicepdf()
    {
        return $this->belongsToMany('App\Models\Servicepdf');
    }
}
