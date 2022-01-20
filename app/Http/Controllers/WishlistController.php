<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    public function show(Request $request)
    {
        $wishlist = Wishlist::where('user_id', '=', $request->userId)
            ->with('items')
            ->get();
        $wishlist = ['wishlist' => $wishlist];
        Log::alert($wishlist);
        return response($wishlist, 201);
    }

    public function create(Request $request)
    {
        $wishlist = Wishlist::create([
            'name_list' => $request->nameList,
            'user_id' => $request->userId
        ]);

        $response = [
            'message' => 'La liste a bien été créée !',
        ];

        return response($response, 201);
    }

    public function update(Request $request)
    {
        $wishlist = Wishlist::find($request->id)
            ->update([
                'name_list' => $request->nameList
            ]);

        $response = [
            'message' => 'Le nom de la liste a bien été modifié !',
        ];

        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $wishlist = Wishlist::find($request->id)
            ->delete();

        $response = [
            'message' => 'La liste a bien été supprimée !',
        ];

        return response($response, 201);
    }
}
