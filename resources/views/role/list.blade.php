@extends('layouts.admin.app')

@section('title', ('Role List'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <div class="d-flex flex-wrap gap-3 align-items-center mb-3">
            <h2 class="text-capitalize mb-0 d-flex align-items-center gap-2">
                <img width="20" src="{{asset('public/assets/admin/img/icons/product.png')}}" alt="">
                Role list
            </h2>
            <span class="badge badge-soft-dark rounded-50 fs-14">{{$roles->count()}}</span>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card">
                    <div class="px-20 py-3">
                        <div class="row gy-2 align-items-center">
                            <div class="col-lg-4 col-sm-8 col-md-6">
                                <form action="{{url()->current()}}" method="GET">
                                    <div class="input-group">
                                        <input id="datatableSearch_" type="search" name="search"
                                               class="form-control"
                                               placeholder="Search by Role Name"
                                               value="" required autocomplete="off">
                                                <a href="{{ url()->current() }}"><button type="button"
                                            class="btn search-refresh"><i class="tio-refresh" title="Refresh"></i>
                                        </button></a>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">"search"
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- @if(('add_roles_access')) --}}
                            <div class="col-lg-8 col-sm-4 col-md-6 d-flex justify-content-sm-end">
                                <a href="#" class="btn btn-primary">
                                    <i class="tio-add"></i>
                                    Add New Role
                                </a>
                            </div>
                            {{-- @endif --}}
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Role Name</th>
                                    <th>Permissions</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody id="set-rows">
                            @foreach($roles as $key=>$role)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <span class="media gap-3 align-items-center">
                                             <a href="#" class="media-body text-dark">
                                               {{ $role->name }}
                                             </a>
                                        </span>
                                    </td>
                                    <td>
                                        <select name="permissions[]"
                                                class="form-control js-select2-custom"
                                                multiple="multiple">
                                            @foreach($role->permissions as $permission)
                                                <option selected  value="{{$permission->id}}">{{$permission->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            {{-- @if(in_array('edit_roles_access')) --}}
                                                <a class="btn btn-outline-primary square-btn"
                                                    href="#">
                                                    <i class="tio tio-edit" data-toggle="tooltip" data-placement="top" title="Edit" ></i>
                                                </a>
                                            {{-- @endif --}}
                                            {{-- <a class="btn btn-outline-info square-btn"
                                                href="{{route('admin.permission.Role.show',[$role->id])}}">
                                                <i class="tio tio-visible-outlined"></i>
                                            </a> --}}

                                            {{-- @if(in_array('delete_role_access')) --}}
                                            <a class="btn btn-outline-danger square-btn" href="javascript:"
                                                onclick="form_alert('User-{{$role->id}}','Want to delete this item ?'"><i class="tio tio-delete"
                                                 data-toggle="tooltip" data-placement="top" title="Delete></i></a>
                                            {{-- @endif --}}
                                        </div>
                                        <form action="#"
                                                method="post" id="User-{{$role->id}}">
                                            @csrf @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <!-- Pagination -->
                    <div class="table-responsive mt-4 px-3">
                        <div class="d-flex justify-content-end">
                            {{-- {!! $roles->links() !!} --}}
                        </div>
                    </div>
                    @if($roles->count()==0)
                        <div class="text-center p-4">
                            <img class="mb-3" src="{{asset('public/assets/admin')}}/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                            <p class="mb-0">{{ translate('No data to show') }}</p>
                        </div>
                    @endif
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

@endsection

@push('script_2')
    <script>
        $('#search-form').on('submit', function () {
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '#',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#set-rows').html(data.view);
                    $('.page-area').hide();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        });
                $(document).ready(function(){
            var href=window.location.href;
            var newUrl=href.substring(0,href.indexOf('?'));
            window.history.replaceState({},"",newUrl);
        })

    </script>
@endpush
