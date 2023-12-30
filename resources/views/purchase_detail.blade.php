@extends('main')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="card col-12">

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> No Pembelian : {{ $purchase->number }}
                                <small class="float-right">Tanggal:
                                    {{ \Carbon\Carbon::parse($purchase->date)->translatedFormat('l, d F Y') }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <br>


                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Banyaknya Barang</th>
                                <th>Total Harga Barang</th>
                                @if (auth()->user()->role != 4)
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($purchase->detail as $pcs)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $pcs->inventory->name }}</td>
                                    <td>{{ $pcs->qty }}</td>
                                    <td>Rp. {{ number_format($pcs->price, 0, ',', '.') }},-</td>

                                    @if (auth()->user()->role != 4)
                                        <td class="text-center">

                                            <a class="btn btn-primary" href="#" data-toggle="modal"
                                                data-target="#EditModal{{ $pcs->id }}"><i class="fa fa-edit"></i></a>

                                        </td>
                                    @endif

                                </tr>
                                {{-- start of edit modal --}}
                                <div class="modal fade" id="EditModal{{ $pcs->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                    {{ $judul }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="/purchase_detail_edit" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="name">Barang</label>
                                                                <input type="text" value="{{ $pcs->inventory->name }}"
                                                                    class="form-control" readonly>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $pcs->id }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="qty" class="form-label">Jumlah
                                                                    Barang</label>
                                                                <input type="number" min="1" name="qty"
                                                                    value="{{ $pcs->qty }}" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end of edit modal --}}
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total : </th>
                                <th>Rp.
                                    {{ number_format(\App\Models\Purchase_detail::where('purchase_id', $purchase->id)->pluck('price')->sum(),0,',','.') }},-
                                </th>
                                @if (auth()->user()->role != 4)
                                    <th></th>
                                @endif
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
@endsection
