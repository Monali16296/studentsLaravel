<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller {

    public function studentForm() {

        $randomId = $this->duplicateRandomNumber();
        return view('students.registrationForm', compact('randomId'));
    }

    public function duplicateRandomNumber() {
        $number = rand(10000, 99999);

        $checkExistingRandomId = Student::where('randomId', $number)->first();

        if($checkExistingRandomId) {            
            $this->duplicateRandomNumber();
        }        
        return $number;
    }

    public function store(Request $request) {
        //For accessing request as array
//        echo '<pre>';
//        print_r($request->all());exit;

        //For getting method of request
//        echo '<pre>';
//        print_r($request->method());exit;

        //For getting url without query string
//        echo '<pre>';
//        print_r($request->url());exit;

        //For getting fullurl with query string
//        echo '<pre>';
//        print_r($request->fullUrl());exit;

        //For redirecting to a domain outside of your application.
//return redirect()->away('https://www.google.com/');
        
        //For downloading file
//       return response()->download('C:\Users\Admin\Desktop\images.jpg');
        
        //For displaying a file, such as an image or PDF, directly in the user's browser instead of initiating a download. 
//       return response()->file('C:\Users\Admin\Desktop\images.jpg');
        
       $this->validate($request, [
           
           /*If we want null value as valid value then use nullabble.
            * Here firstname can be null or numeric value nothing else.
           */
            //'firstName' => 'nullable|numeric', 
           
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
           
           /*
            *date must be after tomorrow 
            */
            //'dob' => 'required|after:tomorrow',
           
            'dob' => 'required',
            'img' => 'required'
        ]);
        $data = array('randomId' => $request->randomId, 'firstName' => $request->firstName, 'lastName' => $request->lastName, 'address' => $request->address, 'dob' =>$request->dob, 'student_image' =>$request->img);
        Student::create($data);
        $randomId = $this->duplicateRandomNumber();
        return view('students.registrationForm', compact('randomId'))->with('msg', 'You are successfully registered.Thank You!');
        
    }

    public function view() {
        /*
         * For counting records of database
         */
//        $data = Student::get()->count();
//        echo '<pre>';
//        print_r($data);
        
        /*
         * For finding max value of particular column of db
         */
//        $data = Student::get()->max('randomId');
//        echo '<pre>';
//        print_r($data);
        
        /*
         * For summation of particular column of db
         */
//        $data = Student::get()->sum('randomId');
//        echo '<pre>';
//        print_r($data);exit;

        $data = Student::get();
        return view('students.viewAll', compact('data'));
    }
    
    public function edit($id) {
        
        $data = Student::where('randomId', $id)->get()->first();
        return view('students.editForm', compact('data'));
    }
    
    public function update(Request $request, $id) {        
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'dob' => 'required'
        ]);
        $data = array('randomId' => $request->randomId, 'firstName' => $request->firstName, 'lastName' => $request->lastName, 'address' => $request->address, 'dob' =>$request->dob);
        Student::where('randomId', $id)->update($data);
        
        $data = Student::get();
        return view('students.viewAll', compact('data'))->with('updatemsg', 'Updated successfully');
        
        
    }
    
    public function delete($id) {        
        Student::where('randomId', $id)->delete();
        $data = Student::get();
        return view('students.viewAll', compact('data'))->with('deletemsg', 'Deleted successfully');
    }
}
