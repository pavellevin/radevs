@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tests</h2>
            </div>
            <div class="pull-right">
                @can('test-create')
                    <a class="btn btn-success" href="{{ route('tests.create') }}"> Create New Test</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Location</th>
            <th>Grade</th>
            <th>Criterion</th>
            <th>Manager</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tests as $test)
            <tr>
                <td>{{ $test->name }}</td>
                <td>{{ $test->date }}</td>
                <td>{{ $test->location }}</td>
                <td>{{ $test->grade }}</td>
                <td>{{ $test->criterion }}</td>
                <td>{{ $test->manager->name }}</td>
                <td>
                    <form action="{{ route('tests.destroy',$test->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('tests.show',$test->id) }}">Show</a>
                        @can('test-edit')
                            <a class="btn btn-primary" href="{{ route('tests.edit',$test->id) }}">Edit</a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('test-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $tests->links() !!}

@endsection
