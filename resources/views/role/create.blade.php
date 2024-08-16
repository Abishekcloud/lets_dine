@extends('layouts.admin.app')

@section('title', __('messages.Create New Role'))

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="text-capitalize mb-0 d-flex align-items-center gap-2">
                <img width="20" src="{{asset('public/assets/admin/img/icons/deliveryman.png')}}" alt="">
                {{__('messages.Add_New_Role')}}
            </h2>
            <div class="col-lg-12 col-sm-4 col-md-6 d-flex justify-content-sm-end">
                <a href="#" class="btn btn-primary">
                    <i class="tio-back-ui"></i>
                    {{__('messages.Back')}}
                </a>
            </div>
        </div>

        <form action="{{route('role.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card mb-3">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="input-label">{{__('messages.role_name')}}</label>
                                    <input type="text" name="name" class="form-control" placeholder="{{__('messages.role_name')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="input-label">{{ __('messages.usertype') }}</label>
                                    <select class="form-control js-select2-custom" name="guard" id="guard">
                                        @foreach($guards as $guard)
                                            <option value="{{ $guard }}">{{ $guard }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="permission-select-wrapper">
                                        <div class="d-flex justify-content-between">
                                            <label class="input-label">
                                                {{ __('messages.select_permissions') }}
                                                <span class="input-label-secondary"></span>
                                            </label>
                                            <div class="buttons">
                                                <button type="button" id="select-all-btn" class="btn btn-primary">Select All</button>
                                                <button type="button" id="deselect-all-btn" class="btn btn-danger">Deselect All</button>
                                            </div>
                                        </div>
                                        <select name="permissions[]" id="filtered-results" class="form-control js-select2-custom" multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-end  gap-3">
                            <button type="reset" class="btn btn-secondary">{{__('messages.reset')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
   $(document).ready(function() {
    $('#guard').on('change', function() {
        var guardName = $(this).val();

        $.ajax({
            url: '{{ route('role.guard_filter') }}',
            method: 'GET',
            data: { guard_name: guardName },
            success: function(response) {
                $('#filtered-results').empty();
                if (response.length > 0) {
                    $.each(response, function(index, permissionName) {
                        var optionHtml = `
                            <option value="${permissionName}">${permissionName}</option>
                        `;
                        $('#filtered-results').append(optionHtml);
                    });
                } else {
                    $('#filtered-results').append('<option disabled>No permissions found for this guard.</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                $('#filtered-results').empty().append('<option disabled>There was an error retrieving the permissions.</option>');
            }
        });
    });

    $('#select-all-btn').on('click', function() {
        $('#filtered-results option').prop('selected', true);
        $('#filtered-results').trigger('change');
    });

    $('#deselect-all-btn').on('click', function() {
        $('#filtered-results option').prop('selected', false);
        $('#filtered-results').trigger('change');
    });
});

</script>
@push('script_2')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>

    <script src="{{asset('public/assets/admin/js/spartan-multi-image-picker.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'identity_image[]',
                maxCount: 5,
                rowHeight: '160px',
                groupClassName: 'col-6 col-sm-4 col-md-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{asset('public/assets/admin/img/400x400/img2.jpg')}}',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('"Please only input png or jpg type file"', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('{{ "File size too big"', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
            $('#select-all-btn').click(() => {
                $('#choice_attributes option').attr('selected', true);
                $('#choice_attributes').select2();
            });
            $('#deselect-all-btn').click(() => {
                $('#choice_attributes option').attr('selected', false);
                $('#choice_attributes').select2();
            });

        });

        function getRequest(route,id) {
            $.get({
                url: route,
                dataType: 'json',
                success: function (data) {
                    $('#' + id).empty().append(data.options);
                },
            });
        }
    </script>

@endpush
