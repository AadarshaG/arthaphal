<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planpdf extends Model
{
    protected $fillable = ['product_id','title','pdf'];

    public function getRules($act='add'){
        $rules = [
            'product_id'=>'nullable|exists:products,id',
            'title'=>'required|string',
            'pdf'=>'nullable|mimes:pdf'
        ];
        if($act != 'add'){
            $rules['title']='required|string';
        }
        return $rules;
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
    public function getAll()
    {
        return $this->with('product')->latest()->get();
    }
}
