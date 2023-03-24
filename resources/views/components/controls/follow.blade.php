@props(
    [
        'id' => null,
    ]
)

{{-- <script>

    let toggle = document.getElementById('follow-button');
    let followBtn = <a onclick="fetch('/users/{{$id}}/unfollow').then(x=>{
        toggle.innerHTML = unfollowBtn
    })" class="btn btn-secondary btn-follow" >follow</a>
    let unfollowBtn =<a onclick="fetch('/users/{{$id}}/unfollow').then(x=>{
        toggle.innerHTML = followBtn
    })" class="btn hover-light btn-unfollow">Unfollow</a>

</script>


<span id="follow-button">
@if (auth()->user()->doFollow($id))

@else

@endif

</span> --}}

@if (auth()->user()->doFollow($id))
<a onclick="fetch('/users/{{$id}}/unfollow').then(x =>{
    console.log(x.text())
    this.classList.remove('btn-unfollow');
    this.classList.add('btn-follow');
    this.innerHTML='Follow';
    })"
    class="btn btn-unfollow">Unfollow</a>
@else
<a onclick="fetch('/users/{{$id}}/follow').then(x =>
{
    this.classList.remove('btn-follow');
    this.classList.add('btn-unfollow');
    this.innerHTML='unfollow';
    })"
    class="btn btn-follow">Follow</a>

@endif

