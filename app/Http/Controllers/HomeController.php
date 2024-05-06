<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    function index(Request $request): View
    {
        // cara dapatkan request
        // dd($request->name);
        return view('home.index');
    }

    function welcome($name = null): View
    {

        return view('home.welcome', compact('name'));
        // return view('home.welcome')->with('name', $name);
    }

    public function migrate()
    {
        // Call migrate
        Artisan::call('migrate:refresh', [
            // '--class' => 'SampleDataSeeder',
        ]);
        return "SUCCESS MIGRATE REFRESH";
    }

    public function seed()
    {

        // Call seeder
        Artisan::call('db:seed', [
            '--class' => 'SampleDataSeeder',
            '--force' => true // <--- add this line
        ]);

        // https://owenconti.com/posts/calling-laravel-seeders-from-migrations
        return "SUCCESS SEED DATA";
    }

    public function storage()
    {
        Artisan::call('storage:link', []);
        return "SUCCESS STORAGE LINK";
    }

    public function session()
    {
        // session('key', 'default');

        // set session
        session(['key' => 'default']);

        // get session
        $data = session('key');
        dd($data);
    }
}
