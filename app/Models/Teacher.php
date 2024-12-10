<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'school_name',
        'nuptk',
        'photo',
        'birth_date',
        'birth_place',
        'address',
        'village',
        'district',
        'city',
        'province',
        'last_education',
        'user_id',
        'about',
    ];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
