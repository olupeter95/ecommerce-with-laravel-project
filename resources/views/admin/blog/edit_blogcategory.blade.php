@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit Blog Category</h3>
                    <div class="card-body">
                        <form action="{{route('update.blogcategory')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="form-group">
                                <label for="blog_category">Blog Category</label>
                                <input type="text" class="form-control" name="blog_category" value="{{$category->blog_category}}">
                                @error('blog_category')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Blog Category</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>category ------->
</div>
</section>
@endsection