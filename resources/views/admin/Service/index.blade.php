@extends('admin.layouts.app')
@section('content')
<style>
    .service-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 15px;
    border-bottom: 1px solid #ddd;
}

.service-title, .service-sub-title {
    text-align: left;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.action-buttons {
    display: flex;
    gap: 5px;
}

.status-toggle {
    background: transparent;
    border: none;
    cursor: pointer;
}

.action-buttons, .status-toggle, .btn-warning {
    margin-right: 10px; /* Add spacing between buttons */
}

.action-buttons {
    display: flex;
    gap: 10px; /* Ensure there's consistent space between action buttons */
}

.btn-warning {
    margin-left: 15px; /* Add space to separate the 'Features' button from the Eye button */
}

.btn {
    margin: 0 5px; /* Reduce space between buttons */
    padding: 5px 8px; /* Compact button padding */
   
}



</style>
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Service</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('service_management.create')}}" class="btn btn-info"><i class="fas fa-plus"></i>New Service</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <form action="" method="GET">
                    <div class="input-group input-group" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search" value="{{request()->input('table_search')}}">
                        
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                          <a href="{{ route('service_management.list.all') }}" class="btn btn-default">
                            <i class="fas fa-sync"></i>
                        </a>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <ul id="sortable-services" class="list-unstyled">
                    @if (count($service) > 0)
                        @foreach ($service as $key => $item)
                            <li class="service-item d-flex align-items-center justify-content-between border-bottom py-2"  data-id="{{ $item->id }}">
                                <!-- Name -->
                                <span class="service-title flex-grow-1 text-left">{{$item->title}}</span>
            
                                <!-- Sub-Title -->
                                <span class="service-sub-title flex-grow-1 text-left">
                                    {{$item->sub_title}}
                                </span>
                                {{-- Features --}}
                                @if ($item->title == "On-Site Lubricant Monitoring" || $item->title == "Online Oil Monitoring")
                                  <a href="{{route('service_management.features',$item->id)}}" class="btn btn-sm btn-outline-warning">Features</a>
                                @endif
                            
                                    
                                <!-- Child Services -->
                                <a href="{{ route('service_management.show', $item->id) }}" >
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 01-3 3 3 3 0 01-3-3 3 3 0 013-3 3 3 0 013 3zM12 3C7 3 2 9 2 12c0 3 5 9 10 9s10-6 10-9c0-3-5-9-10-9z"></path>
                                    </svg>
                                </a>
            
                                <!-- Status -->
                                <button class="status-toggle btn btn-sm" data-id="{{ $item->id }}" data-status="{{ $item->status }}">
                                    @if($item->status == 1)
                                        <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @else
                                        <svg class="text-danger-500 h-6 w-6 text-danger" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    @endif
                                </button>
            
                                <!-- Actions -->
                                <div class="action-buttons d-flex">
                                    <a href="{{ route('service_management.edit', $item->id) }}" class="edit-btn mr-2">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0);" class="text-danger delete-btn" data-toggle="tooltip" title="Delete" data-id="{{ $item->id }}">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            
            
            <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                    {{$service->links('pagination::bootstrap-4')}}
                </ul>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection
@section('customJs')
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).on('click', '.status-toggle', function () {
        var serviceId = $(this).data('id');
        var currentStatus = $(this).data('status');
        var newStatus = currentStatus == 1 ? 0 : 1; // Toggle status

        $.ajax({
            url: "{{ route('service_management.toggle-status') }}", // Update this route
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: serviceId,
                status: newStatus
            },
            success: function (response) {
                if (response.success) {
                    location.reload(); // Optionally refresh the page to update the status icon
                }
            }
        });
    });

    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var itemId = $(this).data('id');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'service-management/delete/' + itemId; // Replace '/delete/' with your actual delete route
                }
            });
        });
    });


    $(function () {
    // Make the list sortable
    $("#sortable-services").sortable({
        update: function (event, ui) {
            // Get the updated order of item IDs
            var sortedIDs = $("#sortable-services")
                .sortable("toArray", { attribute: "data-id" });

            // Send the sorted IDs to the server
            $.ajax({
                url: "{{route('service_management.service.update-order')}}", // Replace with your route
                type: "POST",
                data: {
                    order: sortedIDs,
                    _token: "{{ csrf_token() }}",// CSRF token for Laravel
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Updated',
                        text: 'Order updated successfully!',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong. Please try again.'
                    });
                }
            });
        },
    });

});

</script>
@endsection