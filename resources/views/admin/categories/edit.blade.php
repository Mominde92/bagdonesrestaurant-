{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Edit Category</h1>
                    <p class="breadcrumbs"><span><a href="{{route('dashboard')}}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Category</p>
                </div>
                <div>
                    <a href="{{route('category')}}" class="btn btn-primary"> View All
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Edit Category</h2>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="row ec-vendor-uploads">
                                <div class="col-lg-4">
                                    <form class="row g-3" action="{{ url('category/update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="ec-vendor-img-upload">
                                            <div class="ec-vendor-main-img">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" class="ec-image-upload" name="image" accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload"><img src="{{asset('admin/assets/img/icons/edit.svg')}}" class="svg_img header_svg" alt="edit"></label>
                                                    </div>
                                                    <div class="avatar-preview ec-preview">
                                                        <div class="imagePreview ec-div-preview">
                                                            <img class="ec-image-preview" src="{{asset('uploads/category/'.$category->image)}}" alt="edit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload-set colo-md-12">
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type="file" id="thumbUpload01" name="cover_image" class="ec-image-upload" accept=".png, .jpg, .jpeg">
                                                            <label for="imageUpload"><img src="{{asset('admin/assets/img/icons/edit.svg')}}" class="svg_img header_svg" alt="edit"></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview" 
                                                                @if($category->cover_image)
                                                                src="{{asset('uploads/category/'.$category->cover_image)}}" 
                                                                @else
                                                                src="{{asset('admin/assets/img/products/vender-upload-thumb-preview.jpg')}}" 
                                                                @endif
                                                                alt="edit">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- <div class="thumb-upload-set colo-md-12">
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type="file" id="thumbUpload01" name="slider_web" class="ec-image-upload" accept=".png, .jpg, .jpeg">
                                                            <label for="imageUpload"><img src="{{asset('admin/assets/img/icons/edit.svg')}}" class="svg_img header_svg" alt="edit"></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview" 
                                                                @if($category->slider_web)
                                                                src="{{asset('uploads/category/'.$category->slider_web)}}" 
                                                                @else
                                                                src="{{asset('admin/assets/img/products/vender-upload-thumb-preview.jpg')}}" 
                                                                @endif

                                                                alt="edit">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div> -->

                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="ec-vendor-upload-detail">

                                        <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label">Category name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $category->name }}" id="inputEmail4" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="slug" class="col-12 col-form-label">Name Locale</label>
                                            <div class="col-12">
                                                <input type="text" name="name_locale" class="form-control" value="{{ $category->name_locale }}" placeholder="Enter Local Name">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12" style="margin-top: 15px">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Content -->
    </div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {

        $(".select2").select2({
            ajax: {
                url: "{{ route('dataAjax') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        '_token': '{{ csrf_token() }}',
                        'search': params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });

    });



</script>
@endsection
