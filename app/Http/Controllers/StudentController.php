<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Student;
use \App\Models\Subject;

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
        $data = [
            'data' => $data,
            'link' => $link,
            'title' => $title,
        ];
        return view($this->view . '.index', $data);
        // return view($this->view . '.index', compact('data', 'link', 'title'));
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

        // Subject::create([
        //     ['name' => 'English'],
        //     ['name' => 'Mathematics'],
        //     ['name' => 'Science'],
        // ]);

        Subject::create([
            'name' => 'English'
        ]);

        Subject::create([
            'name' => 'Mathematics'
        ]);

        Subject::create([
            'name' => 'Science'
        ]);


        //create product
        $student_item = $this->model->create([
            'name'         => $request->name,
            'npm'   => $request->npm,
            'gender'         => $request->gender,
            'address'         => $request->address
        ]);

        // $student_item->subject()->attach([1, 2, 3]);
        // langsung ambil id stundents yang di create
        $student_item->subject()->attach([1, 2]);

        //redirect to index
        return redirect()->route($this->link . '.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->model->findOrFail($id);
        $genders = $this->model->genders;
        $link = $this->link;
        $title = $this->title;
        return view($this->view . '.show', compact('data', 'genders', 'link', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->model->findOrFail($id);
        $genders = $this->model->genders;
        $link = $this->link;
        $title = $this->title;
        return view($this->view . '.edit', compact('data', 'genders', 'link', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->model->findOrFail($id);
        //validate form
        $request->validate([
            'name'         => 'required|min:5',
            'npm'         => 'required|min:9',
            'gender'   => 'required|min:1',
            'address'   => 'required|min:10',
        ]);


        //create product
        $data->update([
            'name'         => $request->name,
            'npm'   => $request->npm,
            'gender'         => $request->gender,
            'address'         => $request->address
        ]);

        //redirect to index
        return redirect()->route($this->link . '.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get data by ID
        $data = $this->model->findOrFail($id);

        //delete data
        $data->delete();

        return redirect()->route($this->link . '.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
