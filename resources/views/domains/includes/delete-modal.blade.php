<div
    class="modal fade"
    id="deleteModal{{ $key }}"
    tabindex="-1"
    aria-labelledby="modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Delete Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="m-0 fs-5">Are you sure that you want to delete this admin?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form method="post" action="{{ route('domains.delete') }}">
                    @csrf
                    <input type="hidden" name="domain" value="{{ $domain->domain }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
