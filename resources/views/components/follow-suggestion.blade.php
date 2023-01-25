@props(
    [
        'users' => \App\Models\User::inRandomOrder()->limit(2)->get(),
    ]
)
<div class="suggestions box-container">
    <h3>who to follow</h3>

    @foreach ($users as $user )

    <div class="suggestion">
        <img src="/{{ $user->avatar }}" alt="avatar" class="avatar">
        <div class="profile">
            <h4 class="name"><a href="/users/{{ $user->profile_id }}">{{ $user->name }}</a></h4>
            <div class="id muted info">{{ $user->profile_id }}</div>
        </div>
        <button><h4>Follow</h4></button>
    </div>
    @endforeach
</div>
