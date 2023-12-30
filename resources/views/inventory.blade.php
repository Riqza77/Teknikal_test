@extends('main')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <h3 class="card-title">List Data {{ $judul }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <button type="button" class="btn btn-primary mb-3" onclick="rankode()" data-toggle="modal"
                        data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Tambah Data
                        {{ $judul }}</button>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Stok Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($inventory as $inv)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $inv->code }}</td>
                                    <td>{{ $inv->name }}</td>
                                    <td>Rp. {{ number_format($inv->price, 0, ',', '.') }},-</td>
                                    <td>{{ $inv->stock }}</td>

                                    <td class="text-center">

                                        <a class="btn btn-primary" href="#" data-toggle="modal"
                                            data-target="#EditModal{{ $inv->id }}" onclick="editprice()"><i
                                                class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger"
                                            onclick="dlt({{ $inv->id }},'/inventory_hapus/{{ $inv->id }}')"
                                            href="#"><i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    {{-- start of edit modal --}}
                                    <div class="modal fade" id="EditModal{{ $inv->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                        {{ $judul }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="/inventory_edit" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="code">Kode Barang</label>
                                                                    <input type="text" name="code"
                                                                        value="{{ $inv->code }}" class="form-control"
                                                                        readonly>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $inv->id }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Nama
                                                                        Barang</label>
                                                                    <input type="text" name="name"
                                                                        value="{{ $inv->name }}" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="price" class="form-label">Harga
                                                                        Barang</label>
                                                                    <input type="text" name="price"
                                                                        id="e_price{{ $inv->id }}"
                                                                        value="Rp. {{ number_format($inv->price, 0, ',', '.') }}"
                                                                        class="form-control" autocomplete="off" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="stock" class="form-label">Stok
                                                                        Barang</label>
                                                                    <input type="number" name="stock"
                                                                        value="{{ $inv->stock }}" class="form-control" />
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data {{ $judul }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>

                        <form action="/inventory" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="code">Kode Barang</label>
                                            <div class="row">
                                                <input type="text" name="code" id="code"
                                                    value="{{ old('code') }}" class="form-control col-sm-10 ml-2 mr-2"
                                                    readonly>
                                                <i class="fas fa-sync col-sm-1 mt-2" onclick="rankode()"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama
                                                Barang</label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="form-label">Harga
                                                Barang</label>
                                            <input type="text" name="price" id="price"
                                                value="{{ old('price') }}" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="stock" class="form-label">Stok
                                                Barang</label>
                                            <input type="number" name="stock" value="{{ old('stock') }}"
                                                class="form-control" required />
                                        </div>


                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function rankode() {
            addprice();
            const length = 20;
            const kode = document.getElementById('code');
            let result = '';
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < length) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
            }
            return kode.value = result;
        }

        function editprice() {
            let rupiah = document.getElementById("e_price");
            rupiah.addEventListener('keyup', function(e) {
                rupiah.value = formatRupiah(this.value, 'Rp.');
            });
        }
    </script>
@endsection
