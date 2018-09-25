@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Message template

                        <a href="{{ url()->previous() }}" class="btn btn-info"> back </a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('message-template')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" required="true">
                                        <small id="passwordHelpInline" class="text-muted">
                                            Template name.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="name">Message Body</label>
                                        <textarea name="message" class="form-control" required="true"></textarea>
                                        <small id="passwordHelpInline" class="text-muted">
                                            message body
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-block"> Create Message Template</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
