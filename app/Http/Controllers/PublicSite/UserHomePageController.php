<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class UserHomePageController extends Controller
{
    public function index()
    {
        // Fetch the latest 4 items added to the database
    //     $latestItems = Item::latest()->take(4)->get();
    
    //     // Pass the items to the view
    //     return view('PublicSite.homePage.index', compact('latestItems'));
    // 
    }
    
}
