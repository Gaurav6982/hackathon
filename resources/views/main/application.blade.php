@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Here you Can Manage Your Applications.</h3>
        @if ($user->no_of_applications==0)
            NO Applications Found. <br>
            <a href="/apply" class="btn btn-outline-success">Click Here TO Apply</a>
        @else
            <table style="width:100%">
                <tr>
                    <th style="text-align:center">To</th>
                    <th style="text-align:center">status</th>
                    {{-- <th style="text-align:center">EDIT</th> --}}
                </tr>
               <tr>
                   <td><hr></td>
                   <td><hr></td>
                   {{-- <td><hr></td> --}}
               </tr>
                @foreach ($user->applications as $application)
                    <tr>
                        <th style="text-align:center">{{$application->to}}</th>
                        <th style="text-align:center">
                            @if ($application->status=='Pending')
                                <p style="color:yellow" class="well">{{$application->status}}</p>  
                            @elseif ($application->status=='Rejected')
                            <p style="color:red" class="well">{{$application->status}}</p> 
                            @elseif ($application->status=='Approved')
                            <p style="color:green" class="well">{{$application->status}}</p> 
                            @endif    
                            
                        
                        </th>
                        {{-- <th style="text-align:center"><a href="" class="btn btn-danger">DELETE</a></th> --}}
                    </tr>
                @endforeach
            </table>
        @endif
        
    </div>
    
@endsection