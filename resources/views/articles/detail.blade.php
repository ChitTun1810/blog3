@extends("layouts.app")

@section("content")
    <div class="container" style="max-width: 800px">
        @if(session("info"))
            <div class="alert alert-info">
                {{ session("info") }}
            </div>
        @endif

        <div class="card mb-2 border-primary" style="font-size: 1.3em">
            <div class="card-body">
                <h3 class="card-title">{{ $article->title }} <a href="{{ url("/articles/edit/$article->id") }}" class="h6 text-muted float-end">Edit</a> </h3>
                <div class="text-muted" style="font-size: 0.8em">
                    <b class="text-success">{{ $article->user->name }}</b>,
                    Category: <b>{{ $article->category->name }}</b>,
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <div>
                    {{ $article->body }}
                </div>
                <div class="mt-2">
                    @auth
                        @can('delete-article', $article)
                            <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-danger btn-sm">
                            Delete</a>
                        @endcan
                    @endauth
                </div>
                <ul class="list-group mt-3">
                    <li class="list-group-item active">
                        Comments ({{ count($article->comments) }})
                    </li>
                    @foreach ($article->comments as $comment)
                        <li class="list-group-item">
                            @auth
                                @can('delete-comment', $comment)
                                <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end"></a>
                                @endcan
                            @endauth
                            <b class="text-success">{{ $article->user->name }}</b>:
                            {{ $comment->content }}
                        </li>
                    @endforeach

                    @auth
                        <form action="{{ url("comments/add")}}" method="post" class="mt-2">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <textarea class="form-control mb-2" name="content"></textarea>
                            <button class="btn btn-secondary">Add Comment</button>
                        </form>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
@endsection
