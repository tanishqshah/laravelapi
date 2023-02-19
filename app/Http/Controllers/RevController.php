<?php

namespace App\Http\Controllers;

use App\Models\rev;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rev = rev::all();
        return $rev;
        
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function store(Request $request)
    {
        $rev = new rev;
        $rev->subject = $request->subject;
        $rev->mssg = $request->mssg;
        $rev->save();
        return ["success" => true, "message" => "mssg done"];
    }

   
}