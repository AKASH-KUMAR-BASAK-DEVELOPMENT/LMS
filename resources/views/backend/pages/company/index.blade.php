@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>List of Companies</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-styling table-hover">
                    <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Contacts</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->url }}</td>
                        <td>
                            <span>{{ $company->email }}</span><br>
                            <span>{{ $company->phone_primary }}</span><br>
                            <span>{{ $company->phone_secondary }}</span>
                        </td>
                        <td style="overflow: hidden;">
                            <button class="btn btn-primary" style="width: 40px; float: left; margin-right: 2px;"><i class="icofont icofont-edit-alt"></i></button>
                            <form action="{{ route('company.destroy', $company->id ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
    </div>
@endsection
