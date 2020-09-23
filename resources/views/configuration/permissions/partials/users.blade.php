@foreach($users as $user)
    <div class="role d-flex justify-content-between">
        {{ Str::title($user->full_name) }}{{ '<' . $user->email . '>' }}
        <a href="{{ route('permissions.attach-user',  [$permission->id, 'user_id' => $user->id]) }}" class="btn btn-success btn-sm">Attach</a>
    </div>
@endforeach
