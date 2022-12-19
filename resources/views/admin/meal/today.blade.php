@extends('admin.layout.master')

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h3 class="text-info text-center pd-10"><u>Today's Meal</u></h3>
                <h5 class="text-secondary text-center pd-5">Date:{{ Carbon\Carbon::now()->format('d/m/Y') }}</h5>

                <table class="table hover data-table-export nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Id</th>
                            <th>Breafast<br>Quantity</th>
                            <th>Lunch<br>Quantity</th>
                            <th>Dinner<br>Quantity</th>
                            <th>Total</th>
                            <th>Comment</th>
                            {{-- <th>Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meals as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->student_id }}</td>
                                <td>{{ $item->breakfast_quantity }}</td>
                                <td>{{ $item->lunch_quantity }}</td>
                                <td>{{ $item->dinner_quantity }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->comments }}</td>
                                {{-- <td>
                                    @if ($item->status == 0)
                                        <a href="{{ url('booked-meal/status/1') }}/{{ $item->id }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-ban"></i></a>
                                    @elseif($item->status == 1)
                                        <a href="{{ url('booked-meal/status/0') }}/{{ $item->id }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    @endif
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="text-center text-white bg-secondary pd-5">Total <i class="icon-copy fa fa-mail-forward"
                        aria-hidden="true"></i> Breakfast: {{ $total_breakfast }} Lunch: {{ $total_lunch }} Dinner:
                    {{ $total_dinner }}</p>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- buttons for Export datatable -->
    <script src="{{ asset('src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js') }}"></script>
    <!-- Datatable Setting js -->
    <script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>
    </body>
@endpush
