@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">Sent Messages
                        <a href="{{ url('export') }}" class="btn btn-info btn-sm"> export </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped datatables">
                            <thead>
                            <th>#</th>
                            <th>Recepient</th>
                            <th>Message</th>
                            <th>Message ID</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @php($count =1)
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{ $count ++ }}</td>
                                    <td>{{ $message->contact}}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->message_id }}</td>
                                    <td>{{ $message->status }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">  select from templates </div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('sms') }}">
                                    @csrf
                                    <input type="hidden" name="select" value="1">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <label>Select  recepient</label>
                                            <select class="form-control" name="recepient">
                                                <option></option>
                                                @foreach($recipients as $recepient )
                                                    <option value="{{ $recepient->id}}">
                                                        {{ $recepient->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-10 col-md-offset-1">
                                            <label>Select  Template</label>
                                            <select class="form-control" name="message">
                                                <option></option>
                                                @foreach($messagetemplates as $message )
                                                    <option value="{{ $message->id}}">
                                                        {{ $message->message}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-success btn-block"> Send </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Send Custom sms
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('sms') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label for="recepient">Recepient</label>
                                                <input type="text" name="recepient" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea name="message" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-sm  btn-block"> Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
