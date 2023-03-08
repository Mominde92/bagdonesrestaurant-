{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Edit Appearance</h1>
                    <p class="breadcrumbs"><span><a href="#">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Appearance</p>
                </div>
                <div>
                    <a href="{{ url('appearance') }}" class="btn btn-primary"> View All </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Edit Appearance</h2>
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
                                    <form class="row g-3" action="{{ url('appearance/update', $appearance) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                </div>
                                <div class="col-lg-8">
                                    <div class="ec-vendor-upload-detail">

                                        <div class="col-md-12">
                                            <label for="name" class="form-label">Number</label>
                                            <input type="number" name="number" class="form-control" placeholder="Enter Name" value="{{$appearance->number}}" required>
                                        </div>


                                        <div class="col-md-12">
                                            <label>Content Type<span class="text-danger">*</span></label>
                                            <div class=" col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control kt-select2 select2" id="kt_select2_1" name="content_type_id">
                                                    @foreach ($content_types as $content_type)
                                                        <option value="{{$content_type['id']}}" {{ $appearance->content_type_id == $content_type['id'] ? 'selected="selected"': ""}}>{{$content_type['name'] }}</option>
                                                    @endforeach
                                                </select>
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

</script>
@endsection
