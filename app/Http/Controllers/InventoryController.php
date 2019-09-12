<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Locations;

class InventoryController extends Controller
{
    public function inventorylocationtransfer(){
        $items = Item::all();
        $locations = Locations::all();
        return view('backend.inventory.inventorylocationtransfer')->with(compact('items','locations'));
    }

    public function inventoryadjustment(){
        $items = Item::all();
        $locations = Locations::all();
        return view('backend.inventory.inventoryadjustment')->with(compact('items','locations'));
    }
}
