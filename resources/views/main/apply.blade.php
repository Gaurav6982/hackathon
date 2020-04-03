@extends('layouts.app')

@section('content')
    <div class="container">
    
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="text-center" style="font-style:italic;color:greenyellow">Apply Here</h1>
                    {!! Form::open(['action' => 'ApplyController@store','method'=>'post','encType'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('name','Name:')}}    
                        {{Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Enter Name','readonly'])}}    
                    </div>
                    <div class="form-group">
                        {{Form::label('email','Email:')}}    
                        {{Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'Enter Email','readonly'])}}    
                    </div>
                    <div class="form-group">
                        {{Form::label('reason','Reason:')}}    
                        {{Form::textarea('reason','',['class'=>'form-control','placeholder'=>'Enter Reason','rows'=>'5'])}}    
                    </div>
                    <div class="form-group">
                        {{Form::label('from','From:')}}    
                        {{Form::text('from','',['class'=>'form-control','placeholder'=>'Enter From Location'])}}    
                    </div>
                    <div class="form-group">
                        {{Form::label('to','To:')}}    
                        {{Form::text('to','',['class'=>'form-control','placeholder'=>'Enter To Location'])}}    
                    </div>
                    <div class="form-group">
                        {{Form::label('duration','Duration(in Hours):')}}    
                        {{Form::number('duration','',['class'=>'form-control','placeholder'=>'Enter Number of Hours.'])}}    
                    </div>
                    {{-- @if ($user->no_of_applications==0) --}}
                        <div class="proof">
                            {{Form::label('proof','Id proof:')}} <br>
                            {{Form::file('proof',['class'=>'btn btn-outline-success'])}}
                        </div>
                    {{-- @endif --}}
                    
                    <br>
                    {{Form::submit('Submit',['class'=>'btn btn-outline-success'])}}        
                    {!! Form::close() !!}
            </div>
                         
        </div>
    </div>
@endsection