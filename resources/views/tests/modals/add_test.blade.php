<div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
    <div class="modal-dialog">
        {!! Form::open(array('route' => 'tests.store','method'=>'POST', 'class' => 'add-new-user modal-content pt-0')) !!}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-fullname">Name</label>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-email">Date</label>
                {!! Form::date('date', null, array('placeholder' => 'Date','class' => 'form-control')) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-contact">Location</label>
                {!! Form::text('location', null, array('placeholder' => 'Location','class' => 'form-control')) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-company">Grade</label>
                {!! Form::text('grade', null, array('placeholder' => 'Grade','class' => 'form-control')) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="user-role">Manager</label>
                <select class="form-control select2 form-select" name="user_id">
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-1">
                <label class="form-label" for="user-role">Moderate</label>
                {!! Form::hidden('is_moderate', 0) !!}
                {!! Form::checkbox('is_moderate', 1) !!}
            </div>
            <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
