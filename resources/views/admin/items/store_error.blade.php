{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label"> 
                    <div class="text-muted pt-2 font-size-sm"> Store Not Found</div>
                </h3>
            </div>
          
        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
            <div id="alert" class="alert alert-custom alert-notice alert-light-success fade show" role="alert">
                <!-- <div class="alert-icon"><i class="flaticon-warning"></i></div> -->
                <div class="alert-text">{{ $message }}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            @endif

            Add  A Store First

        </div>


        

    </div>

@endsection




{{-- Scripts Section --}}
@section('scripts')
   

    {{-- page scripts --}}
    <script type="text/javascript">

    </script>
    @if ($message = Session::get('success'))
    <script>
        // $('#alert').show();
        //     setTimeout(function() {
        //         $('#alert').hide();
        // }, 5000);
    </script>
    @endif
@endsection
