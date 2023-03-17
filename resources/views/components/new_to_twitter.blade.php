@if (!auth()->user() || auth()->user()->type == 'guest')

<div class="box-container">
    <h3>New to twitter?</h3>
    <div class="register-block">
        {{-- <button class="hover-secondary">Sign up with Google</button> --}}
        <button onclick="document.getElementById('register').style.display='flex'" class="hover-secondary">Create account</button>
        <button onclick="document.getElementById('login').style.display='flex'" class="hover-secondary">Login</button>
    </div>
</div>

@endif
