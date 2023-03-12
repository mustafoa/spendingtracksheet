<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeMen;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function menu(){
        $employeeMens = EmployeeMen::all();
        $employees = Employee::all();
        $SumTotal = 0;
        $SumGiven = 0;
        foreach ($employees as $item){
            $SumTotal += $item->total;
            $SumGiven += $item->given;
        }
        return view('Xodim.xodimLayouts', compact('employeeMens', 'employees', 'SumTotal', 'SumGiven'));
    }

    public function menuAdd(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        EmployeeMen::create($request->post());
        return redirect()->back();
    }

    // Add debt
    public function addEmployee(Request $request){

        $request->validate([
            'date' => 'required',
            'total' => 'required',
            'given' => 'required',
            'comment' => 'required',
            'employee_men_id' => 'required',
        ]);

        Employee::create($request->post());
        return redirect()->back();
    }

    public function employeeShow($id)
    {
        $SumEmployees = Employee::all();
        $employeeMens = EmployeeMen::all();
        $employees = EmployeeMen::with('employees')->find($id);
        $SumTotal = 0;
        $SumGiven = 0;
        foreach ($SumEmployees as $item){
            $SumTotal += $item->total;
            $SumGiven += $item->given;
        }

        $DaySumTotal = 0;
        $DaySumGiven = 0;
        foreach ($employees->employees as $item){
            $DaySumTotal += $item->total;
            $DaySumGiven += $item->given;
        }
        return view('Xodim.xodim', compact('employeeMens', 'employees', 'SumTotal', 'SumGiven','DaySumTotal','DaySumGiven'));
    }

    public function DayEmployeeShow($id)
    {
        $employees = Employee::find($id);
        $employeename = EmployeeMen::with("employees")->find($employees->employee_men_id);
        return view('Xodim.xodimShow', compact('employees', 'employeename'));
    }

    // remove
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->back();
    }

     // remove menu
     public function employeeMenDestroy($id)
     {
         $employeemen = EmployeeMen::find($id);
         $employeemen->delete();
         return redirect()->route('xodim');
     }

    // edit
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('Xodim.xodimEdit',compact('employee'));
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'total' => 'required',
            'given' => 'required',
            'comment' => 'required',
        ]);

        $employee = Employee::find($id);
        $employee->update($request->all());
        return redirect()->route('xodim');
    }

}
