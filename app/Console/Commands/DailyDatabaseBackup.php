<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;

class DailyDatabaseBackup extends Command
{
    protected $signature = 'backup:daily';

    protected $description = 'Run daily database backups';

    public function handle()
    {
        $this->info('Starting daily database backup...');

        // Trigger the backup
        $backupJob = BackupJobFactory::createFromArray(config('backup.backup'));
        $backupJob->run();

        $this->info('Daily database backup completed successfully.');
    }
}
