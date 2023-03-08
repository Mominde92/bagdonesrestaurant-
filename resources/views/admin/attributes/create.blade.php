{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>  Add New Attribute</h1>
                    <p class="breadcrumbs"><span><a href="#">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Attribute</p>
                </div>
                <div>
                    <a href="{{ url('attribute') }}" class="btn btn-primary"> View All
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Add Attribute</h2>
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
    <form action="{{ url('attribute') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">

                <div class="col-lg-6">
                    <label>Name_en<span class="text-danger">*</span></label>
                    <input type="text" name="name" required class="form-control" value="{{old('name')}}" placeholder="Enter Name" />
                    <span class="form-text text-muted">Please enter Name, Max 50 character allowed</span>
                </div>
                <div class="col-lg-6">
                    <label>Name_locale</label>
                    <input type="text" name="name_locale" required class="form-control" value="{{old('name_locale')}}" placeholder="Enter Local Name" />
                    <span class="form-text text-muted">Please enter Local Name, Max 50 character allowed</span>
                </div>

            </div>
            	<!-- Attribute Component -->
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Attributes Components</h4>
							<div class="component-info">
								<div class="row form-row component-cont">
									<div class="col-12 col-md-10 col-lg-11">
										<div class="row form-row">
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label> Name <span class="text-danger">*</span></label>
													<input type="text" required name="entry_name[]" class="form-control">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label>Name locale <span class="text-danger">*</span></label>
													<input type="text" required name="entry_name_locale[]" class="form-control">
												</div>
											</div>

										</div>
									</div>

								</div>
							</div>
							<div class="add-more">
								<a href="javascript:void(0);" class="add-component"><i class="fa fa-plus-circle"></i> Add more </a>
							</div>
						</div>
					</div>
					<!-- /Attribute Component -->

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection
{{-- Scripts Section --}}
@section('scripts')
<script >

    $(".component-info").on('click','.trash', function () {
		$(this).closest('.component-cont').remove();
		return false;
    });

    $(".add-component").on('click', function () {

		var component_content = '<div class="row form-row component-cont">' +
			'<div class="col-12 col-md-10 col-lg-11">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label> Name </label>' +
							'<input type="text" required name="entry_name[]" class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label> Name locale </label>' +
							'<input type="text" required name="entry_name_locale[]" class="form-control">' +
						'</div>' +
					'</div>' +

				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
		'</div>';

        $(".component-info").append(component_content);
    });
</script>
@endsection


