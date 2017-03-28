<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Controllers\Controller;

class TodosController extends Controller
{
    public function index()
    {
      return Todo::all();
    }

    public function store(Request $request)
    {
      return Todo::create($request->all());;
    }

    public function show(Request $request)
    {
      return Todo::findOrFail($request->id);
    }

    public function update(Request $request)
    {
      $todo = Todo::findOrFail($request->id);
      $todo->update($request->all());
      return $todo;
    }

    public function destroy(Request $request)
    {
      return response(Todo::destroy($request->id), 204);
    }

    public function destroyAll()
    {
      return response(Todo::getQuery()->delete(), 204);
    }

}
