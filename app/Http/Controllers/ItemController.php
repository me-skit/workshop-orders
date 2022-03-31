<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Price;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(10);

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_item = $request->validate([
            'description' => 'required'
        ]);

        $data_price = $request->validate([
            'cost' => ['nullable', 'regex:/^\d+(\.\d{1,})?$/'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,})?$/']
        ]);

        $item = Item::create($data_item);

        $data_price['item_id'] = $item->id;
        Price::create($data_price);

        return redirect('/items');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Item $item)
    {
        $current_price = $item->current_price;
        $action = $request->get('action') ? $request->get('action') : null;
        return view('items.edit', compact('item', 'current_price', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $data_item = $request->validate([
            'description' => 'required'
        ]);

        $data_price = $request->validate([
            'cost' => ['nullable', 'regex:/^\d+(\.\d{1,})?$/'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,})?$/']
        ]);

        $item->fill($data_item);
        $item->save();

        $current_price = $item->current_price;
        if ($request->get('action'))
        {
            if ($current_price->cost != $data_price['cost'] or $current_price->price != $data_price['price'])
            {
                if ($current_price->price != $data_price['price'])
                {
                    $data_price['item_id'] = $item->id;
                    Price::create($data_price);    
                }
                else 
                {
                    $current_price->fill($data_price);
                    $current_price->save();
                }
            }
        }
        else
        {
            $current_price->fill($data_price);
            $current_price->save();
        }

        return redirect('/items');
    }
}
