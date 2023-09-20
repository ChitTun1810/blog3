@extends("layouts.app")

@section("content")
    <div class="container" style="max-width: 800px">

        {{ $articles->links() }}

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @foreach ($articles as $article)
        <div class="card mb-2">
            <div class="card-body">
                <h3 class="h4 card-title">{{ $article->title }}</h3>
                <div class="text-muted" style="font-size: 0.8em">
                    <b class="text-success">{{ $article->user->name }}</b>,
                    Category: <b>{{ $article->category->name }}</b>,
                    {{ $article->created_at->diffForHumans() }},
                    Comments <b>({{ count($article->comments) }})</b>
                </div>
                <div>
                    {{ $article->body }}
                </div>
                <div class="mt-2">
                    <a href="{{ url("/articles/detail/$article->id") }}">
                        View Detail &raquo;
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
