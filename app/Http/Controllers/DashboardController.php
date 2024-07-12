<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        $data_layout = [
            'title' => 'Halaman Dashboard',
        ];
        View::share($data_layout);
        return view('admin.index', ['username' => 'Muhammad Ikhsan Noor Fadhillah']);
    }
    public function show()
    {

        return view('register.show');
    }
    public function profil()
    {
        $data_layout = [
            'title' => 'Halaman Admin',
        ];
        View::share($data_layout);
        return view('admin.profil', ['username' => 'Muhammad Ikhsan Noor Fadhillah']);
    }
}


