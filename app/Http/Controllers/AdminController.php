<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berkas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalBerkas = Berkas::count();
        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalBerkas', 'totalUsers'));
    }
}
