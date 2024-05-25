<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {   
        $query = Companies::select('id', 'name')->with(['tasks' => function ($query) {
            $query->with('user_relation');
        }]);
    
        if ($id) {
            $query->where('id', $id);
        }
    
        $data = $query->get();
    
        $data->transform(function ($item) {
            $item->tasks->transform(function ($task) {
                return [
                    'id' => $task->id,
                    'name' => $task->name,
                    'description' => $task->description,
                    'user' => $task->user_relation->name,
                    'is_completed' => $task->is_completed,
                    'start_at' => $task->start_at,
                    'expired_at' => $task->expired_at
                ];
            });
            return $item;
        });
        
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
