@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- @include('layouts.partials.alerts') --}}
            <div class="card">
                <div class="card-header">
                    <h3>{{ $article->title }}</h3> by {{ $article->user->name }}
                    <span class="float-right">{{ $article->created_at->diffForHumans() }}</span>
                </div>

                <div class="card-body">
                    <p>{{ $article->body }}</p>
                </div>
            </div>
            <hr>
            {{-- <div class="card">
                <div class="card-header">Leave a Comment</div>

                <div class="card-body">
                    <form action="{{ route('comment.store', $article) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" id="" cols="30" rows="3" class="form-control" placeholder="Write your response..."></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Comment" class="btn btn-primary float-right">
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <hr>
                    @foreach ($comments as $comment)
                        <div class="card">
                            <div class="card-header">
                                {{ $comment->user->name }}
                                <span class="float-right">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="card-body">{{ $comment->body }}</div>
                        </div>
                        <div class="mb-3"></div>
                    @endforeach

                    {{ $comments->links() }}
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection