<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function get_employees()
    {
        $employee= Employee::orderBy('created_at', 'DESC')->get();
        // $user= User::orderBy('created_at', 'DESC')->get();
     
        return view('tables.employees')->with('employees', $employee)
                                
            ;}
    //new employee
    public function new_employee(Request $request){
        // ddd($request->input());
        //  $user = new User();
         $employee = new Employee();
         
         $employee->name=$request->input('name');
         $employee->cin=$request->input('cin'); 
         $employee->email=$request->input('email');
         $employee->tel=$request->input('tel');
         $employee->adresse=$request->input('adresse');
         //photo
         if($request->photo){
         $file = $request->photo;
             $extenstion = $file->getClientOriginalExtension();
             $filename = time().'.'.$extenstion;
             $file->move('storage/materials/', $filename);
             $employee->photo = $filename;
         }
        
         $employee->save();
         return redirect()->back()->with('status','Employee Added Successfully');
         // return $request->all();
 
         
     }
    //delete employee
    public function delete_employee($id) {
        $employee = Employee::find($id);
        $employee->delete();

        return back()->with('success', 'Employee Deleted!');
    }
}
