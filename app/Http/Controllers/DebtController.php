<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\DebtMen;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    public function menu()
    {
        $debtMens = DebtMen::all();
        $debts = Debt::all();
        $SumReceive = 0;
        $SumGiven = 0;
        foreach ($debts as $item) {
            $SumReceive += $item->receive;
            $SumGiven += $item->given;
        }
        return view('Qarz.qarzLayouts', compact('debtMens', 'SumReceive', 'SumGiven'));
    }

    public function menuAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        DebtMen::create($request->post());
        return redirect()->back();
    }

    // Add debt

    public function addDebt(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'receive' => 'required',
            'given' => 'required',
            'comment' => 'required',
            'debt_men_id' => 'required',
        ]);
        Debt::create($request->post());
        return redirect()->back();
    }

    public function dbShow($id)
    {
        $SumDebts = Debt::all();
        $debtMens = DebtMen::all();
        $debts = DebtMen::with('debts')->find($id);
        $SumReceive = 0;
        $SumGiven = 0;
        foreach ($SumDebts as $item) {
            $SumReceive += $item->receive;
            $SumGiven += $item->given;
        }
        // Day db
        $DaySumReceive = 0;
        $DaySumGiven = 0;
        foreach ($debts->debts as $item) {
            $DaySumReceive += $item->receive;
            $DaySumGiven += $item->given;
        }

        return view('Qarz.qarz', compact('debtMens', 'debts', 'SumReceive', 'SumGiven','DaySumReceive','DaySumGiven'));
    }

    public function DayDbShow($id)
    {
        $debts = Debt::find($id);
        $debtname = DebtMen::with('debts')->find($debts->debt_men_id);
        return view('Qarz.qarzshow', compact('debts', 'debtname'));
    }

    public function destroy($id)
    {
        $debts = Debt::find($id);
        $debts->delete();
        return redirect()->back();
    }

    // menu Delete
    public function menuDBDelete($id)
    {
        $debtmen = DebtMen::find($id);
        $debtmen->delete();
        return redirect()->route('qarz');
    }

    // edit
    public function edit($id)
    {
        $debt = Debt::find($id);
        return view('Qarz.qarzEdit', compact('debt'));
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'receive' => 'required',
            'given' => 'required',
            'comment' => 'required',
            'debt_men_id' => 'required',
        ]);
        $debt = Debt::find($id);
        $debt->update($request->all());
        return redirect()->route('qarz');
    }
}
