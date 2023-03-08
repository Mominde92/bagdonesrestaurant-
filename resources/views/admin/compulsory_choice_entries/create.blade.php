{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            Add New compulsory_choice Entry
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <a href="{{ url('compulsory_choice_entry') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
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
    <!--begin::Form-->
    <form action="{{ url('compulsory_choice_entry') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">
            <div class="col-lg-12">
                    <label>compulsory_choice<span class="text-danger">*</span></label>
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control kt-select2" id="kt_select2_1" name="compulsory_choice_id">
                            <option value="">Select compulsory_choice</option>
                            @foreach ($compulsory_choices as $compulsory_choice)
                                <option value="{{$compulsory_choice['id']}}">{{$compulsory_choice['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label>Name_en<span class="text-danger">*</span></label>
                    <input type="text" name="name" required class="form-control" placeholder="Enter Name" />
                    <span class="form-text text-muted">Please enter Name, Max 50 character allowed</span>
                </div>
                <div class="col-lg-12">
                    <label>Name_locale</label>
                    <input type="text" name="name_locale" class="form-control" placeholder="Enter Local Name" />
                    <span class="form-text text-muted">Please enter Local Name, Max 50 character allowed</span>
                </div>
             
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection

