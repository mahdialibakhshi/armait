@extends('admin.layouts')
@section('script')
    <script>
        $(document).ready(function () {
            $('#new_password').val(' ');
        })

        // Generate a Password string
        function randString() {
            var dataSet = $('#new_password').attr('data-character-set').split(',');
            var possible = '';
            if ($.inArray('a-z', dataSet) >= 0) {
                possible += 'abcdefghijklmnopqrstuvwxyz';
            }
            if ($.inArray('A-Z', dataSet) >= 0) {
                possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }
            if ($.inArray('0-9', dataSet) >= 0) {
                possible += '0123456789';
            }
            if ($.inArray('#', dataSet) >= 0) {
                possible += '![]{}()%&*$#^<>~@|';
            }
            console.log(possible);
            var text = '';
            for (var i = 0; i < 20; i++) {
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            console.log(text);
            $('#new_password').val(text);
        }
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
                                            <div class="text-white">
                                                Edit User
                                                <hr>
                                            </div>
                                            <div class="settings-profile">
                                                <form method="POST"
                                                      action="{{ route('admin.user.update',['type'=>$type,'user'=>$user->id]) }}">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-row mt-4">
                                                        <div class="col-md-6">
                                                            <label for="name">Name</label>
                                                            <input id="name" type="text" name="name"
                                                                   class="form-control"
                                                                   placeholder="Name" value="{{ $user->name }}">
                                                            @error('name')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="email">Email</label>
                                                            <input id="email" type="text" name="email"
                                                                   class="form-control"
                                                                   placeholder="Email" value="{{ $user->email }}">
                                                            @error('name')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="company_name">Company Name</label>
                                                            <input id="company_name" type="text" name="company_name"
                                                                   class="form-control"
                                                                   placeholder="Company Name"
                                                                   value="{{ $user->company_name }}">
                                                            @error('company_name')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="field">Field</label>
                                                            <input id="field" type="text" name="field"
                                                                   class="form-control"
                                                                   placeholder="Field" value="{{ $user->field }}">
                                                            @error('field')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="type">Type</label>
                                                            <input id="type" type="text" name="field"
                                                                   class="form-control"
                                                                   placeholder="Type" value="{{ $user->type }}">
                                                            @error('type')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="mobile_number">Mobile Number</label>
                                                            <input id="mobile_number" type="text" name="mobile_number"
                                                                   class="form-control"
                                                                   placeholder="Mobile Number"
                                                                   value="{{ $user->mobile_number }}">
                                                            @error('mobile_number')
                                                            <p class="input-error-validate">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="status">User Status</label>
                                                            <select name="status" id="status" class="form-control">
                                                                @foreach($userStatus as $status)
                                                                    <option
                                                                        {{ $user->status==$status->id ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button class="btn btn-info btn-sm mb-2" type="submit">
                                                                Update
                                                            </button>
                                                            <a href="{{ route('admin.users.index',['type'=>$type]) }}"
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
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-white">
                                                Send Message
                                                <hr>
                                            </div>
                                            <div class="settings-profile">
                                                <form method="POST"
                                                      action="#">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-row mt-4">
                                                        <div class="col-12 mb-3">
                                                            <label for="name">Template</label>
                                                            <select name="status" id="status" class="form-control">
                                                                @foreach($messages as $message)
                                                                    <option
                                                                        value="{{ $message->id }}">{{ $message->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button class="btn btn-info btn-sm mb-2" type="submit"> Send
                                                                Email
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-white">
                                                Reset Password
                                                <hr>
                                            </div>
                                            <div class="settings-profile">
                                                <form method="POST"
                                                      action="{{ route('admin.user.reset_password',['user'=>$user->id]) }}">
                                                    @csrf
                                                    <div class="form-row mt-4">
                                                        <div class="col-12 position-relative mb-3">
                                                            <label for="new_password">Generate Password</label>
                                                            <input name="new_password" id="new_password"
                                                                   class="form-control"
                                                                   data-character-set="a-z,A-Z,0-9,#">
                                                            @error('new_password')
                                                            <p class="input-error-validate position-absolute">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                            <button style="bottom: 4px;right: 0" onclick="randString()"
                                                                    class="btn btn-info position-absolute"
                                                                    type="button">
                                                                Generate Password
                                                            </button>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button class="btn btn-info btn-sm mb-2" type="submit">
                                                                Reset Password
                                                            </button>
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

