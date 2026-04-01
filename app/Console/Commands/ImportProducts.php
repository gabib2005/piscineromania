<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ExcelImportService;

class ImportProducts extends Command
{
    protected $signature   = 'products:import {--file= : Cale specifică fișier xlsx (opțional)}';
    protected $description = 'Importă produse din fișierele Aquashop.hu xlsx';

    public function handle(ExcelImportService $service): int
    {
        $customFile = $this->option('file');

        if ($customFile) {
            $files = [$customFile];
        } else {
            // Fișierele standard din Documente
            $base  = base_path('Documente/Poze produse');
            $files = [
                $base . '/AS_WS_Produse_2026.xlsx',
                $base . '/AS_WS_Produse_noi.xlsx',
            ];
        }

        $totalAdded   = 0;
        $totalUpdated = 0;
        $totalErrors  = 0;

        foreach ($files as $file) {
            if (!file_exists($file)) {
                $this->warn("Fișier negăsit: {$file}");
                continue;
            }

            $this->info("Import: " . basename($file) . " ...");
            $bar = null;

            $result = $service->import($file);

            $totalAdded   += $result['added'];
            $totalUpdated += $result['updated'];
            $totalErrors  += $result['errors'];

            $this->line(sprintf(
                "  ✓ Adăugate: %d | Actualizate: %d | Erori: %d",
                $result['added'],
                $result['updated'],
                $result['errors']
            ));
        }

        $this->newLine();
        $this->info(sprintf(
            "Import finalizat! Total adăugate: %d | Actualizate: %d | Erori: %d",
            $totalAdded, $totalUpdated, $totalErrors
        ));

        return self::SUCCESS;
    }
}
