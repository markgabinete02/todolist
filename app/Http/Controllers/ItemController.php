<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;


class ItemController extends Controller
{
    //
    public function index()
    {
      return Item::orderBy('created_at', 'DESC')->get();
      // code...
    }
    public function create()
    {
      // code...
    }
    public function destroy($id)
    {
      // code...
      $existingItem = Item::find($id);
      if ($existingItem) {
        // code...
        $existingItem->delete();
        return "Item successfully delete";
      }
      return "Item not found";
    }
    public function store(Request $request)
    {
      // code...
      $newItem = new Item;
      $newItem->name = $request->item["name"];
      $newItem->save();

      return $newItem;
    }
    public function show($id)
    {

    }
    public function update(Request $request, $id)
    {
      $existingItem = Item::find($id);
      if ($existingItem) {
        $existingItem->completed = $request->item['completed'] ? true : false;
        $existingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
        $existingItem->save;

        return $existingItem;
      }
      return "Item not Found";
    }
}
