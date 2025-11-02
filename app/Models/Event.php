<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        'created_by',
    ];

    // Relación con el usuario creador
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // 🔸 Si todavía no creaste los otros modelos, comenta o borra temporalmente esto:
    
    public function categories()
    {
        return $this->hasMany(EventCategory::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function jurors()
    {
        return $this->hasMany(EventJuror::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    
}
