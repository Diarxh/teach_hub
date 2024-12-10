<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'user_id',
        'teacher_id', // Tambahkan kolom teacher_id di sini

        'status',

    ];

    /**
     * Get the user that owns the member course.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // Di dalam model MemberCourse


    /**
     * Get the teacher that owns the member course.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
    public function guru()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id'); // Sesuaikan dengan nama kolom di database
    }
    /**
     * Get the training that owns the member course.
     */
    public function Training()
    {
        return $this->belongsTo(Training::class, 'training_id'); // Pastikan 'training_id' adalah kolom yang menghubungkan ke tabel trainings
    }
    // Model MemberCourse
    public function pelatihan()
    {
        return $this->belongsTo(Training::class, 'training_id'); // Pastikan 'training_id' sesuai dengan kolom di database
    }
}