@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.css">

    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
@endsection
@section('content')
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>العمل</th>
                <th>إسم العامل</th>
                <th>مكانه</th>
                <th>طريقة الدفع</th>
                <th>الثمن</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $dat)
                <tr>
                    <td>{{ $dat->title }}</td>
                    <td>{{ $dat->name }}</td>
                    <td>{{ $dat->location }}</td>
                    <td>{{ $dat->payement_type }}</td>
                    <td>{{ $dat->budget }}</td>

                    <td> <a href="javascript:void(0)" id="show-user" data-url="{{ route('request.show', $dat->id) }}"
                            class="btn btn-info">معطيات حول العامل</a>
                        @if ($dat->accept == 0)
                            <form method="post" action="{{ route('request.accept', [$dat->job, $dat->jobid]) }}">
                                @csrf

                                <button class="btn btn-success" type="submit">قبول</button>
                            </form>
                        @elseif($dat->accept == 1)
                            <button class="btn btn-success">تم القبول </button>
                        @elseif($dat->accept == 2)
                            <button class="btn btn-danger" type="submit">ملغى</button>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>العمل</th>
                <th>إسم العامل</th>
                <th>مكانه</th>
                <th>طريقة الدفع</th>
                <th>الثمن</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">معطيات حول العامل</h5>

                </div>

                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td>الإسم واللقب</td>
                            <td id="user-id"></td>
                            </td>
                        </tr>
                        <tr>
                            <td>رقم الهاتف</td>
                            <td id="user-name"></td>
                        </tr>
                        <tr>
                            <td>المنطقة</td>
                            <td id="user-email"></td>
                        </tr>
                        <tr>
                            <td>تقييم</td>
                            <td id="rev"></td>
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="//cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.js"></script>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder=" ' + title + '" />');
            });

            // DataTable
            var table = $('#example').DataTable({
                responsive: true,
                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;

                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
            });
        });
        $(document).ready(function() {
            $('body').on('click', '#show-user', function() {

                var userURL = $(this).data('url');
                console.log(userURL)
                $.ajax({
                    url: userURL,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        $('#userShowModal').modal('show');
                        $('#user-id').text(data[0].name);
                        $('#user-name').text(data[0].mnumber);
                        $('#user-email').text(data[0].location);
                        if (data[0].review) {
                            $('#rev').text(data[0].review);
                        } else {
                            $('#rev').text("لا يوجد تقييم");
                        }
                    }
                });

            });

        });
        $(document).ready(function() {
            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');
                var data = JSON.parse($(this).val());
                $('#job_id').val(data['id']);
                $('#emp_id').val(data['user_id']);
                console.log(data);


            });
        });
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
@endsection
