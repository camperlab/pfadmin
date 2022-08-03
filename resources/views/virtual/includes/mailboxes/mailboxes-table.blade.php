@php
    use Carbon\Carbon;
@endphp
<div class="card">
    <div class="card-header">
        <p class="m-0 fs-5">Mailboxes</p>
    </div>
    <div class="card-body">
        @if ($mailboxes->count())
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Email</th>
                    <th scope="col">To</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Active</th>
                    <th scope="col">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mailboxes as $key => $mailbox)
                    <tr>
                        <td>COLOR</td>
                        <td>{{ $mailbox->username . '@' . $mailbox->domain }}</td>
                        <td>Mailbox</td>
                        <td>{{ $mailbox->name != '' ? $mailbox->name : '(not set)' }}</td>
                        <td>{{ $mailbox->active ? 'Yes' : 'No' }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary">Alias</button>
                            <button class="btn btn-sm btn-primary">Edit</button>

                            <button
                                class="btn btn-sm btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $key }}"
                            >Delete</button>

                            @include('virtual.includes.mailboxes.delete-modal')
                        </td>
                        <td>{{ Carbon::parse($mailbox->modified)->toDateString() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="mb-0 fs-5 text-center">There is no mailboxes yet.</p>
        @endif
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <div class="btn-group">
                <a href="{{ route('mailboxes.create') }}" class="btn btn-sm btn-outline-secondary">Add Mailbox</a>
                <button class="btn btn-sm btn-outline-secondary">Export CSV</button>
            </div>
        </div>
    </div>
</div>
