@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All verses</h1>

     @if(session()->has('message'))
        <div class="alert alert-success">
            {{ Auth::user()->name }}, {{ session()->get('message') }}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">

                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label> 
                                    Show 
                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> 
                                    entries
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <label>
                                    Search:
                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                </label>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @if (count($verses) > 0)
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Reference</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Verse</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Comment</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($verses as $verse)
                                    <tr class="odd">
                                        <td class="sorting_1">{{ $verse->reference }}</td>
                                        <td>{{ $verse->content }}</td>
                                        <td>{{ $verse->comment }}</td>
                                        <td>
                                            <a href="{{ route('verse.edit', $verse->id) }}" class="btn btn-success py-0 px-2">Edit</a>
                                            <form action="{{ route('verse.destroy', $verse->id) }}" method="POST" class="d-inline-block">
                                                {!! csrf_field() !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger py-0 px-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('verse.create') }}" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Add First Verse</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-5">
                        {{ $verses->links() }}
                        {{-- <div class="col-sm-12 col-md-7">
                        </div> --}}
                    </div>
                </div>

            </div> 

        </div>

    </div>

</div>
@endsection