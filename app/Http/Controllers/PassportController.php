<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class PassportController extends Controller
{
    public function create()
    {
        return view('create');
    }

    //insert
    public function store(Request $request)
    {
        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $passport= new \App\Passport;
        $passport->name=$request->get('name');
        $passport->email=$request->get('email');
        $passport->number=$request->get('number');
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $passport->date = strtotime($format);
        $passport->office=$request->get('office');
        $passport->filename=$name;
        $passport->save();

        return redirect('passports')->with('success', 'Information has been added');
    }


    // index.php (passports)
    public function index()
    {
        $passports=\App\Passport::all();
        return view('index',compact('passports'));
    }

    function showlist() {
        $passports=\App\Passport::all();
        return view ('home/list',compact('passports'));
    }


    function showsingle($id) {
        $passport = \App\Passport::find($id);
        return view('home/single',compact('passport','id'));
    }


    public function edit($id)
    {
        $passport = \App\Passport::find($id);
        return view('edit',compact('passport','id'));
    }

    public function update(Request $request, $id)
    {
        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }


        $passport= \App\Passport::find($id);
        $passport->name=$request->get('name');
        $passport->email=$request->get('email');
        $passport->number=$request->get('number');
        $passport->office=$request->get('office');

        if (empty($name)){

        $name=$request->get('filename');

        }else{
            $passport->filename=$name;
        }

        $passport->save();
        return redirect('passports');
    }


    public function destroy($id)
    {
        $passport = \App\Passport::find($id);
        $passport->delete();
        return redirect('passports')->with('success','Information has been  deleted');
    }

    function search($query) {
    $passport = \App\Passport:: where('name', 'LIKE', '%'.$query.'%')->get();
    return View('search', ['passport' => $passport]);



    }
}
