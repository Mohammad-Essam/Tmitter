@props([
    'hashtags' => \App\Models\Hashtag::withCount('tweets')->orderBy('tweets_count','desc')->orderBy('created_at')->limit(5)->get(),
])
<div class="box-container trends">
    <h3>What's happening</h3>

    @foreach ( $hashtags as $hashtag )
    <div class="trend">
        <div class="trend-location">
            <span>Trending in Egypt</span>
            <span>...</span>
        </div>
        <h4 id="trend"><a href="{{ $hashtag->hashtag }}">{{ $hashtag->hashtag }}</a></h4>
    </div>
    @endforeach



</div>
