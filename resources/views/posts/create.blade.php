@extends('layouts.app')

@section('content')

<div class="card card-default">

<div class="card-header"> 
<h4><strong>
{{ isset($post) ? 'Edit Post' : 'Create Post' }}
</strong></h4>  
</div>

<div class="card-body">
    @include('partials.errors')
    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @if (isset($post))

        @method('PUT')
            
        @endif

        <div class="form-group">
            <label for="title"><h5><strong>Title</strong></h5></label>
            <input type="text" class="form-control" name="title" id="title" value="{{ isset($post) ? $post->title : '' }}">
        </div>
        
        <div class="form-group">
            <label for="description"><h5><strong>Description</strong></h5></label>

            <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="content"><h5><strong>Content</strong></h5></label>

            
            <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
            <trix-editor input="content"></trix-editor>

        </div>
        <div class="form-group">
            <label for="published_at"><h5><strong>Published At</strong></h5></label>
            <input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
        </div>
        @if (isset($post))
        <div class="form-group">
            <img src="\storage\{{ $post->image }}" alt="" style="width: 100%">
        </div>
            
        @endif
        <div class="form-group">
            <label for="image"><h5><strong>Image</strong></h5></label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
            @foreach ($categories as $category )

            <option value="{{ $category->id }}"
                @if (isset($post))
                     @if ($category->id === $post->category_id )

                selected
                    
                @endif
                    
                @endif
                >
            {{ $category->name }}
            </option>
                
            @endforeach
            </select>
            
            </div>
            @if ($tags->count() > 0)
            <div class="form-group">
            <label for="tags">Tags</label>
               
                <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                    @foreach ($tags as $tag)
                     <option value="{{ $tag->id }}"
                        
                       @if (isset($post))

                       @if ($post->hasTag($tag->id))
                       selected
                       
                       @endif
                           
                       @endif
                        >
                    
                    {{ $tag->name }}
                    </option>
                        
                    @endforeach
                </select>
                    
                @endif
            </div>


        <div class="form-group">
           <button type="submit" class="btn btn-success" value="">
            {{ isset($post) ? 'Update Post' : 'Create Post' }}
           </button>
        </div>

    
    </form>
</div>
</div>
    
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    flatpickr('#published_at', {
        enableTime: true
    })

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
    $('.tags-selector').select2();
});
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection