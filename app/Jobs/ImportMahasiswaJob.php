<?php

namespace App\Jobs;

use App\Models\Mahasiswa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportMahasiswaJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public int $tries = 3;

    public int $timeout = 300;

    public function __construct(
        public array $rows
    ) {}

    public function handle(): void
    {
        // DB::transaction(function () {

           // $insertData = [];

            //foreach ($this->rows as $row) {

            //    $insertData[] = [
             //       'nim'             => $row['nim'],
              //      'nama'            => $row['nama'],

            //        'created_at'      => now(),
      //              'updated_at'      => now(),
       //         ];
     //       }

        //    Mahasiswa::insert($insertData);

         //   Log::info('Import mahasiswa berhasil', [
         //       'total' => count($insertData),
         //   ]);
      //  });
    }
}