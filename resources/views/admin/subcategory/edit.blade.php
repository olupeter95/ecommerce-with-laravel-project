@extends('admin.admin_master')

@section('content')

        <section class="content">
		  <div class="row">
    
    <!---------- Edit category ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit SubCategory</h3>
                    <div class="card-body">
                        <form action="{{ route('update.subcategory',$subcategory->category_id) }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$subcategory->id}}">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control">
                                <option value="" selected="">Select Category</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}" {{$cat->id == $subcategory->category_id ? 'selected' : ' '}}>{{$cat->category_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory_name_en">SubCategory Name En</label>
                                <input type="text" class="form-control" name="subcategory_name_en" value="{{$subcategory->subcategory_name_en}}">
                                @error('subcategory_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory_name_fr">SubCategory Name Fr</label>
                                <input type="text" class="form-control" name="subcategory_name_fr"value= "{{$subcategory->subcategory_name_fr}}">
                                @error('subcategory_name_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update SubCategory</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add category ------->
</div>
</section>
@endsection