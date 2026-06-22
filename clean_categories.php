<?php

use App\Models\Category;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

Category::where('name', 'Gg')->delete();
echo "Deleted Gg categories.\n";
