<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->hasMany(Tasks::class,'company_id')->select('id','company_id','name','description','user_id','is_completed', 'start_at', 'expired_at');
    }
}
