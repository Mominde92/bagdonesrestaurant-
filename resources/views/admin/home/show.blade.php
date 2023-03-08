{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            View Home Record
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <a href="{{ url('home') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <label>Content Type</label>
                <input type="text" value="{{ $home->content_type->name }}" required disabled class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <label>Appearance Number</label>
                <input type="text" value="{{ $home->appearance_number }}" required disabled class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            @if($home->sub_category_id != null)
                <div class="col-lg-4">
                    <label>Sub Category</label>
                    <input type="text" value="{{ $home->subCategory->name }}" required disabled
                        class="form-control" />
                </div>
            @else($home->item_id != null)
                <div class="col-lg-4">
                    <label>Item</label>
                    <input type="text" value="{{ $home->item->name }}" required disabled class="form-control" />
                </div>
            @endif
        </div>
    </div>
</div>
<div class="card-footer">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <a href="{{ url('home/edit',$home) }}" class="btn btn-primary mr-2">Edit</a>
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
