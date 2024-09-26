<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    // Clear application cache
    public function clearCache()
    {
        Artisan::call('cache:clear');
        return response()->json(['success' => true, 'message' => 'Application cache cleared']);
    }

    // Clear config cache
    public function clearConfig()
    {
        Artisan::call('config:clear');
        return response()->json(['success' => true, 'message' => 'Configuration cache cleared']);
    }

    // Clear compiled view cache
    public function clearView()
    {
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'message' => 'View cache cleared']);
    }
}
