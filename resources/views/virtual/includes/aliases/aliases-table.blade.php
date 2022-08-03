@php
    use Carbon\Carbon;
@endphp
<div class="card mb-4">
    <div class="card-header">
        <p class="m-0 fs-5">Aliases</p>
    </div>
    <div class="card-body">
        @if ($aliases->count())
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Alias</th>
                    <th scope="col">To</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Active</th>
                    <th scope="col">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($aliases as $alias)
                    <tr>
                        <td>COLOR</td>
                        <td>{{ $alias->address }}</td>
                        <td>{{ substr($alias->goto, 0, 20) }}</td>
                        <td>{{ $alias->active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a
                                href="{{ route('alias-domain.edit', ['alias_domain' => $alias->target_domain]) }}"
                                class="btn btn-sm btn-primary"
                            >Edit</a>

                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                        <td>{{ Carbon::parse($alias->modified)->toDateString() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="mb-0 fs-5 text-center">There is no aliases yet.</p>
        @endif
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <div class="btn-group">
                <a href="{{ route('aliases.create') }}" class="btn btn-sm btn-outline-secondary">Add Alias</a>
                <button class="btn btn-sm btn-outline-secondary">Export CSV</button>
            </div>
        </div>
    </div>
</div>
