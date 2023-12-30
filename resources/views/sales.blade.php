@extends('main')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <h3 class="card-title">List {{ $judul }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nomor Penjualan</th>
                                <th>Tanggal Penjualan</th>
                                <th>Barang Yang Dijual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($sales as $sls)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $sls->number }}</td>
                                    <td>{{ \Carbon\Carbon::parse($sls->date)->translatedFormat('l, d F Y') }}</td>
                                    <td class="text-center">
                                        @foreach ($sls->detail as $item)
                                            <a href="#"
                                                class="mb-2 btn btn-success btn-sm btn-icon-split shadow-sm border-0"
                                                style="width: 200px">
                                                <span class="icon text-white-50 overlay dark p-1" style="display: grid">
                                                    {{ $item->qty }}
                                                </span>
                                                <span class="text"><strong>{{ $item->inventory->name }} </strong></span>
                                            </a><br>
                                        @endforeach
                                    </td>
                                    <td class="text-center">

                                        <a class="btn btn-primary" href="/sales_detail/{{ $sls->id }}"><i
                                                class="fa fa-eye"></i></a>
                                        @if (auth()->user()->role != 4)
                                            <a class="btn btn-danger"
                                                onclick="dlt({{ $sls->id }},'/sales_hapus/{{ $sls->id }}')"
                                                href="#"><i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
