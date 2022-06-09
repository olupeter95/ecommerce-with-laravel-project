@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <section class="content">
		  <div class="row">
    
    <!---------- Edit category ------->

            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Edit Sub SubCategory</h3>
                    <div class="card-body">
                        <form action="{{ route('update.subsubcategory') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$subsubcategory->id}}">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control">
                                <option value="" selected="">Select Category</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}" 
                                    {{$cat->id == $subsubcategory->category_id ? 'selected' : ' '}}>{{$cat->category_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory">Sub Category</label>
                                <select name="subcategory_id" class="form-control">
                                @foreach($subcategory as $subcat)
                                    <option value="{{$subcat->id}}" 
                                    {{$subcat->id == $subsubcategory->category_id ? 'selected' : ' '}}>
                                    {{$subcat->subcategory_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory_name_en">SUb SubCategory Name En</label>
                                <input type="text" class="form-control" name="subsubcategory_name_en"
                                 value="{{$subsubcategory->subsubcategory_name_en}}">
                                @error('subsubcategory_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subsubcategory_name_fr">Sub SubCategory Name Fr</label>
                                <input type="text" class="form-control" name="subsubcategory_name_fr" 
                                value= "{{$subsubcategory->subsubcategory_name_fr}}">
                                @error('subsubcategory_name_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Sub SubCategory</button>
                        </form>
                    </div>
                </div><!--- end card --->

            </div>
    <!---------- End Add category ------->
</div>
@endsection