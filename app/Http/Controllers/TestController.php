<?php

namespace App\Http\Controllers;

use App\Models\TestModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $data = TestModel::orderBy('id')->paginate(5);
        return view('index', compact('data'));
    }
}
