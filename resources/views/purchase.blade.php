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
                                <th>Nomor Pembelian</th>
                                <th>Tanggal Pembelian</th>
                                <th>Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($purchase as $pcs)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $pcs->number }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pcs->date)->translatedFormat('l, d F Y') }}</td>
                                    <td class="text-center">
                                        @foreach ($pcs->detail as $item)
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

                                        <a class="btn btn-primary" href="/purchase_detail/{{ $pcs->id }}"><i
                                                class="fa fa-eye"></i></a>
                                        @if (auth()->user()->role != 4)
                                            <a class="btn btn-danger"
                                                onclick="dlt({{ $pcs->id }},'/purchase_hapus/{{ $pcs->id }}')"
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
