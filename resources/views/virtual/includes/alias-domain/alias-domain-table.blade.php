@php
    use Carbon\Carbon;
@endphp

<div class="card mb-4">
    <div class="card-header">
        <p class="m-0 fs-5">Alias Domains</p>
    </div>
    <div class="card-body">
        @if ($aliasDomains->count())
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th scope="col">Alias Domain</th>
                    <th scope="col">Target Domain</th>
                    <th scope="col">Last modified</th>
                    <th scope="col">Active</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($aliasDomains as $aliasDomain)
                    <tr>
                        <td>{{ $aliasDomain->alias_domain }}</td>
                        <td>{{ $aliasDomain->target_domain }}</td>
                        <td>{{ Carbon::parse($aliasDomain->modified)->toDateString() }}</td>
                        <td>{{ $aliasDomain->active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a
                                href="{{ route('alias-domain.edit', ['alias_domain' => $aliasDomain->target_domain]) }}"
                                class="btn btn-sm btn-primary"
                            >Edit</a>

                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="mb-0 fs-5 text-center">There is no alias domains yet.</p>
        @endif
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <div class="btn-group">
                <a href="{{ route('alias-domain.create') }}" class="btn btn-sm btn-outline-secondary">Add Alias
                    Domain</a>
                <button class="btn btn-sm btn-outline-secondary">Export CSV</button>
            </div>
        </div>
    </div>
</div>
