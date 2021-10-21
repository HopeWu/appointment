<?php

namespace App\Http\Controllers;

use App\Models\BookableWeekday;
use App\Models\Slot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        $slots = Slot::validSlots();
        $availableWeekdays = BookableWeekday::allIdMinusOne();
        return view('home', ['slots'=>$slots, 'availableWeekdays'=>$availableWeekdays]);
    }
}