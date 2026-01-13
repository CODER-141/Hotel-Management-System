<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\RestaurantMenu;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch active rooms (assuming status 1 is active/available)
        $rooms = Rooms::where('status', 1)->take(6)->get();

        // Fetch menu items (just taking random 6 for showcase)
        $menuItems = RestaurantMenu::take(6)->get();

        return view('home', compact('rooms', 'menuItems'));
    }
}
