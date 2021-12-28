<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicepdf extends Model
{
    protected $fillable = ['service_id','title','pdf'];

    public function getRules($act='add'){
        $rules = [
            'service_id'=>'nullable|exists:services,id',
            'title'=>'required|string',
            'pdf'=>'nullable|mimes:pdf'
        ];
        if($act != 'add'){
            $rules['title']='required|string';
        }
        return $rules;
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service','service_id','id');
    }
    public function getAll()
    {
        return $this->with('service')->latest()->get();
    }
}
