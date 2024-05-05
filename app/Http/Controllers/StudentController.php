<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $model;
    private $link = 'students';
    private $view = 'students';
    private $title = 'Students';
    public function __construct()
    {
        $this->model = new \App\Models\Student();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->model->all();
        $link = $this->link;
        $title = $this->title;
        return view($this->view . '.index', compact('data', 'link', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
