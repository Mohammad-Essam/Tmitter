<style>
    form.register
    {
        display:flex;
        flex-direction: column;
        padding: 22px;

        align-items: center;
        padding:16px;
        gap: 6px;
    }
    .register input
    {
        padding:16px;
        width: 80%;
        font-size: 17px;
    }
    .register .btn

    {
        padding: 8px 16px;
    }
    .avatar-placeholder
    {
        border-radius:999px;display:flex;justify-content:center;align-items: center;width:100px;height:100px;background-color: lightgray
    }

</style>


<form class="register" action="/login" method="post">

        @if ($errors->login->all())
        <div style="color:red">
            <ul>
                @foreach ($errors->login->all() as $key => $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    @csrf
    <input placeholder="email" type="email" name="login_email" id="email">
    <input placeholder="password" type="password" name="login_password" id="password">
    <input type="submit" value="login" class="btn btn-primary">
</form>
