<?php

use App\Models\Category;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
$cats = Category::all();
foreach ($cats as $c) {
    echo $c->id.': '.$c->name."\n";
}
