<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;

use App\Models\ShoppingList;


class ShoppingListController extends Controller
{

    //show the shopping list page
    public function show_index()
    {
        return view('shopping-list');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shopping_list = DB::select(
            'SELECT spli.id as shopping_list_id, spli.text, spli.completed, spli.created_at, spli.updated_at, spli.user_id, usrs.email
            FROM shopping_list spli
            INNER JOIN users usrs ON spli.user_id = usrs.id
            ORDER BY spli.created_at'
        );

        return $shopping_list;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $newShoppingListItem = new ShoppingList;
        $newShoppingListItem->text = $request->shopping_list_item['text'];
        $newShoppingListItem->user_id = $request->shopping_list_item['user_id'];
        $newShoppingListItem->save();

        return $newShoppingListItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $existingShoppingListItem = ShoppingList::find($id);

        if($existingShoppingListItem){
            $existingShoppingListItem->text = $request->shopping_list_item['text'];
            $existingShoppingListItem->completed = $request->shopping_list_item['completed'] ? true : false;
            $existingShoppingListItem->save();
            return $existingShoppingListItem;
        }

        return "Postavka, na nakupovalnem listku, ne obstaja.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingShoppingListItem = ShoppingList::find($id);

        if($existingShoppingListItem){
            $existingShoppingListItem->delete();
            return "Postavka, na nakupovalnem listku, je uspešno izbrisana.";
        }

        return "Postavka, na nakupovalnem listku, ne obstaja.";
    }

    public function getShoppingList()
    {
        $shopping_list = DB::select(
            'SELECT spli.id as shopping_list_id, spli.text, spli.completed, spli.created_at, spli.updated_at, spli.user_id, usrs.email
            FROM shopping_list spli
            INNER JOIN users usrs ON spli.user_id = usrs.id'
        );

        return $shopping_list;
    }
}
