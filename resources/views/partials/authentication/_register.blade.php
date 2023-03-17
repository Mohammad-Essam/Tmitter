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
    .upload-btn:hover *
    {
        cursor: pointer;
    }
    .upload-btn:hover .btn
    {
        background-color: var(--hover-primary);

    }

</style>

<form class="register" action="/register" method="post" enctype="multipart/form-data">

        @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    @csrf
    <div class="avatar">
        <img class="avatar-placeholder" alt="avatar"  id="placeholder">
    </div>

    <div style="position: relative" class="upload-btn">
        <input style=" position: absolute;left:0;right:0;top:0;bottom:0; opacity:0 ;" type="file" name="avatar" id="avatar" onchange="document.getElementById('placeholder').src = window.URL.createObjectURL(this.files[0]);">
        <div class="btn btn-primary hover-secondary">Upload</div>
    </div>

    <input placeholder="name" type="text" name="name" id="name">
    <input placeholder="email" type="email" name="email" id="email">
    <input placeholder="password" type="password" name="password" id="password">
    <input placeholder="confirm password" type="password" name="password_confirmation" id="confirmpassword">
    <input type="submit" value="Register" class="btn btn-primary">
</form>
