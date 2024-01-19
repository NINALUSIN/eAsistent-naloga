<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\connection_test;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;
class TestPageController extends Controller
{

    public function index()
    {
        $connection_test = connection_test::all();

        $pageConfigs = ['variableTest' => 'Test spremenljivk uspešen!', 'connection_test'=>$connection_test, 'logged_in'=> Auth::check()];


        return view('test-page', ['pageConfigs' => $pageConfigs]);

    }
}
