@extends('layouts.app')

@section('main')

    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body select2 form-select">

            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Test {{ $test->name }}</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-fullname">Name</label>
                    {{ $test->name }}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-email">Date</label>
                    {{ $test->date }}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-contact">Location</label>
                    {{ $test->location }}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-company">Grade</label>
                    {{ $test->grade }}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="user-role">Manager</label>
                    {{ $test->manager->name }}
                </div>
            </div>
        </div>
    </div>

@stop

@section('vendor_css')
    @include('tests.partials.vendor_css')
@endsection

@section('page_vendor_js')
    @include('tests.partials.page_vendor_js')
@endsection
