<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Features;

class FeaturesController extends Controller
{
    public function getFeatures() {
        $features = Features::get();
        return $features;
    }
}
