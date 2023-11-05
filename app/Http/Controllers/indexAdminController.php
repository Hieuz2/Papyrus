<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexAdminController extends Controller
{
    public function index()
    {
        return view('admin.indexAdmin');
    }
}
