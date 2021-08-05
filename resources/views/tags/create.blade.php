@extends('layouts.app')

@section('content')

<div class="card card-dafualt">
    <div class="card-header">
        <h3><strong> {{ isset($tag)? 'Edit tag' : 'Create tag'}}</strong></h3>
    
    </div>

    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}" method="post">
            @csrf
            @if(isset($tag))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ isset($tag) ? $tag->name : '' }}">
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($tag) ? 'Update Categrory' : 'Add tag' }}
                </button>

            </div>
        </form>
    </div>

</div>


@endsection