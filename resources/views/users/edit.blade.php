@extends('layouts.app')

@section('main')

    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body select2 form-select">

            {!! Form::open(array('route' => ['users.update', $user->id],'method'=>'PUT', 'class' => 'add-new-user pt-0')) !!}
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-fullname">Name</label>
                    {!! Form::text('name', $user->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    {!! Form::text('email', $user->email, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-contact">Password</label>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-company">Confirm Password</label>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="user-role">User Role</label>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control select2 form-select')) !!}
                </div>
                <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('vendor_css')
    @include('users.partials.vendor_css')
@endsection

@section('page_vendor_js')
    @include('users.partials.page_vendor_js')
@endsection
