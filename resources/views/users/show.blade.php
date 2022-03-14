@extends('layouts.app')

@section('main')

    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body select2 form-select">

            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">User</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-fullname">Name</label>
                    {{ $user->name }}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    {{ $user->email }}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="user-role">User Role</label>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $role)
                            {{ $role }}
                        @endforeach
                    @endif
                </div>
                <a href="{{ url()->previous() }}" type="submit" class="btn btn-primary me-1 data-submit">Back</a>
            </div>
        </div>
    </div>

@stop

@section('vendor_css')
    @include('users.partials.vendor_css')
@endsection

@section('page_vendor_js')
    @include('users.partials.page_vendor_js')
@endsection
