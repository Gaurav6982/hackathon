<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\application;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $user=Auth::user();
        if(Auth::user()->usertype=='admin')
        return redirect('/home');
        else
        return view('main.apply')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'reason'=>'required',
            'from'=>'required',
            'to'=>'required',
            'duration'=>'required',
            // 'proof'=>'required',
        ]);
            $entry=new application;
            $entry->email=Auth::user()->email;
            $entry->reason=$request->input('reason');
            $entry->from=$request->input('from');
            $entry->to=$request->input('to');
            $entry->duration=$request->input('duration');
            // $entry->expire=now()->addHour($request->input('duration'));
            $entry->status='Pending';
            $entry->user_id=Auth::user()->id;
            //upload file
            if($request->hasFile('proof'))
            {
                $filenameext=$request->file('proof')->getClientOriginalName();

                $name=pathinfo($filenameext,PATHINFO_FILENAME);

                $ext=$request->file('proof')->getClientOriginalExtension();

                $filenametostore=Auth::user()->id.'.'.$ext;

                $path=$request->file('proof')->storeAs('public/proofs',$filenametostore);

                $entry->proof=$filenametostore;
            }
                
            $data=array(
                'name'=>$request->input('name'),
                'reason'=>$request->input('reason'),
                'from'=>$request->input('from'),
                'to'=>$request->input('to'),
                'duration'=>$request->input('duration'),
                'email'=>$request->input('email'),
            );
            
            if($entry->save())
            {
                $user=Auth::user();
                $user->no_of_applications=$user->no_of_applications+1;
                $user->save();

                Mail::to('gaurav.jss.027@gmail.com')->send(new SendMail($data));

                return redirect('/home')->with('success','Form Submitted Successfully');
            }
            else
            return redirect('/apply')->with('error','Some Error Occured!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
