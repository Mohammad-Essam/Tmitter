<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf" content="{{ csrf_token() }}">
    <title>Tmitter</title>
    <link rel="stylesheet" href="/css/variables.css">
    <link rel="stylesheet" href="/css/classes.css">
    <link rel="stylesheet" href="/css/overide.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/feeds.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/tweet.css">
    <link rel="stylesheet" href="/css/register.css">

    <script src="/scripts/expandTextArea.js" defer></script>
    <script src="/scripts/like.js" defer></script>
    <script src="/scripts/tweet.js" defer></script>
    <script src="/scripts/follow.js"></script>

</head>

<body >
    <x-header />

    <main class="feeds">
            <h3 class="banner">
                Home
            </h3>

            @if (request()->is('/'))
                <x-create-tweet :user="auth()->user()"/>
            @endif


            <div class="tweets" id="tweets">
                @foreach ($tweets as $tweet )
                <x-tweet :tweet="$tweet" />
                @endforeach
            </div>
    </main>

    <footer class="m1002-hide">
        <aside class="footer-content">
            <div class="search-banner">
                <div class="search-input">
                    <input id="search" type="text" placeholder="Search Twitter">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><g><path d="M10.25 3.75c-3.59 0-6.5 2.91-6.5 6.5s2.91 6.5 6.5 6.5c1.795 0 3.419-.726 4.596-1.904 1.178-1.177 1.904-2.801 1.904-4.596 0-3.59-2.91-6.5-6.5-6.5zm-8.5 6.5c0-4.694 3.806-8.5 8.5-8.5s8.5 3.806 8.5 8.5c0 1.986-.682 3.815-1.824 5.262l4.781 4.781-1.414 1.414-4.781-4.781c-1.447 1.142-3.276 1.824-5.262 1.824-4.694 0-8.5-3.806-8.5-8.5z"></path></g></svg>
                </div>
            </div>

            {{-- Login or Register --}}
            <x-new_to_twitter />

            {{-- Hashtags --}}
            <x-trending />


            {{-- follow suggestion --}}
            <x-follow-suggestion />

        </aside>
    </footer>


     <x-controls.modal id="register">
        @include('partials.authentication._register')
     </x-controls.modal>

     <x-controls.modal id="login">
        @include('partials.authentication._login')
     </x-controls.modal>

     {{-- Errors messages: show them if any happened in login or register --}}
     @if ((bool)$errors->login->all())
        <script >
            document.getElementById("login").style.display = 'flex'
        </script>
        @elseif ($errors->any())
        <script >
            document.getElementById("register").style.display = 'flex'
        </script>
     @endif

    </body>
</html>
