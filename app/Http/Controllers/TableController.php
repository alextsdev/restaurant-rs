<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        return view('tables.index');
    }

    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_number' => 'required|string|max:255',
            'seats' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
        ]);

        $table = Table::create($request->all());

        return redirect()->route('tables.show', $table);
    }

    public function show(Table $table)
    {
        return view('tables.show', compact('table'));
    }

    public function edit(Table $table)
    {
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, Table $table)
    {
        $request->validate([
            'table_number' => 'required|string|max:255',
            'seats' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
        ]);

        $table->update($request->all());

        return redirect()->route('tables.show', $table);
    }

    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()->route('tables.index');
    }

}
