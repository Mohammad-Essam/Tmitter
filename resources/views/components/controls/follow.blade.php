@props(
    [
        'id' => null,
    ]
)

@if (auth()->user()->doFollow($id))
<a data-follow="{{(bool)auth()->user()->doFollow($id)}}" onclick="fetch('/users/{{$id}}/followOrUnfollow').then(x =>{
    if(this.dataset.follow)
    {
        this.classList.remove('btn-unfollow');
        this.classList.add('btn-follow');
        this.innerHTML='Follow';
        this.dataset.follow = ''
    }
    else
    {
        this.classList.remove('btn-follow');
        this.classList.add('btn-unfollow');
        this.innerHTML='unfollow';
        this.dataset.follow = '1'
    }

    })"
    class="btn btn-unfollow">Unfollow</a>
@else
<a data-follow="{{(bool)auth()->user()->doFollow($id)}}" onclick="fetch('/users/{{$id}}/followOrUnfollow').then(x =>
{
    if(this.dataset.follow)
    {
        this.classList.remove('btn-follow');
        this.classList.add('btn-unfollow');
        this.innerHTML='unfollow';
        this.dataset.follow = '';
    }
    else
    {
        this.classList.add('btn-unfollow');
        this.classList.remove('btn-follow');
        this.innerHTML='Unfollow';
        this.dataset.follow = '1';
    }
})"
    class="btn btn-follow">Follow</a>

@endif

