<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSetlistCategoryRequest;
use App\Http\Requests\UpdateSetlistCategoryRequest;
use App\Models\SetlistCategory;
use Inertia\Inertia;

class SetlistCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = SetlistCategory::paginate(10)->through(function ($category) {
            return [
                'id' => $category->id,
                'user_id' => $category->user_id,
                'name' => $category->name,
            ];
        });

        $title = 'Setlist Categories';

        // dd($categories);

        return Inertia::render('SetlistCategory/Index', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = "success";

        return Inertia::render('SetlistCategory/Create', [
            'status' => $status,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSetlistCategoryRequest $request)
    {
        $category = $request->validated();

        SetlistCategory::create($category);

        return to_route('setlist-categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(SetlistCategory $setlistCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SetlistCategory $setlistCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSetlistCategoryRequest $request, SetlistCategory $setlistCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SetlistCategory $setlistCategory)
    {
        //
    }
}
