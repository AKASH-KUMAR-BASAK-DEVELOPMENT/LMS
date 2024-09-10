@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Access Control</h4>
        </div>
        <div class="card-block">
            <form action="{{ route('role-permission.update', $role->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">{{ $role->name }} Permissions</h5>
                                            </div>
                                            <div class="card-block accordion-block">
                                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                                    @foreach($modules as $index => $module)
                                                    <div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingOne{{ $index }}">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{ $index }}" aria-expanded="false" aria-controls="collapseOne{{ $index }}">
                                                                    {{ $module->name }}
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div id="collapseOne{{ $index }}" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingOne{{ $index }}" style="">
                                                            <div class="accordion-content accordion-desc">
                                                                <div class="permissions-inline">
                                                                @foreach($permissions as $index => $permission)
                                                                    @if($permission->module_id == $module->id)
                                                                        <div class="border-checkbox-group border-checkbox-group-success" style="display: inline-block; margin-right: 10px;">
                                                                            <input class="border-checkbox" type="checkbox" id="checkbox2" name="permissions[]" value="{{ $permission->id }}" {{ rolePermissionAccess($role->id, $permission->id)==1 ? 'checked' : '' }}>
                                                                            <label class="border-checkbox-label" for="checkbox2">{{ $permission->name }}
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 text-center">
                        <button type="submit" class="btn hor-grd btn-grd-success rounded">&nbsp;Update&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
