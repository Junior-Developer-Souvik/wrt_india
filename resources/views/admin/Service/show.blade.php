@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$service->title}} ->> Child Services</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('service_management.child-service.create',$service->id)}}" class="btn btn-success"><i class="fas fa-plus"></i>New Child Service</a>
                <a href="{{route('service_management.list.all')}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>Back</a>
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
                    <form action="{{ route('service_management.show', ['id' => $service->id]) }}" method="GET">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" value="{{request()->input('table_search')}}">
                            
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="{{ route('service_management.show', ['id' => $service->id]) }}" class="btn btn-default">
                                    <i class="fas fa-sync"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <ul id="sortable-list" class="list-group">
                    @foreach ($child_service as $key => $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $item->id }}">
                            <div class="d-flex align-items-center">
                                <!-- Sl.No -->
                                {{-- <span class="mr-3">{{$key + 1}}</span> --}}
            
                                <!-- Logo -->
                                <img src="{{ asset($item->logo) }}" alt="no-image" width="50px" class="img-fluid mr-3">
            
                                <!-- Details -->
                                <div class="details">
                                    <div class="d-flex align-items-center">
                                        <!-- Name -->
                                        <span class="font-weight-bold">Name:</span>
                                        <span class="mr-3">{{ $item->title }}</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <!-- Description -->
                                        <span class="font-weight-bold">Description:</span>
                                        <span class="mr-3">{{ Str::limit(strip_tags($item->description), 50) }}</span>
                                    </div>
                                </div>
            
                                <!-- Status -->
                                {{-- <div class="status-container mx-3"> --}}
                                <button class="status-toggle mr-3" data-id="{{ $item->id }}" data-status="{{ $item->status }}">
                                    @if($item->status == 1)
                                        <!-- Active Status Icon -->
                                        <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @else
                                        <!-- Inactive Status Icon -->
                                        <svg class="text-danger-500 h-6 w-6 text-danger" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    @endif
                                </button>
                                @if ($service->visibility_status == 'private')
                                    <a href="{{route('service_management.child-service.key-features',$item->id)}}" class="btn btn-outline-info btn-sm">Key Features</a>
                                    
                                    <a href="{{route('child-service.use_cases',$item->id)}}" class="btn btn-outline-warning btn-sm ml-4">Use Cases</a>
                                @endif
                               
                                {{-- </div> --}}
                            </div>
            
                            <!-- Actions -->
                            <div class="actions d-flex align-items-center">
                                <!-- Edit Button -->
                                <a href="{{ route('service_management.child-service.edit', $item->id) }}" class="mr-2">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
            
                                <!-- Delete Button -->
                                <a href="javascript:void(0);" class="text-danger delete-btn" data-id="{{ $item->id }}">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            
            <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                    {{$child_service->links('pagination::bootstrap-4')}}
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
            url: "{{ route('service_management.child-service.toggle-status') }}", // Update this route
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
                    window.location.href = '../child-service/delete/' + itemId; // Replace '/delete/' with your actual delete route
                }
            });
        });
    });

    $(function() {
    // Enable sorting on the list
    $("#sortable-list").sortable({
        update: function(event, ui) {
            var sortedIDs = $(this).sortable('toArray', { attribute: 'data-id' });
            // console.log(sortedIDs);
            // Send the new order to the server
            $.ajax({
                url: "{{route('service_management.child-service.update-order')}}", // Update this URL to match your route
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}", // Include CSRF token for security
                    order: sortedIDs
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
        }
    });
});

    </script>
@endsection