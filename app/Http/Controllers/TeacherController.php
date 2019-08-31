<?php

namespace App\Http\Controllers;

use App\Department;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Teachers';
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('title', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $subjects = Subject::all();
        $title = 'Add Teacher';
        return view('admin.teachers.create', compact('title', 'departments', 'subjects'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'contact' => 'required|min:10|numeric',
            'email_address' => 'email',
            'address' => 'required',
            'department_id' => 'required',
            'subject_id' => 'required',
        ];

        $request->validate($rules);
        $teacherCode = 'T-' . (strtolower(str_random(5)));
        Teacher::create([
            'teacher_code' => $teacherCode,
            'name' => $request->name,
            'contact_no' => $request->contact,
            'email' => $request->email_address,
            'address' => $request->address,
            'user_id' => 1,
            'department_id' => $request->department_id,
            'subject_id' => $request->subject_id,
        ]);

        return redirect(route('admin.teachers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Teacher';
        $teacher = Teacher::whereId($id)->first();
        $departments = Department::all();
        $subjects = Subject::all();

        return view('admin.teachers.edit', compact('title', 'teacher', 'departments', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'contact' => 'required|min:10|numeric',
            'email_address' => 'email',
            'address' => 'required',
            'department_id' => 'required',
            'subject_id' => 'required',
        ];
        $request->validate($rules);

        Teacher::whereId($id)->update([
            'name' => $request->name,
            'contact_no' => $request->contact,
            'email' => $request->email_address,
            'address' => $request->address,
            'department_id' => $request->department_id,
            'subject_id' => $request->subject_id,
        ]);
        return redirect()->route('admin.teachers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::whereId($id)->delete();
        return redirect(route('admin.teachers.index'));
    }
}
