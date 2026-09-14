<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
     @foreach ($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            @if ($post -> published)
                <span>published</span>
            @else
                <span>not published</span>
            @endif
        </div>
    @endforeach

    @datetime($post->created_at)
</div>
