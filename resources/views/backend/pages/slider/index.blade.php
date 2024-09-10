@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>List of Sliders</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-styling table-hover">
                    <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Image</th>
                        <th>title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><img src="{{ asset($slider->image) }}" width="50px" height="50px"></td>
                            <td>{{ $slider->title }}</td>
                            <td style="overflow: hidden;">
                                <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-primary" style="width: 40px; float: left; margin-right: 2px;"><i class="icofont icofont-edit-alt"></i></a>
                                <form action="{{ route('sliders.destroy', $slider->id ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="width: 40px">
                                        <i class="icofont icofont-bin"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5" style="margin-top: 7px;">
                    <div class="dataTables_info" id="simpletable_info" role="status" aria-live="polite">
                        Showing {{ $sliders->firstItem() }} to {{ $sliders->lastItem() }} of {{ $sliders->total() }} entries
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="simpletable_paginate">
                        <ul class="pagination">
                            @if ($sliders->onFirstPage())
                                <li class="paginate_button page-item previous disabled" id="simpletable_previous">
                                    <a aria-controls="simpletable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                </li>
                            @else
                                <li class="paginate_button page-item previous">
                                    <a href="{{ $sliders->previousPageUrl() }}" aria-controls="simpletable" tabindex="0" class="page-link">Previous</a>
                                </li>
                            @endif

                            @foreach ($sliders->getUrlRange(1, $sliders->lastPage()) as $page => $url)
                                <li class="paginate_button page-item {{ $page == $sliders->currentPage() ? 'active' : '' }}" style="z-index: 0;">
                                    <a href="{{ $url }}" aria-controls="simpletable" tabindex="0" class="page-link">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($sliders->hasMorePages())
                                <li class="paginate_button page-item next">
                                    <a href="{{ $sliders->nextPageUrl() }}" aria-controls="simpletable" tabindex="0" class="page-link">Next</a>
                                </li>
                            @else
                                <li class="paginate_button page-item next disabled" id="simpletable_next">
                                    <a aria-controls="simpletable" data-dt-idx="3" tabindex="0" class="page-link">Next</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
