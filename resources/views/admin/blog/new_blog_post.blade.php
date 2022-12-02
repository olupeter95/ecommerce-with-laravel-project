@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
    <!---------- Add>category ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Add Blog</h3>
                    <div class="card-body">
                        <form action="{{route('store.blogpost')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control">
                                    <option>Select Blog Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->blog_category }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="author_id">Author</label>
                                <input type="text" class="form-control" name="author_id" id="" value="{{ $admin->name }}" disabled>
                                @error('author_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_icon">Title</label>
                                <input type="text" class="form-control" name="title">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Short Description</label>
                                <textarea id="editor2" name="short_desc" class="form-control" rows="10" cols="80">
								This is my textarea to be replaced with CKEditor.
						        </textarea>
                                @error('short_desc')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Post</label>
                                <textarea id="editor2" name="post" class="form-control" rows="10" cols="80">
								This is my textarea to be replaced with CKEditor.
						        </textarea>
                                @error('post')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Post Blog</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add>category ------->
</div>
</section>
@endsection