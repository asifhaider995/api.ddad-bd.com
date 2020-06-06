@switch($status)
    @case('awaiting_for_approval')
        <span class="badge badge-info">Awaiting for approval</span>
    @break
    @case('approved')
        <span class="badge badge-info">Approved</span>
    @break

    @case('ended')
        <span class="badge badge-info">Approved</span>
    @break

    @case('stoped')
        <span class="badge badge-info">Approved</span>
    @break

@endswitch
