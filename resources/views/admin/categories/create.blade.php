{{-- Extends layout --}}
@extends('admin.layout.default')


{{-- Content --}}
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Add Category</h1>
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
                            <h2>Add Category</h2>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger" style=" margin-top: 15px;">
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
                                    <form class="row g-3" action="{{ url('/category/store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <p>Image</p>
                                                <div class="avatar-edit">
                                                    <input type="file" class="ec-image-upload" name="image" accept=".png, .jpg, .jpeg">
                                                    <label for="imageUpload"><img src="{{asset('admin/assets/img/icons/edit.svg')}}" class="svg_img header_svg" alt="edit"></label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        <img class="ec-image-preview" src="{{asset('admin/assets/img/products/vender-upload-preview.jpg')}}" alt="edit">
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
                                                            <img class="image-thumb-preview ec-image-preview" src="{{asset('admin/assets/img/products/vender-upload-thumb-preview.jpg')}}" alt="edit">
                                                        </div>
                                                        <p>Cover Image</p>
                                                    </div>
                                                </div>

                                                <div class="thumb-upload">
                                                    
                                                    <div class="thumb-edit">
                                                        <input type="file" id="thumbUpload01" name="slider_web" class="ec-image-upload" accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload"><img src="{{asset('admin/assets/img/icons/edit.svg')}}" class="svg_img header_svg" alt="edit"></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview ec-image-preview" src="{{asset('admin/assets/img/products/vender-upload-thumb-preview.jpg')}}" alt="edit">
                                                        </div>
                                                    </div>
                                                    <p>Slider web</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="ec-vendor-upload-detail">

                                            <div class="col-md-12">
                                                <label for="name" class="form-label">Category name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}" required>
                                            </div>

                                            <div class="col-md-12 mb-10">
                                                <label for="name_locale" class="col-12 col-form-label">Name Locale</label>
                                                <div class="col-12">
                                                    <input type="text" name="name_locale" class="form-control" placeholder="Enter Local Name" value="{{old('name_locale')}}" required>
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
<script>
    // CSRF Token
    // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    var avatar5 = new KTImageInput('kt_image_5');

    avatar5.on('cancel', function (imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar5.on('change', function (imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar5.on('remove', function (imageInput) {
        swal.fire({
            title: 'Image successfully removed !',
            type: 'error',
            buttonsStyling: false,
            confirmButtonText: 'Got it!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

</script>
@endsection
