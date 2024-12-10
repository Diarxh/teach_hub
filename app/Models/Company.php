<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $fillable = [
        'company_name',
        'address',
        'phone_number',
        'email',
        'logo',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($company) {
            // Mengisi user_id secara otomatis dengan ID pengguna yang sedang login
            if (Auth::check()) {
                $company->user_id = Auth::id();
            } else {
                // Jika pengguna tidak terautentikasi, Anda bisa mengarahkan ke login atau menangani sesuai kebutuhan
                throw new \Exception('User must be authenticated to create a company.');
            }
        });
    }
}
