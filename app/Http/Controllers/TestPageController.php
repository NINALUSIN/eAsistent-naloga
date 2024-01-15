<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\connection_test;

class TestPageController extends Controller
{

    public function index()
    {
        $connection_test = connection_test::all();
        $pageConfigs = ['variableTest' => 'Test spremenljivk uspešen!', 'connection_test'=>$connection_test];

        return view('test-page', ['pageConfigs' => $pageConfigs]);

    }
}
