<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Rules\MaxTasksPerUser;
use Illuminate\Validation\Rule;
use Illuminate\Console\View\Components\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => [
                'required',
                Rule::exists('companies', 'id'),
            ],
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'user_id' => [
                'required',
                Rule::exists('users', 'id'),
                new MaxTasksPerUser($request->user_id)
            ],
        ]);

        Tasks::create($request->all());
        $task_test = Tasks::with('user_relation','company')->latest()->first();

        $task = Tasks::select('id','name','description')->latest()->first();
        $task->user = $task_test->user_relation->name;
        $task->company = $task_test->company;

        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
