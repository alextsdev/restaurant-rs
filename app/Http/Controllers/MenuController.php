<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('menus.index');
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'category' => 'required|string|max:255',
        ]);

        $menu = Menu::create($request->all());

        return redirect()->route('menus.show', $menu);
    }

    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'category' => 'required|string|max:255',
        ]);

        $menu->update($request->all());

        return redirect()->route('menus.show', $menu);
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index');
    }
}
