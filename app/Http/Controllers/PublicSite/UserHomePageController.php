<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class UserHomePageController extends Controller
{
    
    public function index()
{
    // Fetch the last 4 items added to the database
    $latestItems = Item::orderBy('created_at', 'desc')->take(4)->get();
    // Fetch the first eight items in the database  
    $firstItems = Item::orderBy('created_at', 'asc')->take(8)->get();


    // Pass the items to the view
    return view('PublicSite.homePage.index', compact('latestItems', 'firstItems'));
}

    
}
