@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>MANAGE THE APPLICATION.</h1>
        <form action="/update/{{$post->id}}" method="post">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            {{-- <div class="form-group">
                <label for="id">Id:</label>
                <input type="number" name="id" value="{{$post->id}}" readonly class="form-control">
            </div> --}}
            <div class="form-group">
                <label for="reason">Reason:</label>
                <input type="text" name="reason" value="{{$post->reason}}" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="number" name="duration" value="{{$post->duration}}" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="Option">Option</label>
                <select name="Option" class="form-control">
                    <option value="Approved">Approve</option>
                    <option value="Rejected">Reject</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-outline-success">
        </form>
    </div>
@endsection