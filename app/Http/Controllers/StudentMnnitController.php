<?php

namespace App\Http\Controllers;

use App\StudentMnnit;
use App\ComplaintMnnit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentMnnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complaints.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'regno' => 'required',
            'email' => 'required|email',
            'phoneno' =>'required|digits:10|numeric',
            'hostel' =>'required|max:20',
            'room' =>'required|numeric',
            'nature' =>'required|max:50|string',
            'availabletime'=>'required',
            'availabledate'=>'required'
        ],[
            'name.required' => 'Name is required',
            'regno.required' => 'Registration Number is required',
            'email.required' => 'Email is required',
            'phoneno.required' => 'Contact Number is required',
            'hostel.required' => 'Hostel Name is required',
            'room.required' => 'Room Number is required',
            'nature.required' => 'Nature of Problem is required',
            'availabletime.required' => 'Time of Availabelity is required',
            'availabledate.required' => 'Date of Availabelity is required'

        ]);

        $studentMnnit = new StudentMnnit;

        $studentMnnit->name=    $request->name;
        $studentMnnit->regno=   $request->regno;
        $studentMnnit->email=   $request->email;
        $studentMnnit->phoneno= $request->phoneno;
        $studentMnnit->hostel=  $request->hostel;
        $studentMnnit->room=    $request->room;

        $studentMnnit->save();

        $complaintMnnit = new ComplaintMnnit;

        $complaintMnnit->student_id     =$studentMnnit->id;
        $complaintMnnit->nature         =$request->nature;
        $complaintMnnit->availabletime  =$request->availabletime;
        $complaintMnnit->availabledate  =$request->availabledate;
        $complaintMnnit->staff          =$request->staff;
        $complaintMnnit->status         =$request->status;

        $complaintMnnit->save();

        return redirect()->route('complaints.show',$studentMnnit->id)->with('success', 'Complaint Registered Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentMnnit  $studentMnnit
     * @return \Illuminate\Http\Response
     */
    public function show(StudentMnnit $studentMnnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentMnnit  $studentMnnit
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentMnnit $studentMnnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentMnnit  $studentMnnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentMnnit $studentMnnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentMnnit  $studentMnnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentMnnit $studentMnnit)
    {
        //
    }
}