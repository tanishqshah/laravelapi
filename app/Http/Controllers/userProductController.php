<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class userProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }


    public function userProducts($id)
    {
        $data = User::find($id)->products()->get();
        return $data;
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userProduct = new UserProduct;
        $userProduct->user_id = $request->user_id;
        $userProduct->product_id = $request->product_id;
        $userProduct->amount = $request->amount;
        $userProduct->save();
        $cart=$this->userProducts($request->user_id);
        return ["success"=>true,"message"=>"Added To Cart","cart"=>$cart];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = UserProduct::find($id);
        $item->quantity = $request->quantity;
        $item->amount = $request->amount;
        $item->save();

        return ["success"=>true,"message"=>"updated the cart"];

    }

    public function removeFromCart($userid,$productid)
    {
        $item=UserProduct::where(["user_id"=>$userid,"product_id"=>$productid]);
        $item->delete();

        $cart=$this->userProducts($userid);

        return ["success"=>true,"message"=>"Removed From Cart","cart"=>$cart];

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = UserProduct::find($id);
        $item->delete();
        return ["success" => true, "message" => "removed the cart"];
        
    }
}
