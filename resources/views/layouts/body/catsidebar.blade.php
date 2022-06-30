<div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
        <nav class="yamm megamenu-horizontal">
          <ul class="nav">
  @php
    $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
  @endphp
  @foreach($categories as $cat)
            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon {{$cat->category_icon}}" aria-hidden="true"></i>
              @if(session()->get('language')=='french')
                {{$cat->category_name_fr}}
              @else
                {{$cat->category_name_en}}
              @endif  
            </a>
              <ul class="dropdown-menu mega-menu">
                <li class="yamm-content">
                  <div class="row">
            @php
            $subcategories = App\Models\SubCategory::Where('category_id',$cat->id)->orderBy('subcategory_name_en','ASC')->get();
            @endphp
            @foreach($subcategories as $subcat)
                    <div class="col-sm-12 col-md-3">
                    <h2 class="title">
                        @if(session()->get('language') == 'french')
                        {{$subcat->subcategory_name_fr}}
                        @else
                        {{$subcat->subcategory_name_en}}
                        @endif
                    </h2>
              @php
            $subsubcategories = App\Models\SubSubCategory::Where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
            @endphp
            @foreach($subsubcategories as $subsubcat)
                      <ul class="links list-unstyled">
                        <li><a href="#">
                          @if(session()->get('language') == 'french')
                          {{$subsubcat->subsubcategory_name_fr}}
                          @else
                          {{$subsubcat->subsubcategory_name_en}}
                          @endif
                        </a></li>
                      </ul>
                      @endforeach
                    </div>
                    @endforeach
                    <!-- /.col -->
                    <!-- /.col --> 
                  </div>
                  <!-- /.row --> 
                </li>
                <!-- /.yamm-content -->
              </ul>
              <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->
            

            <!-- /.menu-item -->
          
            @endforeach
          </ul>
          
          <!-- /.nav --> 
        </nav>
        <!-- /.megamenu-horizontal --> 
      </div>
      <!-- /.side-menu -->