<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DatabaseBackupCommand extends Command
{
    protected $signature = 'db:backup';
    protected $description = 'Backup the database';

    public function handle()
    {
        // Implement backup logic here
        // Example using mysqldump
        $backupFileName = 'backup_' . date('Y-m-d_His') . '.sql';
        $outputPath = storage_path('app/backups/') . $backupFileName;

        exec("mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." ".env('DB_DATABASE')." > ".$outputPath);

        $this->info('Database backup created: ' . $backupFileName);
    }
}
