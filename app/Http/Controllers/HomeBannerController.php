<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;

class HomeBannerController extends Controller
{
    public function getHomeBanner () {
        $homeBanner = HomeBanner::get();
        return $homeBanner;
    }
}
