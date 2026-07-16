<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\AfterSale;
use Illuminate\Support\Facades\Storage;

$records = AfterSale::withTrashed()->get();
echo "Found " . $records->count() . " records in after_sales table:\n\n";

foreach ($records as $record) {
    $rawDbValue = $record->getRawOriginal('image');
    $accessorValue = $record->image;
    
    $existsInPublicDisk = Storage::disk('public')->exists($rawDbValue);
    $fullStoragePath = storage_path('app/public/' . $rawDbValue);
    $fileExistsOnDisk = file_exists($fullStoragePath);
    
    echo "ID: " . $record->id . "\n";
    echo "Title: " . $record->title . "\n";
    echo "Raw DB Value: " . var_export($rawDbValue, true) . "\n";
    echo "Accessor Value: " . var_export($accessorValue, true) . "\n";
    echo "Exists in 'public' disk: " . ($existsInPublicDisk ? 'YES' : 'NO') . "\n";
    echo "Full storage path: " . $fullStoragePath . "\n";
    echo "File exists on disk: " . ($fileExistsOnDisk ? 'YES' : 'NO') . "\n";
    echo "----------------------------------------\n";
}
