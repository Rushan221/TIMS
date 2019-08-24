<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $title = 'Subjects';
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Subject';
        return view('admin.subjects.create',compact('title'));
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

            Subject::create([
            'name'=>$request->name,
            'code'=>$request->code
        ]);
        return redirect(route('admin.subjects.index'));
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
        $title = 'Edit Subject';
        $subject = Subject::whereId($id)->first();

        return view('admin.subjects.edit',compact('subject','title'));
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
        
        Subject::whereId($id)->update([
            'name'=>$request->name,
            'code'=>$request->code
        ]);
        return redirect(route('admin.subjects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Subject::whereId($id)->delete();
        return redirect(route('admin.subjects.index'));
    }
}
