<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index(Request $request)
    {

        $id = Member::where('NPM', $request->query('NPM'))->get();
        $members = Member::get();
        return view('member', compact('members', 'id'));
    }
    
}
