@extends('layouts.admin.app')

@section('title', __('messages.Update_Role'))


@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="text-capitalize mb-0 d-flex align-items-center gap-2">
                <img width="20" src="{{asset('public/assets/admin/img/icons/deliveryman.png')}}" alt="">
                {{__('messages.Update_Role')}}
            </h2>
            <div class="col-lg-12 col-sm-4 col-md-6 d-flex justify-content-sm-end">
                <a href="{{route('role.list')}}" class="btn btn-primary">
                    <i class="tio-back-ui"></i>
                    {{__('messages.Back')}}
                </a>
            </div>
        </div>


        <form id="edit_permission_form" action="{{route('permission.update')}}">
            @csrf
            <div class="card mb-3">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="input-label">{{__('messages.role_name')}}</label>
                                    <input type="text" name="role" value="{{$roles->name }}" class="form-control" placeholder="{{__('messages.role_name')}}"
                                        required>
                                        <input type="hidden" id="id" name="id" value="{{$roles->id}}">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <label for="guard_name" class="block text-sm text-gray-600 mb-2">Guard Name:</label>
                                <select id="guard_name" name="guard_name" onchange="" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="{{$roles->guard_name }}">{{$roles->guard_name }}</option>
                                </select>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="permission-select-wrapper">
                                        <div class="d-flex justify-content-between">
                                            <label class="input-label">
                                                {{__('messages.select_permissions')}}
                                                <span class="input-label-secondary"></span>
                                            </label>
                                            <div class="buttons">
                                                <button type="button" id="select-all-btn" class="btn btn-primary">Select All</button>
                                                <button type="button" id="deselect-all-btn" class="btn btn-danger">Deselect All</button>
                                            </div>
                                        </div>
                                        <select name="permissions[]" id="choice_attributes" class="form-control js-select2-custom" multiple="multiple">
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->id }}" @if($roles->permissions->contains($permission)) selected @endif>
                                                    {{ $permission->name }}
                                                </option>
                                            @endforeach
                                        </select>
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

<script>
     $(document).ready(function() {
        $('#guard_name').on('change', function() {
            alert("Hii");
            var guardName = $(this).val();

            $.ajax({
                url: '{{route('role.guard_filter')}}', // The URL to your filtering route
                method: 'GET',
                data: { guard_name: guardName },
                success: function(response) {
                    $('#filtered-results').empty();
                    if (response.length > 0) {
                        $.each(response, function(index, permissionName) {
                            var checkboxHtml = `
                                <div class="flex items-center">
                                    <input type="checkbox" id="permission_${index}" value="${permissionName}" name="permissions[]" class="mr-2">
                                    <label for="permission_${index}" class="text-sm text-gray-600">
                                        <span style="padding-left: 1rem">${permissionName}</span>
                                    </label>
                                </div>
                            `;
                            $('#filtered-results').append(checkboxHtml);
                        });
                    } else {
                        $('#filtered-results').append('<p>No permissions found for this guard.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    $('#filtered-results').append('<p>There was an error retrieving the permissions.</p>');
                }
            });
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
                    toastr.error('"File size too big"', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
        $('#select-all-btn').click(() => {
                $('#choice_attributes option').attr('selected', true);
                $('#choice_attributes').select2();
            });
            $('#deselect-all-btn').click(() => {
                $('#choice_attributes option').attr('selected', false);
                $('#choice_attributes').select2();
            });
    </script>
<script>
    $(document).ready(function() {
        $('#edit_permission_form').submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            // alert(formData);
            $.ajax({
                type: 'POST',
                url: '{{ route('role.update') }}',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.message) {
                        toastr.success(response.message);
                        setTimeout(() => {
                            window.location.replace("{{ route('role.list') }}");
                        }, 1000);
                    } else {
                        toastr.success("Role Updated Successfully!");
                    }
                    // $("#refresh_div").load(location.href + " #refresh_div");
                },
                error: function(xhr, status, error) {
                    let errorMsg = "An error occurred. Please try again.";
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMsg = Object.values(xhr.responseJSON.errors).join('<br>');
                    } else if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMsg = xhr.responseJSON.error;
                    }
                    toastr.error(errorMsg);
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush
