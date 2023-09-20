@extends('layouts.app')
@section('content')
<div class="container" style="max-width: 600px">
    <form method="post">
        @csrf
        {{-- <input type="hidden" name="article_id" value="{{ $edit->id }}"> --}}
        <div class="mb-2">
            <input type="text" name="title" value="{{ $edit->title }} " class="form-control">
        </div>
        <div class="mb-2">
            <textarea name="body" class="form-control">{{ $edit->body }}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Edit Post">
    </form>
</div>
@endsection
