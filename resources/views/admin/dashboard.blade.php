@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            
            <tr>
                {{-- <th>S.no.</th> --}}
            <th>Reason</th>
            <th>Status</th>
            <th>Edit</th>


            </tr>
            @foreach ($posts as $post)
                <tr>
                    {{-- <td>{{}}</td> --}}
                    <td>{{$post->reason}}</td>
                    <th>
                    @if ($post->status=='Approved')
                        <p style="color:green">{{$post->status}}</p>
                    @elseif ($post->status=='Rejected')
                        <p style="color:red">{{$post->status}}</p>
                    @elseif ($post->status=='Pending')
                        <p style="color:yellow">{{$post->status}}</p>
                    @endif
                </th>
                    <td><a href="/edit/{{$post->id}}" class="btn btn-dark">Edit</a></td>
                </tr>
            @endforeach
            
            
        </table>
    </div>
@endsection