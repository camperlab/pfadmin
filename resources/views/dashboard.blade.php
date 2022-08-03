@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column pt-5">
        <div class="d-flex align-items-center j mb-3">
            <div class="col-1"><a class="btn btn-sm btn-primary" href="">Overview</a></div>
            <div class="col-6">
                <p class="m-0 ms-2 fs-6">
                    List your aliases and mailboxes. You can edit / delete them
                    from here.
                </p>
            </div>
        </div>

        <div class="d-flex align-items-center mb-3">
            <div class="col-1"><a class="btn btn-sm btn-primary" href="">Add Alias</a></div>
            <div class="col-6"><p class="m-0 ms-2 fs-6">Create a new alias for your domain.</p></div>
        </div>

        <div class="d-flex align-items-center mb-3">
            <div class="col-1"><a class="btn btn-sm btn-primary" href="">Add Alias</a></div>
            <div class="col-6"><p class="m-0 ms-2 fs-6">Create a new mailbox for your domain</p></div>
        </div>

        <div class="d-flex align-items-center mb-3">
            <div class="col-1"><a class="btn btn-sm btn-primary" href="">Send Email</a></div>
            <div class="col-6"><p class="m-0 ms-2 fs-6">Send an email to one of your newly created mailboxes.</p></div>
        </div>

        <div class="d-flex align-items-center mb-3">
            <div class="col-1"><a class="btn btn-sm btn-primary" href="">Password</a></div>
            <div class="col-6"><p class="m-0 ms-2 fs-6">Change the password for your admin account.</p></div>
        </div>

        <div class="d-flex align-items-center mb-3">
            <div class="col-1"><a class="btn btn-sm btn-primary" href="">View Log</a></div>
            <div class="col-6"><p class="m-0 ms-2 fs-6">View the log files.</p></div>
        </div>

        <div class="d-flex align-items-center mb-3">
            <div class="col-1"><a class="btn btn-sm btn-primary" href="">Logout</a></div>
            <div class="col-6"><p class="m-0 ms-2 fs-6">Logout from the system.</p></div>
        </div>
    </div>
@endsection
