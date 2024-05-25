<?php

namespace App\Rules;

use Closure;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

class MaxTasksPerUser implements Rule
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function passes($attribute, $value)
    {
        $taskCount = Tasks::where('user_id', $this->userId)->count();
        return $taskCount < 5;
    }

    public function message()
    {
        return 'El usuario ya tiene el máximo de tareas permitidas.';
    }
}
