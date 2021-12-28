<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['title','icon','link'];

    public function getRules($act = 'add')
    {
        $rules = array(
            'title'=>'sometimes|string',
            'icon'=>'nullable|image|mimes:png,jpg,jpeg',
            'link'=>'sometimes|url'
        );
        if ($act != 'add') {
            $rules['title'] = 'required|string';
        }
        return $rules;
    }
}
