@props(['users'])
<div class="suggestions box-container">
    <h3>who to follow</h3>

    @foreach ($users as $user )

    <div class="suggestion">
        <img src="/{{ $user->avatar }}" alt="avatar" class="avatar">
        <div class="profile">
            <h4 class="name"><a href="/users/{{ $user->profile_id }}">{{ $user->name }}</a></h4>
            <div class="id muted info">{{ $user->profile_id }}</div>
        </div>
        <h4 style="display:flex; align-items:center"><x-controls.follow :id="$user->id" /></h4>
    </div>
    @endforeach
</div>
