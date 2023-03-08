<div class="btn-group mb-1">
    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
        <span class="sr-only">Info</span>
    </button>

    <div class="dropdown-menu" style="">
        <a class="dropdown-item" href="{{ url('compulsory_choice/edit',$id) }}" title="Edit">Edit</a>
        <a href="javascript:void(0)" data-id="{{ $id }}" class="delete btn btn-sm btn-clean btn-icon" title="Delete">
            <i class="la la-trash"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{ $id }}" class="dropdown-item delete">Delete</a>
    </div>
</div>
