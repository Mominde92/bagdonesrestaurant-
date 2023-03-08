{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<!--begin::Card-->
		<div class="card card-custom gutter-b">
			<div class="card-body">
				<!--begin::Details-->
				<div class="d-flex mb-9">
					<!--begin: Pic-->
					<div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
						<div class="symbol symbol-50 symbol-lg-120">
							<img src="{{ asset('uploads/stores/' . $store->image)}}" alt="image">
						</div>
						<div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
							<span class="font-size-h3 symbol-label font-weight-boldest">{{$store->name}}</span>
						</div>
					</div>
					<!--end::Pic-->
					<!--begin::Info-->
					<div class="flex-grow-1">
						<!--begin::Title-->
						<div class="d-flex justify-content-between flex-wrap mt-1">
							<div class="d-flex mr-3">
								<a href="#"
									class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$store->name}}
									- {{$store->name_locale}}</a>
								<a href="#">
									<i class="flaticon2-correct text-success font-size-h5"></i>
								</a>
							</div>
							<div class="my-lg-0 my-3">
								<a href="{{url('store' ,[$store->id])}}/items"	class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Products</a>								
								<a href="{{ url('store') }}" class="btn btn-sm btn-info font-weight-bolder text-uppercase" >Go Back</a>
							</div>
						</div>
						<!--end::Title-->
						<!--begin::Content-->
						<div class="d-flex flex-wrap justify-content-between mt-1">
							<div class="d-flex flex-column flex-grow-1 pr-8">
								<div class="d-flex flex-wrap mb-4">

									<a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
										<i class="flaticon2-placeholder mr-2 font-size-lg"></i>{{$store->area->city->country->name}} ,{{$store->area->city->name}} , {{$store->area->name}} </a>
									
									<a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
											<i class="flaticon2-phone mr-2 font-size-lg"></i>{{$store->phone_number}}</a>
										
								</div>
								<div class="d-flex flex-wrap mb-4">	
										<span class="label label-lg label-light-{{$store->is_open == true ? 'success' : 'danger' }} label-inline">{{$store->is_open == true ? 'Open' : 'Closed' }}</span>
								</div>
								<div class="d-flex flex-wrap mb-4">	
										<span class="label label-lg label-light-{{$store->allow_add_hot_price == true ? 'success' : 'danger' }} label-inline">{{$store->allow_add_hot_price == true ? 'Allowed to add hot price' : 'Not allowed to add hot price' }}</span>
								</div>

							</div>
							<div class="d-flex align-items-center w-25 flex-fill float-right mt-lg-12 mt-8">

							</div>
						</div>
						<!--end::Content-->
					</div>
					<!--end::Info-->
				</div>
				<!--end::Details-->
				<div class="separator separator-solid"></div>
				<!--begin::Items-->
				<div class="d-flex align-items-center flex-wrap mt-8">
					<!--begin::Item-->
					<div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
						<span class="mr-4">
							<i class="flaticon-open-box display-4 text-muted font-weight-bold"></i>
						</span>
						<div class="d-flex flex-column text-dark-75">
							<span class="font-weight-bolder font-size-sm">Products</span>
							<span class="font-weight-bolder font-size-h5">
								<span class="text-dark-50 font-weight-bold"></span>items count</span>
						</div>
					</div>
					<!--end::Item-->




				</div>
				<!--begin::Items-->
			</div>
		</div>
		<!--end::Card-->


		<div class="row">
			<div class="col-lg-12 col-xxl-4 order-1 order-xxl-2">
				<div class="card card-custom card-stretch gutter-b">
					<div class="card-header border-0">
						<h3 class="card-title font-weight-bolder text-dark">Details</h3>						
					</div>
					<div class="card-body pt-0">
						<div class="mb-10">
							<div class="d-flex align-items-center">
								<div class="d-flex flex-column flex-grow-1">
									<a href="#"
										class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Slogan</a>
									<span class="text-muted font-weight-bold">{{$store->slogan}}</span>
									<span class="text-muted font-weight-bold">{{$store->slogan_locale}}</span>
								</div>
							</div>							
						</div>
						<div class="mb-10">
							<div class="d-flex align-items-center">
								<div class="d-flex flex-column flex-grow-1">
									<a href="#"
										class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">location address</a>
									<span class="text-muted font-weight-bold">{{$store->location_text}}</span>
									<span class="text-muted font-weight-bold">{{$store->location_text_locale}}</span>
								</div>
							</div>							
						</div>
						<div class="mb-10">
							<div class="d-flex align-items-center">	
								<div class="d-flex flex-column flex-grow-1">
									<a href="#"
										class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Delivery Time Range</a>
									<span class="text-muted font-weight-bold">{{$store->delivery_time_range}}</span>
								</div>
							</div>							
						</div>
					
						<div class="mb-10">
							<div class="d-flex align-items-center">
								<div class="d-flex flex-column flex-grow-1">
									<a href="#"
										class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Google Map Link</a>
									<span class="text-muted font-weight-bold">{{$store->link}}</span>
								</div>
							</div>							
						</div>
						<div class="mb-10">
							<div class="d-flex align-items-center">
								<div class="d-flex flex-column flex-grow-1">
									<a href="#"
										class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Delivery Areas</a>
										<ul>
											@foreach($store->deliveryAreas as $area)
											<li  class="text-muted font-weight-bold"> {{$area->city->country->name }} , {{$area->city->name }} , {{$area->name }}</li>
											@endforeach
										</ul>
									
								</div>
							</div>							
						</div>
					</div>
				</div>
			
			
				<div class="card-footer">
					<div class="row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<a href="{{ url('store/edit',$store) }}" class="btn btn-primary mr-2">Edit</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end::Container-->
</div>


@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>

</script>
@endsection