<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File; 

class TestimonyController extends Controller
{
    public function getMenu () {
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimony = Testimony::get();
        $menu = $this->getMenu();
        return view('testimony', compact('testimony','menu'));
    }

    public function getTestimonies()
    {
        $testimony = Testimony::get();
        return $testimony;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $testimony = new Testimony;
        $testimony->name = $request->name;
        $testimony->role = $request->role;
        $testimony->review = $request->review;
        $file = $request->file('avatar');
        $filename = $file->getClientOriginalName();
        $file->storeAs('avatar', $filename);
        $testimony->avatar = $filename;
        $testimony->save();
        return redirect('/testimonies')->with('status', 'Data succesfully added !');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimony $testimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimony $testimony, $id)
    {
        $testimonies = Testimony::find($id);
        $menu = $this->getMenu();
        return view('testimony_edit', compact('testimonies', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimony $testimony, $id)
    {
        $testimony = Testimony::find($id);
        if($request->name){$testimony->name = $request->name;}
        if($request->role){$testimony->role = $request->role;}
        if($request->review){$testimony->review = $request->review;}
        if($request->file('avatar')){
            File::delete(public_path('/storage/avatar/'. $testimony->avatar));
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('avatar', $filename);
            $testimony->avatar = $filename;
        }
        $testimony->save();
        return redirect('/testimonies')->with('status', 'Data succesfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimony $testimony, $id)
    {
        $testimonies = Testimony::find($id);
        File::delete(public_path('/storage/avatar/'. $testimonies->avatar));
        $testimonies->delete();
        return redirect('/testimonies')->with('status', 'Data succesfully deleted !');
    }
}
