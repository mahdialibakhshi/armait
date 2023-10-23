@extends('admin.layouts')
@section('script')
    <script>
        $(document).ready(function () {
            $('#new_password').val(' ');
        })

        CKEDITOR.replace( 'text' ,{
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });

    </script>
@endsection
@section('content')
    <div class="settings mtb15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div id="settings-profile"
                             aria-labelledby="settings-profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            @include('admin.sections.alert')
                                            <div class="alert alert-info">
                                                <p class="mb-0">
                                                    <strong>
                                                        {{ $mail->description }}
                                                    </strong>
                                                </p>
                                            </div>
                                            <div class="settings-profile">
                                                <form method="POST"
                                                      action="{{ route('admin.email.update',['mail'=>$mail->id]) }}">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-row mt-4">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="title">Title</label>
                                                            <input id="title" type="text" name="title"
                                                                   class="form-control"
                                                                   placeholder="Name" value="{{ $mail->title }}">
                                                            @error('name')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="btn_link">Button Link</label>
                                                            <input id="btn_link" type="text" name="btn_link"
                                                                   class="form-control"
                                                                    value="{{ $mail->btn_link }}">
                                                            @error('name')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="btn_text">Button text</label>
                                                            <input id="btn_text" type="text" name="btn_text"
                                                                   class="form-control"
                                                                    value="{{ $mail->btn_link }}">
                                                            @error('name')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label for="text">Text</label>
                                                            <textarea rows="10" id="text" name="text"
                                                                   class="form-control"
                                                            >{{ $mail->text }}</textarea>
                                                            @error('text')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12">
                                                            <button class="btn btn-info btn-sm mb-2" type="submit">
                                                                Update
                                                            </button>
                                                            <a href="{{ route('admin.emails.index') }}"
                                                               class="btn btn-secondary btn-sm mb-2">
                                                                Back
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

