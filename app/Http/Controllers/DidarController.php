<?php

namespace App\Http\Controllers;

use App\Models\Didar;
use App\Models\interests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateValidationRequest;

class DidarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
          $data= Didar::all();
    
        return view('listView',compact('data'));
    }

    public function create()
    {
        Session::forget('info');
        Session::forget('interests');
        $interests= interests::all();
        foreach($interests as $key=>$interest){
            $interestData[] =$interest;
        }      
        Session::put('interestAll', $interestData);
        Session::put('flag','flag');
        return view('addStudent');
    }

    public function store(CreateValidationRequest $request)
    {

        // dd($request->all());

        $request->validated();
        $data =new Didar();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->class = $request->class;
        $data->roll = $request->roll;
        $data->description = $request->description;
        $serializedInterest = serialize(array($request->interest));
        $data ->interest=  $serializedInterest;
        // dd($data ->interest);
        // $request['interest'] = implode(',',$request['interest']);
        // $data->interest = $request['interest'];
    
        $data->save();
        return redirect()->to('list')->with('success','Data added succesfully');
    }

    public function edit($id)
    {
    //    dd(session::all());
        Session::forget('flag');
        $data= Didar::findOrFail($id);
        $editInterests= unserialize($data->interest);
        Session::put('info', $data);
        Session::put('interestEdit', $editInterests);
        // Session::put('interestAll');
        return view('addStudent');

    }

    public function update(CreateValidationRequest $request,$id)

    {
        $request->validated();
        
        $data = Didar::where('id', '=', $id)->first();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->class = $request->class;
        $data->description = $request->description;
        $data->roll = $request->roll;
        $serializedInterest = serialize(array($request->interest));
        $data ->interest=  $serializedInterest;
        

        $data->update();
        return redirect('list')->with('success','Data updated succesfully');


    }

    public function destroy($id)
    {
        Didar::findOrFail($id)->delete();
        return redirect('list')->with('delete','Data Delete succesfully');

    }
}
