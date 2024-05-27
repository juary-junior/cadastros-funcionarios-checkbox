<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('index', compact('employees')); 
    }

   public function deleteAll(Request $request) {
    $ids = $request->ids;
    Employee::whereIn('id', $ids)->delete();
    return response()->json(["success"=> "Funcionário foi excluído!"]);
   }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
            Employee::create($request->all());
        return redirect()->route('employee-index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employees = Employee::where('id',$id)->first();
        if(!empty($employees))
        {
            return view('edit',['employees'=>$employees]);
        }
        else
        {
            return redirect()->route('index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee, $id)
    {
        $data = [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'position' => $request->position,
        ];
        Employee::where('id',$id)->update($data);
        return redirect()->route('employee-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();
        return redirect()->route('employee-index');
    }

    public function search(Request $request) 
{
    $search = $request->search;

    $employees = Employee::where(function($query) use ($search) {
        $query->where('id', 'like', "%$search%")
              ->orWhere('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
    })->get();

    return view('index', compact('employees', 'search'));
}

}
