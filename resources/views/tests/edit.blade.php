@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Test</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tests.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tests.update',$test->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    @if(Auth::user()->isAdmin())
                        <input type="text" name="name" value="{{ $test->name }}" class="form-control"
                               placeholder="Name">
                    @else
                        <input type="hidden" name="name" value="{{ $test->name }}" class="form-control"
                               placeholder="Name">
                        {{ $test->name }}
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    @if(Auth::user()->isAdmin())
                        <input type="text" name="date" value="{{ $test->date }}" class="form-control"
                               placeholder="Date">
                    @else
                        <input type="hidden" name="date" value="{{ $test->date }}" class="form-control"
                               placeholder="Date">
                        {{ $test->date }}
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location:</strong>
                    @if(Auth::user()->isAdmin())
                        <input type="text" name="location" value="{{ $test->location }}" class="form-control"
                               placeholder="Location">
                    @else
                        <input type="hidden" name="location" value="{{ $test->location }}" class="form-control"
                               placeholder="Location">
                        {{ $test->location }}
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Grade:</strong>
                    @if(Auth::user()->isAdmin() || (Auth::user()->isManager() && $test->isModerate()))
                        <input type="number" name="grade" value="{{ $test->grade }}" class="form-control"
                               placeholder="Grade">
                    @else
                        {{ $test->grade }} (this test closed for moderate)
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Manager:</strong>

                    <select class="form-control" name="user_id">
                        @if(Auth::user()->isAdmin())
                            @foreach($managers as $manager)
                                <option value="{{ $manager->id }}"
                                        @if($manager->id === $test->user_id) selected @endif>{{ $manager->name }}</option>
                            @endforeach
                        @else
                            <option value="{{ $test->manager->id }}">{{ $test->manager->name }}</option>
                        @endif

                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                @if(Auth::user()->isAdmin())
                    <strong>Moderate:</strong>
                    <input type="hidden" name="is_moderate" value="0">
                    <input type="checkbox" value="1" name="is_moderate" @if($test->isModerate()) checked @endif ">
                @endif
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection
