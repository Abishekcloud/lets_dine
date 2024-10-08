@extends('layouts.admin.app')

@section('title', __('messages.create_new_role'))

@push('css_or_js')

@endpush

@section('content')
        <div class="content container-fluid">
            <div class="mb-3">
                <h2 class="text-capitalize mb-0 d-flex align-items-center gap-2">
                    <img width="20" src="{{asset('public/assets/admin/img/icons/deliveryman.png')}}" alt="">
                    {{__('messages.edit_permission')}}
                </h2>
                <div class="col-lg-12 col-sm-4 col-md-6 d-flex justify-content-sm-end">
                    <a href="{{route('permission.list')}}" class="btn btn-primary">
                        <i class="tio-back-ui"></i>
                        {{__('messages.Back')}}
                    </a>
                </div>
            </div>

            <form action="{{route('permission.update',[$permission->id])}}" method="POST" id ="edit_permission_form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card mb-3">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="{{$permission->id}}">
                                        <label class="input-label">{{__('messages.permission')}} {{__('messages.name')}}</label>
                                        <input type="text" name="name" class="form-control" value="{{ $permission->name }}" placeholder="{{__('messages.permission')}} {{__('messages.name')}}"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="input-label">{{ __('messages.user_type') }}</label>
                                    <select name="guard_name" class="form-control">
                                        <option value="" disabled>{{ __('messages.select_guard') }}</option>
                                        @foreach($guards as $guard)
                                            <option value="{{ $guard }}"
                                                {{ $permission->guard_name == $guard ? 'selected' : '' }}>
                                                {{ ucfirst($guard) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="d-flex justify-content-end  gap-3">
                                <button type="reset" class="btn btn-secondary">{{__('messages.reset')}}</button>
                                <button type="submit" class="btn btn-primary">{{__('messages.update')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#edit_permission_form').submit(function(e) {
                e.preventDefault();
                const submitButton = $(this).find('button[type="submit"]');
                submitButton.prop('disabled', true);

                const formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('permission.update') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.message) {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.replace("{{ route('permission.list') }}");
                            }, 1000);
                        } else {
                            toastr.success("Permission Added Successfully!");
                        }
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
                    },
                    complete: function() {
                        submitButton.prop('disabled', false);
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
                    toastr.error('{{ ("Please only input png or jpg type file") }}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('{{ ("File size too big") }}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>

@endpush
