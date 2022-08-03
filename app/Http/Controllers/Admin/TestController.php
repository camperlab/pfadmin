<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function test()
    {

        $password = Hash::make('12qwasZX');

        return response()->json(['data' => Hash::check('12qwasZX', $password)]);
    }
}
