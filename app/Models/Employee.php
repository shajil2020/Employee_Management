<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email','phone'];

    public static $rules = [
        'name' => 'required',
        'email' => 'nullable|email',
        
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getFullnameAttribute(){
        return $this->first_name." ".$this->last_name;
    }
}

