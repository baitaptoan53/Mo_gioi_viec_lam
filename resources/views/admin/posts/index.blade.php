@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Job Title</th>
                                <th>Location</th>
                                <th>Remotable</th>
                                <th>Is Partime</th>
                                <th>Range Salary</th>
                                <th>Range Date</th>
                                <th>Status</th>
                                <th>Is Pinned</th>
                                <th>Create At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->job_title }}</td>
                                    <td>{{ $post->location }}</td>
                                    <td>{{ $post->remotable }}</td>
                                    <td>{{ $post->is_partime }}</td>
                                    <td>{{ $post->range_salary }}</td>
                                    <td>{{ $post->range_date }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>{{ $post->is_pinned }}</td>
                                    <td>{{ $post->created_at }}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    $(document).ready(function() {
    $ajax({
    url: '{{ route('api.posts') }}',
    type: 'GET',
    dataType: 'json',
    data: {
    id: id,
    job_title: job_title,
    location: location,
    remotable: remotable,
    is_partime: is_partime,
    range_salary: range_salary,
    range_date: range_date,
    status: status,
    is_pinned: is_pinned,
    created_at: created_at,
    },
    success: function(response) {
                   $('#data-table').DataTable({
                       processing: true,
                       serverSide: true,
                       ajax: response.data,
                       columns: [
                           {data: 'id', name: 'id'},
                           {data: 'job_title', name: 'job_title'},
                           {data: 'location', name: 'location'},
                           {data: 'remotable', name: 'remotable'},
                           {data: 'is_partime', name: 'is_partime'},
                           {data: 'range_salary', name: 'range_salary'},
                           {data: 'range_date', name: 'range_date'},
                           {data: 'status', name: 'status'},
                           {data: 'is_pinned', name: 'is_pinned'},
                           {data: 'created_at', name: 'created_at'},
                       ]
                   }
    }
    error: function(error) {

    }
    });
    });
@endpush
