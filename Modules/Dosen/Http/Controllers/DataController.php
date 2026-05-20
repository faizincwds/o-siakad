<?php

namespace Modules\Dosen\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Dosen\Models\Data;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::latest()->paginate(10);
        return view('dosen::data.index', compact('data'));
    }

    public function create()
    {
        return view('dosen::data.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([

            ]);

            Data::create($validated);
            return redirect()->route('data.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Data::findOrFail($id);
        return view('dosen::data.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([

            ]);

            $item = Data::findOrFail($id);
            $item->update($validated);
            return redirect()->route('data.index')->with('success', 'Data berhasil diupdate.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $data = Data::findOrFail($id);
        return view('dosen::data.show', compact('data'));
    }

    public function destroy($id)
    {
        try {
            Data::findOrFail($id)->delete();
            return redirect()->route('data.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}