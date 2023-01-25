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
    <link rel="stylesheet" href="/css/profile.css">
    <script src="/scripts/like.js"></script>
</head>
<body>

    <x-header />

    <main class="feeds">
            <h3 class="banner profile-banner">
                <svg viewBox="0 0 24 24" aria-hidden="true" ><g><path d="M7.414 13l5.043 5.04-1.414 1.42L3.586 12l7.457-7.46 1.414 1.42L7.414 11H21v2H7.414z"></path></g></svg>
                <div class="profile-name">
                    <h3>dude</h3>
                    <span class="muted">tweets_number</span>
                </div>
            </h3>

            <x-profile-header :user="$user" />

            <div class="tweets" id="tweets">
                @foreach ($user->tweets as $tweet )
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

            <div class="suggestions box-container">
                <h3>You may like</h3>

                <div class="suggestion">
                    <img src="data:image/jpeg;base64,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" alt="avatar" class="avatar">
                    <div class="profile">
                        <h4 class="name"><a href="TheOwner.html">TheOwner</a></h4>
                        <div class="id muted info">@owner1</div>
                    </div>
                    <button><h4>Follow</h4></button>
                </div>
            </div>


            <div class="box-container trends">
                <h3>What's happening</h3>
                <div class="trend">
                    <div class="trend-location">
                        <span>Trending in Egypt</span>
                        <span>...</span>
                    </div>
                    <h4 id="trend">ChatGBT</h4>
                </div>

                <div class="trend">
                    <div class="trend-location">
                        <span>Trending in Egypt</span>
                        <span>...</span>
                    </div>
                    <h4 id="trend">تريند_عادي</h4>
                </div>
            </div>




        </aside>
    </footer>

</body>
</html>
