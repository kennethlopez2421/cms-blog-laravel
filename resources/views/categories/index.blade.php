@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>

</div>
<div class="card-dafault">
    <div class="card-header text-white" style="background-color:#daa520;">
       <h3><strong>Categories</strong></h3>
    </div>
    <div class="card-body">
      @if ($categories->count() > 0)
      <table class="table table-bordered">
        <thead class="thead-dark">
            <th scope="col"><h4><strong>Name</strong></h4></th>
            <th scope="col"><h4><strong>Post Count</strong></h4></th>
            <th scope="col"><h4><strong>Actions</strong></h4></th>

        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td style="word-wrap: break-word; min-width: 300px; max-width: 200px;">
                  <h4><strong>{{ $category->name }}</strong></h4>
                </td>
                <td>

                  <h4><strong> {{ $category->posts->count() }}</strong></h4>

                </td>

                <td>

                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button>
                </td>

              </tr>

            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">

        <form action="" method="post" id="deleteCategoryForm">
            @csrf
            @method('DELETE')

            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModal">Delete Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <p class="text-center text-bold">
                  Are your sure you want to delete this category?
                </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
              </div>

        </form>
        </div>
      </div>

      @else
      <h3 class="text-center">No Categories yet.</h3>

      @endif
    </div>
</div>


@endsection

@section('scripts')

<script>
function handleDelete(id){

    var form = document.getElementById('deleteCategoryForm')
    form.action = '/categories/' + id

    $('#deleteModal').modal('show')
}
</script>

@endsection
