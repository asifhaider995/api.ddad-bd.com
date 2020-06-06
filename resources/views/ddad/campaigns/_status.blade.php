@switch($status)
    @case('awaiting_for_approval')
        <span class="badge badge-info">Awaiting for approval</span>
    @break
    @case('approved')
        <span class="badge badge-info">Approved</span>
    @break

    @case('rejected')
        <span class="badge badge-danger">Rejected</span>
    @break

    @case('stopped')
        <span class="badge badge-warning">Stopped</span>
    @break

    @case('expired')
        <span class="badge badge-danger">Stopped</span>
    @break
@endswitch
