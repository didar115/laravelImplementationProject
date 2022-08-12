<?php

namespace App\Http\Controllers;

use App\Models\Didar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('addStudent');
    }

    public function store(Request $request)
    {
        $data =new Didar();

        $data->name = $request->name;
        $data->class = $request->class;
        $data->roll = $request->roll;

        $data->save();
        return redirect()->to('list')->with('success','Data added succesfully');
    }

    public function edit($id)
    {
        $data= Didar::findOrFail($id);
        Session::put('info', $data);
        return view('addStudent');

    }

    public function update(Request $request,$id)

    {
        $data = Didar::where('id', '=', $id)->first();

        $data->name = $request->get('name');
        $data->class = $request->get('class');
        $data->roll = $request->get('roll');

        $data->update();
        return redirect('list')->with('success','Data updated succesfully');


    }

    public function destroy($id)
    {
        Didar::findOrFail($id)->delete();
        return redirect('list')->with('delete','Data Delete succesfully');

    }
}
