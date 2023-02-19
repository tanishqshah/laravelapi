<?php

namespace App\Http\Controllers;

use App\Models\userReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class userReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new userReview;
        $user->subject = $request->subject;
        $user->mssg = $request->mssg;
        $user->save();
        return ["success" => true, "message" => "mssg done"];
    }

    
    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
   

    /**
     * Remove the specified resource from storage.
     */
  
}
