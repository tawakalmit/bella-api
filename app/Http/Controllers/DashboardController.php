<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Features;
use App\Models\HomeBanner;
use App\Models\NewArrival;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File; 

class DashboardController extends Controller
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

    public function getDashboard() {
        $menu = $this->getMenu();
        return view('dashboard', compact('menu'));
    }

    public function getFeatures() {
        $features = Features::get();
        $menu = $this->getMenu();
        return view('features', compact('features' , 'menu'));
    }

    public function postFeatures(Request $request) {
        $features = new Features;
        $file = $request->file('icon');
        $filename = $file->getClientOriginalName();
        $file->storeAs('icon', $filename);

        $features->title = $request->title;
        $features->description = $request->description;
        $features->icon = $request->file('icon')->getClientOriginalName();
        $features->save();

        return redirect('/features')->with('status', 'Data succesfully added !');
    }

    public function editFeatures ($id) {
        $features = Features::find($id);
        $menu = $this->getMenu();
        return view('features_edit', compact('features','menu'));
    }

    public function updateFeatures (Request $request, $id) {
        $features = Features::find($id);
        
        if ($request->title) {
            $features->title = $request->title;
        }
        
        if ($request->description) {
            $features->description = $request->description;
        }

        if($request->file('icon')){
            $file = $request->file('icon');
            $filename = $file->getClientOriginalName();
            $file->storeAs('icon', $filename);
            $features->icon = $request->file('icon')->getClientOriginalName();
        }

        $features->save();

        return redirect('/features')->with('status', 'Data succesfully updated !');
    }

    public function deleteFeatures ($id) {
        $features = Features::find($id);
        File::delete(public_path('/storage/icon/'. $features->icon));
        $features->delete();
        return redirect('/features')->with('status', 'Data succesfully deleted !');
    }

    public function postBanner (Request $request) {
        $homeBanner = new HomeBanner;
        $file = $request->file('image_banner');
        $filename = $file->getClientOriginalName();
        $file->storeAs('image_banner', $filename);
        $homeBanner->image_banner = $filename;
        $homeBanner->save();
        return redirect('/home_banner_tables')->with('status', 'Data succesfully added !');
    }

    public function getBanner () {
        $homeBanner = HomeBanner::get();
        $menu = $this->getMenu();
        return view('home_banner_tables', compact('homeBanner', 'menu'));
    }

    public function deleteHomeBanner ($id) {
        $homeBanner = homeBanner::find($id);
        File::delete(public_path('/storage/image_banner/'. $homeBanner->icon));
        $homeBanner->delete();
        return redirect('/home_banner_tables')->with('status', 'Data succesfully deleted !');
    }

    public function editBanner ($id) {
        $homeBanner = homeBanner::find($id);
        $menu = $this->getMenu();
        return view('home_banner_tables_edit', compact('homeBanner','menu'));
    }

    public function updateHomeBanner (Request $request, $id) {
        $homeBanner = homeBanner::find($id);

        if($request->file('image_banner')){
            $file = $request->file('image_banner');
            $filename = $file->getClientOriginalName();
            $file->storeAs('image_banner', $filename);
            $homeBanner->image_banner = $request->file('image_banner')->getClientOriginalName();
        }

        $homeBanner->save();

        return redirect('/home_banner_tables')->with('status', 'Data succesfully updated !');
    }

    public function getNewArrival () {
        $newArrival = NewArrival::get();
        $menu = $this->getMenu();
        return view('new_arrival', compact('newArrival', 'menu'));
    }

    public function postNewArrival (Request $request) {
        $newArrival = new NewArrival;
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('image', $filename);
        $newArrival->image = $filename;
        $newArrival->save();
        return redirect('/new_arrival')->with('status', 'Data succesfully added !');
    }

    public function deleteNewArrival ($id) {
        $newArrival = NewArrival::find($id);
        File::delete(public_path('/storage/image/'. $newArrival->image));
        $newArrival->delete();
        return redirect('/new_arrival')->with('status', 'Data succesfully deleted !');
    }

    public function editNewArrival ($id) {
        $newArrival = NewArrival::find($id);
        $menu = $this->getMenu();
        return view('new_arrival_edit', compact('newArrival','menu'));
    }

    public function updateNewArrival (Request $request, $id) {
        $newArrival = NewArrival::find($id);
        
        if($request->file('image')){
            File::delete(public_path('/storage/image/'. $newArrival->image));
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('image', $filename);
            $newArrival->image = $request->file('image')->getClientOriginalName();
        }

        $newArrival->save();

        return redirect('/new_arrival')->with('status', 'Data succesfully updated !');
    }

    public function getProductCategory () {
        $productCategory = ProductCategory::get();
        $menu = $this->getMenu();
        return view('/product_category', compact('productCategory', 'menu'));
    }

    public function postProductCategory (Request $request) {
        $productCategory = new ProductCategory;
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('image', $filename);
        $productCategory->title = $request->title;
        $productCategory->image = $filename;
        $productCategory->save();
        return redirect('/product_category')->with('status', 'Data succesfully added !');
    }

    public function deleteProductCategory ($id) {
        $productCategory = ProductCategory::find($id);
        File::delete(public_path('/storage/image/'. $productCategory->image));
        $productCategory->delete();
        return redirect('/product_category')->with('status', 'Data succesfully deleted !');
    }

    public function editProductCategory ($id) {
        $productCategory = ProductCategory::find($id);
        $menu = $this->getMenu();
        return view('product_category_edit', compact('productCategory','menu'));
    }

    public function updateProductCategory (Request $request, $id) {
        $productCategory = ProductCategory::find($id);

        if($request->title){
            $productCategory->title = $request->title;
        }
        
        if($request->file('image')){
            File::delete(public_path('/storage/image/'. $productCategory->image));
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('image', $filename);
            $productCategory->image = $request->file('image')->getClientOriginalName();
        }

        $productCategory->save();

        return redirect('/product_category')->with('status', 'Data succesfully updated !');
    }
 }
