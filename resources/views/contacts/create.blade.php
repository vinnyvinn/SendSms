@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Contact

                        <a href="{{ url()->previous() }}" class="btn btn-info"> back </a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('contact')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name')}}" required="true">
                                        <small id="passwordHelpInline" class="text-muted">
                                            individual or group name.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="name">conatct</label>
                                        <textarea name="phone" class="form-control" required="true" rows="4">{{old('phone')}}</textarea>
                                        <small id="passwordHelpInline" class="text-muted">
                                            add multiple phone number, being comma separated(+254712...,+254709..)
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <input type="checkbox" name="type" value="1">
                                        <label for="name"> create as group contact </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-block"> Create</button>
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
