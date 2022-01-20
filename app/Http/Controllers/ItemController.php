<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request)
    {
        $item = Item::create([
            'img_item' => $request->imgItem,
            'name_item' => $request->nameItem,
            'wishlist_id' => $request->idWishlist,
            'adress_web' => $request->adressWeb,
            'shop_name' => $request->shopName,
        ]);

        $response = [
            'message' => 'L\'élement a bien été créée !',
        ];

        return response($response, 201);
    }

    public function update(Request $request)
    {
        $item = Item::find($request->id)
            ->update([
                'img_item' => $request->imgItem,
                'name_item' => $request->nameItem,
                'wishlist_id' => $request->idWishlist,
                'adress_web' => $request->adressWeb,
                'shop_name' => $request->shopName,
            ]);

        $response = [
            'message' => 'L\'élement a bien été modifié !',
        ];

        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $item = Item::find($request->id)
            ->delete();

        $response = [
            'message' => 'L\'élement a bien été supprimée !',
        ];

        return response($response, 201);
    }
}
