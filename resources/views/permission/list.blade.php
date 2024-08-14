@extends('layouts.admin.app')

@section('title', __('messages.permission_List'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <div class="d-flex flex-wrap gap-3 align-items-center mb-3">
            <h2 class="text-capitalize mb-0 d-flex align-items-center gap-2">
                <img width="20" src="{{asset('public/assets/admin/img/icons/product.png')}}" alt="">
                {{ __('messages.permission_list')}}
            </h2>
            <span class="badge badge-soft-dark rounded-50 fs-14">{{$permissions->count()}}</span>
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
                                               placeholder="{{ __('messages.search_by_permission_name')}}" aria-label="Search"
                                               value="" required autocomplete="off">
                                                <a href="{{ url()->current() }}"><button type="button"
                                            class="btn search-refresh"><i class="tio-refresh" title="Refresh"></i>
                                        </button></a>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">{{__('search')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- @if(in_array('add_permission_access',$userPermissions)) --}}
                                <div class="col-lg-8 col-sm-4 col-md-6 d-flex justify-content-sm-end">
                                    <a href="#" class="btn btn-primary">
                                        <i class="tio-add"></i>
                                        {{__('messages.add_new_permission')}}
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
                                    <th>{{__('SL')}}</th>
                                    <th>{{__('permissions')}}</th>
                                    <th>{{__('guard')}}</th>
                                    <th class="text-center">{{__('messages.action')}}</th>
                                </tr>
                            </thead>

                            <tbody id="set-rows">
                            @foreach($permissions as $key=>$permission)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            @can(('permission_edit'))
                                                <a class="btn btn-outline-primary square-btn"
                                                    href="#">
                                                    <i class="tio tio-edit"></i>
                                                </a>
                                            @endcan
                                            @can(('permission_delete'))
                                                <a class="btn btn-outline-danger square-btn" href="javascript:"
                                                    onclick="form_alert('User-{{$permission->id}}','{{__('messages.Want to delete this item ?')}}')"><i class="tio tio-delete"></i></a>
                                            @endcan
                                        </div>
                                        <form action="#"
                                                method="post" id="User-{{$permission->id}}">
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
                            {{-- {!! $permissions->links() !!} --}}
                        </div>
                    </div>
                    @if($permissions->count()==0)
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
