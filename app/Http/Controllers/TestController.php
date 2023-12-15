<?php

namespace App\Http\Controllers;

use App\Models\TestModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $data = TestModel::all();
        return view('index', compact('data'));
    }
}
