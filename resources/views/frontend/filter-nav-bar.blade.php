<div class="col-sm-3 collection-filter category-page-side">
    <!-- side-bar colleps block stat -->
    <div class="collection-filter-block creative-card creative-inner category-side">
      <!-- Categories filter start -->
      <form method="get" action="{{route('filter.list')}}" id="filters-form">
      <div class="collection-mobile-back"> 
        <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> @lang('home.back')</span></div>

        <div class="collection-collapse-block open">
          <h3 class="collapse-block-title mt-0">@lang('home.Categories')</h3>
          <div class="collection-collapse-block-content">
            <div class="collection-brand-filter">
              @foreach($Categories as $Category)
              <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                <a href="{{route('filter.list')}}?Category%5B%5D={{$Category->id}}">
                <input type="checkbox" class="custom-control-input form-check-input" onclick="filter({{$Category->id}})" name="Category[]" value="{{$Category->id}}">
                <label class="custom-control-label form-check-label" for="{{$Category->name}}">
                  {{App::getLocale() == 'en' ? $Category->name : $Category->name_locale }}
                   </label>
              </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <hr/>

         <!-- Sub Categories start here -->
      <div class="collection-collapse-block open">
        <h3 class="collapse-block-title mt-0">@lang('home.Sub Categories')</h3>
        <div class="collection-collapse-block-content">
          <div class="collection-brand-filter">
            @foreach($subCategoriesfilter as $subCategories)
            <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
              <input type="checkbox" class="custom-control-input form-check-input" name="sub_category_id[]" value="{{$subCategories->id}}">
              <label class="custom-control-label form-check-label" for="{{$subCategories->name}}">
                {{App::getLocale() == 'en' ? $subCategories->name : $subCategories->name_locale }}
                </label>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <hr/>

      <!-- price filter start here -->
      <div class="collection-collapse-block border-0 open">
        <h3 class="collapse-block-title">@lang('home.Price')</h3>
        <div class="collection-collapse-block-content">
          <div class="filter-slide">
            <div class="sc-da70c56-0 dQEdDU">
              <h4 class="text-center">@lang('home.Min')</h3>
              <input type="number" value="10" name="min" name="price_from" min="1" class="form-control">
              <span class="between to">@lang('home.To')</span>
              <h4 class="text-center">@lang('home.Max')</h3>
              <input type="number" value="4862" name="max" min="2" name="price_to" max="100000" class="form-control">
               </div>
              </div>
            </div>
          </div>
        </div>

    <div>
      <button type="submit" class="btn btn-primary">@lang('home.Sumbit')</button>
    </div>
  </form>
    <!-- silde-bar colleps block end here -->
  </div>