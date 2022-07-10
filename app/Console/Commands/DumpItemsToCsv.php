<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DumpItemsToCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump_items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump items to CSV file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        for ($i=0; $i < 10000000; $i++) {
            $item = "item_name" . $i . "\n";
            file_put_contents('/tmp/items.csv', $item, FILE_APPEND);
        }
        return 0;
    }
}
