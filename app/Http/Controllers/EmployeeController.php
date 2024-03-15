<?php

namespace App\Http\Controllers;

//import Model "Employee
use App\Models\Employee;

//return type View
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;


use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get employees
        $employees = Employee::latest()->paginate(5);

        //render view with posts
        return view('employees.index', compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse

    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'username' => 'required|min:5',
            'email'    => 'required|min:5',
            'addres'   => 'required|min:5'
        ]);

         //create employee
        Employee::create([
            'name'     => $request->name,
            'username'   => $request->username,
            'email'     => $request->email,
            'addres'   => $request->addres
        ]);

//redirect to index
return redirect()->route('employees.index')->with(['success' => 'Data Has Been Saved!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get employee by ID
        $employee = Employee::findOrFail($id);

        //render view with employee
        return view('employees.show', compact('employee'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
         //get employee by ID
        $employee = Employee::findOrFail($id);

        //render view with employee
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //validate form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'username' => 'required|min:5',
            'email'    => 'required|min:5',
            'addres'   => 'required|min:5'
        ]);

        //get employee by ID
        $employee = Employee::findOrFail($id);


        //update employee data
            $employee->update([
                'name'     => $request->name,
                'username'   => $request->username,
                'email'     => $request->email,
                'addres'   => $request->addres,
            ]);

        //redirect to index
        return redirect()->route('employees.index')->with(['success' => 'Data has been changed!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}
