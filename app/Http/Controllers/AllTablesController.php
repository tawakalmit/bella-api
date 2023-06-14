<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AllTablesController extends Controller
{
    public function alltables () {
        $tables = Schema::getAllTables();
        $menu = [];
        for ($i = 0; $i < count($tables); $i++){
            if($tables[$i]->Tables_in_bella == "failed_jobs"){} 
            else if ($tables[$i]->Tables_in_bella == "migrations"){} 
            else if ($tables[$i]->Tables_in_bella == "password_reset_tokens"){} 
            else if ($tables[$i]->Tables_in_bella == "users"){} 
            else if ($tables[$i]->Tables_in_bella == "personal_access_tokens"){} 
            else {
                array_push($menu, $tables[$i]->Tables_in_bella);
            }
        }
        return $menu;
    }
}
