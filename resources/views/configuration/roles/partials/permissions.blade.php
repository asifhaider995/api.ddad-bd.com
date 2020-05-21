@foreach($permissions as $permission)
    <div class="role d-flex justify-content-between">
        {{ Str::title($permission->name) }}
        <a href="{{ route('roles.attach-permission',  [$role->id, 'permission_id' => $permission->id]) }}" class="btn btn-success btn-sm">Attach</a></span>
    </div>
@endforeach
