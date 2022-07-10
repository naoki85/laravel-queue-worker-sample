<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Log;

class CsvController extends Controller
{
    public function index()
    {
        return view("csv.index");
    }

    public function import()
    {
        $file = fopen("/tmp/items.csv", "r");
        while(!feof($file)) {
            $line = fgets($file);
            $item = new Item();
            $item->name = $line;
            $item->save();
            Log::debug('imported: ' . $line);
        }
        fclose($file);
        return redirect()->route('csv.complete');
    }

    public function complete()
    {
        return view("csv.complete");
    }
}
