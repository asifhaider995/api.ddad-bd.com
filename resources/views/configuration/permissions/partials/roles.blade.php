@foreach($roles as $role)
    <div class="role d-flex justify-content-between">
        {{ Str::title($role->name) }}
        <a href="{{ route('permissions.attach-role',  [$permission->id, 'role_id' => $role->id]) }}" class="btn btn-success btn-sm">Attach</a></span>
    </div>
@endforeach
