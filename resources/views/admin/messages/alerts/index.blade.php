@extends('admin.layouts')

@section('title')
    Messages - alerts
@endsection

@section('style')
    <style>
        .markets-pair-list th, .markets-pair-list td{
            width: auto !important;
        }
    </style>
@endsection

@section('script')
    <script>
        function removeModal(id, e) {
            e.stopPropagation();
            let remove_modal = $('#remove_modal');
            $('#id').val(id);
            remove_modal.modal('show');
        }

        function Remove() {
            let id = $('#id').val();
            $.ajax({
                url: "#",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                },
                dataType: "json",
                method: "post",
                beforeSend: function () {

                },
                success: function (msg) {
                    if (msg) {
                        $('#remove_modal').modal('hide');
                        if (msg[0] == 1) {
                            window.location.reload();
                        } else {
                            $('#alert').html(msg[1]);
                        }
                    }
                }
            })
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
                    <div>
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    @include('admin.sections.alert')
                                    <div class="col-12">
                                        <h5 class="text-white mb-2">
                                            Mail Messages
                                        </h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="markets-pair-list">
                                            <div id="alert"></div>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr class="bg-dark">
                                                    <th class="text-white">#</th>
                                                    <th class="text-white">title</th>
                                                    <th class="text-white">Description</th>
                                                    <th class="text-white"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($alerts as $key=>$item)
                                                    <tr>
                                                        <td>
                                                            {{ $alerts->firstItem()+$key }}
                                                        </td>
                                                        <td>
                                                            {{ $item->title }}
                                                        </td>
                                                        <td>
                                                            {{ $item->description }}
                                                        </td>
                                                        <td class="d-flex justify-content-center">
{{--                                                            <a onclick="removeModal({{ $item->id }},event)"--}}
{{--                                                               class="btn btn-sm btn-danger mr-3">--}}
{{--                                                                <i class="icon ion-md-close text-white"></i>--}}
{{--                                                            </a>--}}
                                                            <a href="{{ route('admin.alert.edit',['alert'=>$item->id]) }}"
                                                               class="btn btn-sm btn-warning ">
                                                                <i class="icon ion-md-eye text-white"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <div class="d-flex justify-content-center mt-4">
                                                    {{ $alerts->links() }}
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
    </div>
    @include('admin.sections.remove_modal')
@endsection

