@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
    <!---------- Add>category ------->

            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">New Blog</h3>
                    <div class="card-body">
                        <form action="{{route('store.blogpost')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="title">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Short Description</label>
                                <textarea id="editor1" name="short_desc" class="form-control" rows="5" cols="80">
								This is my textarea to be replaced with CKEditor.
						        </textarea>
                                @error('short_desc')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Post</label>
                                <textarea id="editor2" name="post" class="form-control" rows="10" cols="80">
								Write your blog content here
						        </textarea>
                                @error('post')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        
                    </div>
                </div><!--- end card --->
                

            </div>
    <!---------- End Add>category ------->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Categories</h4>
                        </div>
                        <div class="card-body">
                            <label for="">Select Blog Category</label>
                            @foreach($categories as $cat)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $cat->id }}" name="category_id"
                                 id="defaultCheck{{ $cat->id }}">
                                <label class="form-check-label" for="defaultCheck{{ $cat->id }}">
                                {{ $cat->blog_category }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
    </div>
    <button type="submit" class="btn btn-primary">Post Blog</button>
    </form>
</section>
@endsection