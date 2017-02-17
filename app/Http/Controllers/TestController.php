<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
      return view('test.index');

    }

    public function notas()
    {
      $notas = [
        0=> 'Anotração1',
        1 => 'Anotacoe2'
      ];
      return view('test.notas', compact('notas'));
    }
}
