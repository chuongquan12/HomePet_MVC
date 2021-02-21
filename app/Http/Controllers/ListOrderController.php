<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    public function index()
    {
        return view('admin.listorder');
    }
}
