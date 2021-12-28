<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['title','top_description','description','image'];

    public function getRules($act = 'add'){
        $rules = [
            'title'=>'required|string',
            'top_description'=>'nullable|string',
            'description'=>'required|string',
            'image'=>'nullable|image|max:2048'
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }
}
