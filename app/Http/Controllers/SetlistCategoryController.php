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
        $categories = SetlistCategory::latest()->paginate(10);
        $title = 'Setlist Categories';

        return Inertia::render('SetlistCategory/Index',[
            'title' => $title,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mustVerifyEmail = true;
        $status = "success";

        return Inertia::render('SetlistCategory/Create', [
            'mustVerifyEmail' => $mustVerifyEmail,
            'status' => $status,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSetlistCategoryRequest $request)
    {
        //
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
