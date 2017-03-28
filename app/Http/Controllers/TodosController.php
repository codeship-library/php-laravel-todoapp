<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Todos;
use App\Http\Controllers\Controller;

class TodosController extends Controller
{
    public function index()
    {
      $todos = DB::table('todos')->get();
      return $todos->toArray();
    }

    public function store()
    {
      $todos = DB::table('todos')->get();
      return $todos->toArray();
    }

}
