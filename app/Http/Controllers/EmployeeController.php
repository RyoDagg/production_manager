<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function get_employees()
    {
        $employee= Employee::orderBy('created_at', 'DESC')->get();
     
        return view('tables.employees')->with('employees', $employee)
                                
            ;}
    //new employee
    public function new_employee(Request $request){
        // ddd($request->input());
         $employee = new Employee();
         
         $employee->name=$request->input('name'); //name
         $employee->cin=$request->input('cin'); //unit
         $employee->email=$request->input('email'); //quantite
         $employee->adresse=$request->input('adresse'); //description
         //photo
         if($request->photo){
         $file = $request->photo;
             $extenstion = $file->getClientOriginalExtension();
             $filename = time().'.'.$extenstion;
             $file->move('storage/materials/', $filename);
             $employee->photo = $filename;
         }
        
         $employee->save();
         // redirect to the materials page after saving the record
         return redirect()->back()->with('status','Employee Added Successfully');
         // return $request->all();
 
         
     }
}
