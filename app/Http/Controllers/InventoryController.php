<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Locations;
use App\LocationStock;
use App\Movements;
use App\Stock;
use App\ItemUnits;
use App\ItemTaxTypes;
use App\StockCategory;
use App\Dimensions;
use App\ChartMaster;
use Auth;

class InventoryController extends Controller
{

    /**
     * INVENTORY ITEMS
     */

    public function add_items(){
        $schools_id = Auth::user()->schools_id;
        $categories = StockCategory::where('schools_id',$schools_id)->get();
        $tax_types = ItemTaxTypes::where('schools_id',$schools_id)->get();
        $units = ItemUnits::where('schools_id',$schools_id)->get();
        $dimensions = Dimensions::where('schools_id',$schools_id)->get();
        $sales_account = ChartMaster::where('schools_id',$schools_id)->get();
        $inventory_account = ChartMaster::where('schools_id',$schools_id)->get();
        $cogs_account = ChartMaster::where('schools_id',$schools_id)->get();
        $inventory_adjustment = ChartMaster::where('schools_id',$schools_id)->get();

        return view('backend.inventory.items')
                            ->with(compact(
                                    'categories','tax_types',
                                    'units','dimensions',
                                    'sales_account','inventory_account',
                                    'cogs_account','inventory_adjustment'
                                ));
    }
    public function add_items_store(Request $request){
        $schools_id = Auth::user()->schools_id;
        $item_code = $request->item_code;
        $description = $request->description;
        $category_id= $request->category_id;
        $tax_type_id = $request->tax_type_id;
        $units = $request->units;
        $dimension_id = $request->dimension_id;
        $sales_account = $request->sales_account;
        $inventory_account = $request->inventory_account;
        $cogs_account = $request->cogs_account;
        $adjustment_account = $request->adjustment_account;
        $inactive = $request->inactive;

        $insert = new Item;
        $insert->schools_id = $schools_id;
        $insert->item_code = $item_code;
        $insert->stock_id = $item_code;
        $insert->description = $description;
        $insert->category_id = $category_id;
        $insert->quantity = 1;
        $insert->inactive = $inactive;
        $insert->save();

        
        $insert = new LocationStock;
        $insert->schools_id = $schools_id;
        $insert->loc_code = 'DEF';
        $insert->stock_id = $item_code;
        $insert->reorder_level = 0;
        $insert->save();
        

        $insert = new Stock;
        $insert->schools_id = $schools_id;
        $insert->stock_id = $item_code;
        $insert->category_id = $category_id;
        $insert->tax_type_id = $tax_type_id;
        $insert->description = $description;
        $insert->long_description = '';
        $insert->units = $units;
        $insert->mb_flag  = 'B' ;
        $insert->sales_account  = $sales_account ;
        $insert->cogs_account  = $cogs_account ;
        $insert->inventory_account = $inventory_account;
        $insert->adjustment_account  = $adjustment_account  ;
        $insert->assembly_account  =  0;
        $insert->dimension_id  = $dimension_id ;
        $insert->dimension2_id  = 0 ;
        $insert->actual_cost  =  0;
        $insert->last_cost  =  0;
        $insert->material_cost  = 0 ;
        $insert->labour_cost  =  0;
        $insert->overhead_cost  = 0 ;
        $insert->inactive  = $inactive ;
        $insert->save();

        return redirect()->route('inventory.add_items')
                        ->with('success','Item added successfully.');
    }


    public function inventorylocationtransfer(){
        $schools_id = Auth::user()->schools_id;
        $items = Item::where('schools_id',$schools_id)->get();
        $locations = Locations::where('schools_id',$schools_id)->get();
        return view('backend.inventory.inventorylocationtransfer')->with(compact('items','locations'));
    }

    public function inventoryadjustment(){
        $items = Item::all();
        $locations = Locations::all();
        return view('backend.inventory.inventoryadjustment')->with(compact('items','locations'));
    }

    /**
     * INVENTORY LOCATIONS
     */
    public function inventory_location(){
        $schools_id = Auth::user()->schools_id;
        $locations = Locations::where('schools_id',$schools_id)->get();
        return view('backend.inventory.inventorylocations')->with(compact('locations'));
    }
    public function inventory_location_store(Request $request){
        $schools_id = Auth::user()->schools_id;
        $location_code = $request->location_code;
        $location_name = $request->location_name;
        $delivery_address = $request->delivery_address;
        $phone = $request->phone;
        $phone2 = $request->phone2;
        $fax = $request->fax;
        $email = $request->email;
        $contact = $request->contact;
        $inactive = 0;


        $insert = new Locations;
        $insert->schools_id = $schools_id;
        $insert->location_code = $location_code;
        $insert->location_name = $location_name;
        $insert->delivery_address = $delivery_address;
        $insert->phone = $phone ;
        $insert->phone2 = $phone2;
        $insert->fax = $fax;
        $insert->email = $email ;
        $insert->contact = $contact;
        $insert->inactive = $inactive;
        $insert->save();

        return redirect()->route('inventory.inventorylocation')
                            ->with('success','Location added successfully.');
    }

    /**
     * INVENTORY MOVEMENTS
     */

    public function inventory_movement(){
        $schools_id = Auth::user()->schools_id;
        $movements = Movements::where('schools_id',$schools_id)->get();
        return view('backend.inventory.inventorymovementtypes')->with(compact('movements'));
    } 
    public function inventory_movement_store(Request $request){
        $schools_id = Auth::user()->schools_id;
        $name = $request->name;
        $insert = new Movements;
        $insert->schools_id = $schools_id;
        $insert->name = $name;
        $insert->save();

        return redirect()->route('inventory.inventorymovement')
                            ->with('success','Movement added successfully.');
    }

    /**
     * Units of Measure
     */
    public function unitofmeasure(){
        $schools_id = Auth::user()->schools_id;
        $units = ItemUnits::where('schools_id',$schools_id)->get();
        return view('backend.inventory.unitsofmeasure')->with(compact('units'));


    }

    public function unitofmeasure_store(Request $request){
        $schools_id = Auth::user()->schools_id;
        $abbr = $request->abbr;
        $name = $request->name;
        $decimals = $request->decimals;

        $insert = new ItemUnits;
        $insert->schools_id = $schools_id;
        $insert->abbr = $abbr;
        $insert->name = $name;
        $insert->decimals = $decimals;
        $insert->save();

        return redirect()->route('inventory.unitofmeasure')
                            ->with('success','Units of Measure added successfully.');
    }
}
