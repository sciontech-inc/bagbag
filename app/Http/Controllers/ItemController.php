<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id')->get();
        return view('businessDev.pages.item.item',compact('items'));
    }

    public function store(Request $request)
    {
        $item = $request->validate([
            'item' => ['required', 'max:60'],
            'amount' => ['required','max:200'],
        ]);

        $item = new Item([
            'item' => $request->item,
            'amount' => $request->amount,
        ]);
        $item->save();

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $items = Item::where('id',$id)->orderBy('id')->firstOrFail();
        return response()->json(compact('items'));
    }

    public function update(Request $request, $id)
    {
        Item::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
