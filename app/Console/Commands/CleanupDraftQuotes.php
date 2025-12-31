<?php

namespace App\Console\Commands;

use App\Models\QuoteRequest;
use Illuminate\Console\Command;

class CleanupDraftQuotes extends Command
{
    protected $signature = 'quotes:cleanup-drafts {--days=14}';
    protected $description = 'Delete old draft quote requests';

    public function handle(): int
    {
        $days = (int)$this->option('days');

        $count = QuoteRequest::query()
            ->where('status', 'draft')
            ->where('updated_at', '<', now()->subDays($days))
            ->delete();

        $this->info("Deleted drafts: {$count}");
        return self::SUCCESS;
    }
}
