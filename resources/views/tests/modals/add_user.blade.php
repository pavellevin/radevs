<div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
    <div class="modal-dialog">
        {!! Form::open(array('route' => 'users.store','method'=>'POST', 'class' => 'add-new-user modal-content pt-0')) !!}
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
                <label class="form-label" for="basic-icon-default-email">Email</label>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
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
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
