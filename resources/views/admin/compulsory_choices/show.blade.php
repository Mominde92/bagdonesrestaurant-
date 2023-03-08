{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            View compulsory_choice
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
            <a href="{{ url('compulsory_choice') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
    <!--begin::Form-->
         <div class="card-body">
            <div class="form-group row">

                <div class="col-lg-6">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $compulsory_choice->name }}" required disabled class="form-control"/>
                </div>
                <div class="col-lg-6">
                    <label>Name_locale</label>
                    <input type="text"  value="{{ $compulsory_choice->name_locale }}" disabled  class="form-control" />
                </div>
                <div class="col-lg-6">
                    <label>Description</label>

                    <input type="text" name="name" value="{{ $compulsory_choice->description }}" required disabled class="form-control"/>
                </div>
                <div class="col-lg-6">
                    <label>Description_locale</label>
                    <input type="text"  value="{{ $compulsory_choice->description_locale }}" disabled  class="form-control" />

                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <a href="{{ url('compulsory_choice/edit',$compulsory_choice) }}"  class="btn btn-primary mr-2">Edit</a>
                </div>
            </div>
        </div>

    <!--end::Form-->
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>

</script>
@endsection
