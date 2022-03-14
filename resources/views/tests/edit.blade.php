@extends('layouts.app')

@section('main')

    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body select2 form-select">

        {!! Form::open(array('route' => ['tests.update', $test->id],'method'=>'PUT', 'class' => 'add-new-user modal-content pt-0')) !!}
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-fullname">Name</label>
                    @if(Auth::user()->isAdmin())
                    {!! Form::text('name', $test->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    @else
                        {!! Form::hidden('name', $test->name) !!}
                        {{ $test->name }}
                    @endif
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-email">Date</label>
                    @if(Auth::user()->isAdmin())
                    {!! Form::date('date', $test->date, array('placeholder' => 'Date','class' => 'form-control')) !!}
                    @else
                        {!! Form::hidden('date', $test->date) !!}
                        {{ $test->date }}
                    @endif
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-contact">Location</label>
                    @if(Auth::user()->isAdmin())
                    {!! Form::text('location', $test->location, array('placeholder' => 'Location','class' => 'form-control')) !!}
                    @else
                        {!! Form::hidden('location', $test->location) !!}
                        {{ $test->location }}
                    @endif
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basic-icon-default-company">Grade</label>
                    @if(Auth::user()->isAdmin() || (Auth::user()->isManager() && $test->isModerate()))
                    {!! Form::text('grade', $test->grade, array('placeholder' => 'Grade','class' => 'form-control')) !!}
                    @else
                        {{ $test->grade }} (this test closed for moderate)
                    @endif
                </div>
                <div class="mb-1">
                    <label class="form-label" for="user-role">Manager</label>
                    <select class="form-control select2 form-select" name="user_id">
                        @if(Auth::user()->isAdmin())
                        @foreach($managers as $manager)
                            <option value="{{ $manager->id }}" @if($manager->id === $test->user_id) selected @endif>{{ $manager->name }}</option>
                        @endforeach
                        @else
                            <option value="{{ $test->manager->id }}">{{ $test->manager->name }}</option>
                        @endif
                    </select>
                </div>
                @if(Auth::user()->isAdmin())
                <div class="mb-1">
                    <label class="form-label" for="user-role">Moderate</label>
                    <input type="hidden" name="is_moderate" value="0">
                    <input type="checkbox" name="is_moderate" value="1" {{  ($test->is_moderate == 1 ? ' checked' : '') }}
                </div>
                @endif
                <br>
                <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')}}">
@endsection

@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
@endsection

@section('page_vendor_js')
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/cleave/cleave.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')}}"></script>
@endsection
