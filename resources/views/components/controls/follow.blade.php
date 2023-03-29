@props(
    [
        'id' => null,
    ]
)

<a
data-follow="{{(bool)auth()->user()->doFollow($id)}}"
class="{{(bool)auth()->user()->doFollow($id)?'btn btn-unfollow':'btn btn-follow'}}"
onclick="renderFollowButton(this);fetch('/users/{{$id}}/followOrUnfollow')"
>
{{(bool)auth()->user()->doFollow($id)?"Unfollow":"Follow"}}
</a>
