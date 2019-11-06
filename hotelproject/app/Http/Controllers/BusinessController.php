<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    public function businessManagementView()
    {
        $hotelsList = DB::table('hotels')->pluck('name');
        return view('hotelmanagement.business_manage', compact('hotelsList'));
    }


}
