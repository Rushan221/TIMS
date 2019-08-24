<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Departments';
        $departments = Department::all();
        return view('admin.departments.index', compact('departments', 'title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = 'Add Department';
        return view('admin.departments.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules=[
            'name'=>"required|min:3",
            'code'=>"required"
        ];
        $request->validate($rules);

        Department::create([
            'name'=>$request->name,
            'code'=>$request->code
        ]);
        return redirect(route('admin.departments.index'));
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
        $title = 'Edit Department';
        $department = Department::whereId($id)->first();

        return view('admin.departments.edit',compact('department','title'));
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
        $rules=[
            'name'=>"required|min:3",
            'code'=>"required"
        ];
        $request->validate($rules);
        
        Department::whereId($id)->update([
            'name'=>$request->name,
            'code'=>$request->code
        ]);
        return redirect(route('admin.departments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::whereId($id)->delete();
        return redirect(route('admin.departments.index'));
    }
}
