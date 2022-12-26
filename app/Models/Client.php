<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'hiv_clinic_no',
        'family_name',
        'given_name',
        'gender',
        'hiv_viral_load_date',
        'return_visit_date',
        'telephone_number',
        'care_giver_telephone_number'
    ];
    
}
