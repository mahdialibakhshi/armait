@extends('admin.layouts')

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
                url: "{{ route('admin.header2.remove') }}",
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
                                    <div class="col-md-12">
                                        <div class="markets-pair-list">
                                            <div id="alert"></div>
                                            <div>
                                                <a href="{{ route('admin.header2.create') }}"
                                                   class="btn btn-success btn-sm mb-2">
                                                    <i class="icon ion-md-add mr-1"></i>
                                                    New
                                                </a>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>priority</th>
                                                    <th>Title</th>
                                                    <th>Number 1(min)</th>
                                                    <th>Number 2(max)</th>
                                                    <th>Number 3</th>
                                                    <th>created at</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($items as $key=>$item)
                                                    <tr>
                                                        <td>
                                                            {{ $item->priority }}
                                                        </td>
                                                        <td>
                                                            {{ $item->title }}
                                                        </td>
                                                        <td class="{{ $item->number_1>0 ? 'text-success' : ($item->number_1<0 ? 'text-danger' : 'text-muted') }}">
                                                            {{ $item->number_1 }}
                                                        </td>
                                                        <td class="{{ $item->number_2>0 ? 'text-success' : ($item->number_2<0 ? 'text-danger' : 'text-muted') }}">
                                                            {{ $item->number_2 }}
                                                        </td>
                                                        <td class="{{ $item->number_3>0 ? 'text-success' : ($item->number_3<0 ? 'text-danger' : 'text-muted') }}">
                                                            {{ $item->number_3. ' % ' }}
                                                        </td>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}
                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            <a onclick="removeModal({{ $item->id }},event)"
                                                               class="btn btn-sm btn-danger mr-3">
                                                                <i class="icon ion-md-close text-white"></i>
                                                            </a>
                                                            <a href="{{ route('admin.header2.edit',['item'=>$item->id]) }}"
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
                                                    {{ $items->links() }}
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

