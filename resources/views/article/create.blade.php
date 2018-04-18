@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a New Article</div>

                <div class="card-body">
                    <form action="{{ route('article.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="" class="label">Title</label>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Your title here..." value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="" class="label">Body</label>
                            <textarea name="body" id="" cols="30" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Your article body here...">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <span class="invalid-feedback">{{ $errors->first('body') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Post" class="btn btn-primary">
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection