@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.partials._alerts')
            @if ($articles->count() === 0)
            <div class="card">
                <div class="card-body">
                    <P>No Article Published yet</P>
                </div>
            </div>
            @else
                @foreach ($articles as $article)
                <div class="card">
                    <div class="card-header">
                        {{-- <h3>{{ $article->title }}</h3> by {{ $article->user->name }} --}}
                        <h3><a href="{{ route('article.show', $article) }}">{{ $article->title }}</a>
                        </h3> by {{ $article->user->name }}
                        <span class="float-right">{{ $article->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="card-body">
                        <p>{{ str_limit($article->body, 100) }}</p>
                        <hr>

                        <div class="float-right">
                            <a href="{{ route('article.edit', $article) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form class="" action="{{ route('article.destroy', $article) }}" method="post">
                                @csrf
                                @method("DELETE")

                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mb-3"></div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection