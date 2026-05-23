<?php

namespace App\Imports;

use App\Jobs\ImportMahasiswaJob;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MahasiswaImport implements
    ToCollection,
    WithHeadingRow,
    WithChunkReading,
    WithValidation
{
    public function collection(Collection $rows): void
    {
        ImportMahasiswaJob::dispatch(
            $rows->toArray()
        );
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function rules(): array
    {
        return [
            '*.nim' => ['required'],
            '*.nama' => ['required'],
            '*.email' => ['nullable', 'email'],
        ];
    }
}