<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\MahasiswaImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    public function import(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:xlsx,xls,csv',
            ],
        ]);

        Excel::import(
            new MahasiswaImport(),
            $request->file('file')
        );

        return back()->with(
            'success',
            'Import mahasiswa sedang diproses'
        );
    }
}