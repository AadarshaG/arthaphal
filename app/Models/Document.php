<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['category_id','title','pdf'];

    public function getRules($act='add'){
        $rules = [
            'category_id'=>'nullable|exists:categories,id',
            'title'=>'required|string',
            'pdf'=>'nullable|mimes:pdf'
        ];
        if($act != 'add'){
            $rules['title']='required|string';
        }
        return $rules;
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function getAll()
    {
        return $this->with('category')->latest()->get();
    }
}
