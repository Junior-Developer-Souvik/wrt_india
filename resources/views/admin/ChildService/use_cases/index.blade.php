@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Use Cases</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('child-service.use_cases.create',$childService->id)}}" class="btn btn-success"><i class="fas fa-plus"></i>New Use Case</a>
                <a href="{{route('service_management.show',$childService->service_id)}}" class="btn btn-info"><i class="fas fa-chevron-left"></i>Back</a>
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
                  <form action="{{ route('child-service.use_cases',['id'=>$childService->id]) }}">
                    <div class="input-group input-group" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search" value="{{request()->input('table_search')}}">
    
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            <a href="{{ route('child-service.use_cases',['id'=>$childService->id]) }}" class="btn btn-default">
                                <i class="fas fa-sync"></i>
                            </a>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($use_cases->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">No data Found</td>
                            </tr>                       
                        @else
                        @foreach ($use_cases as $key=> $use_case)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{asset($use_case->logo)}}" alt="no-image"></td>
                            <td>{{$use_case->title}}</td>
                            <td>
                                <button class="status-toggle" data-id="{{ $use_case->id }}" data-status="{{ $use_case->status }}">
                                    @if($use_case->status == 1)
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
                            </td>
                            <td>
                                <a href="{{route('child-service.use_cases.edit',['child_service_id' => $childService->id, 'use_case_id' => $use_case->id])}}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <a href="javascript:void(0);" class="text-danger delete-btn w-4 h-4 mr-1" data-toggle="tooltip" title="Delete" data-id="{{ $use_case->id}}">
                                    <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                      </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                       
                        @endif
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                    {{$use_cases->links('pagination::bootstrap-4')}}
                </ul>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection
@section('customJs')
    <script>
        $(document).on('click', '.status-toggle', function () {
        var useCasesId = $(this).data('id');
        var currentStatus = $(this).data('status');
        var newStatus = currentStatus == 1 ? 0 : 1; // Toggle status

        $.ajax({
            url: "{{ route('child-service.use_cases.status') }}", // Update this route
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: useCasesId,
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
                    window.location.href = '../use_cases/delete/' + itemId; // Replace '/delete/' with your actual delete route
                }
            });
        });
    });
    </script>
@endsection

