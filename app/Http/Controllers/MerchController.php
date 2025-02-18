<?php

namespace App\Http\Controllers;

use App\Models\Merch;
use Illuminate\Http\Request;

class MerchController extends Controller
{

    public function showMerch($slug)
    {
        $merch = Merch::where('slug', $slug)->get();
        
        return view('merchs.merch', [
            'merch' => $merch
        ]);
    }
    
}
