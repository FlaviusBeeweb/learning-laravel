<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="#" class="navbar-brand">Blog</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/articles">Articles</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}</li>
        </ul>
    </div>
</nav>