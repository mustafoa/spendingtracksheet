<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function index()
    {
        $trades = Trade::all();
        return view('savdo', compact('trades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'cash' => 'required',
            'terminal' => 'required',
            'product' => 'required',
            'cost' => 'required',
            'comment' => 'required',
        ]);
        Trade::create($request->post());
        return redirect()->back();
    }

    // show

    public function show($id)
    {
        $trade = Trade::find($id);
        return view('savdoShow',compact('trade'));
    }

    // edit
    public function edit($id)
    {
        $trade = Trade::find($id);
        return view('savdoEdit',compact('trade'));
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'cash' => 'required',
            'terminal' => 'required',
            'product' => 'required',
            'cost' => 'required',
            'comment' => 'required',
        ]);

        $trade = Trade::find($id);
        $trade->update($request->all());
        return redirect()->route('index');
    }

    // remove
    public function destroy($id)
    {
        $trade = Trade::find($id);
        $trade->delete();
        return redirect()->back();
    }


}
