@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
    
    <!---------- Add category ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit Category</h3>
                    <div class="card-body">
                        <form action="{{ route('update.category',$category->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="form-group">
                                <label for="category_name_en">Category Name En</label>
                                <input type="text" class="form-control" name="category_name_en" value="{{$category->category_name_en}}">
                                @error('category_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name_fr">Category Name Fr</label>
                                <input type="text" class="form-control" name="category_name_fr"value= "{{$category->category_name_fr}}">
                                @error('category_name_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_icon">Category Icon</label>
                                <input type="text" class="form-control" name="category_icon"value= "{{$category->category_icon}}">
                                @error('category_icon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add category ------->
</div>
</section>
@endsection