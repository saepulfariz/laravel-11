<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Student;

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
        $data = $this->model->orderBy('id', 'DESC')->get();
        // $data = $this->model->all();
        $link = $this->link;
        $title = $this->title;
        return view($this->view . '.index', compact('data', 'link', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = $this->model->genders;
        $link = $this->link;
        $title = $this->title;
        return view($this->view . '.create', compact('genders', 'link', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'name'         => 'required|min:5',
            'npm'         => 'required|min:9',
            'gender'   => 'required|min:1',
            'address'   => 'required|min:10',
        ]);


        //create product
        $this->model->create([
            'name'         => $request->name,
            'npm'   => $request->npm,
            'gender'         => $request->gender,
            'address'         => $request->address
        ]);

        //redirect to index
        return redirect()->route($this->link . '.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
