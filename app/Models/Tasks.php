<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'description',
        'user_id',
    ];
    
    protected $hidden = ['is_completed', 'start_at', 'expired_at'];

    public function company()
    {
        return $this->belongsTo(Companies::class, 'company_id')->select('id', 'name');
    }

    public function user_relation()
    {
        return $this->belongsTo(Users::class, 'user_id')->select('id', 'name');
    }
    
}
