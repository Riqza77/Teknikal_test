@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4 border-0" id="card-pembelian">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Pembelian</h6>
                    </div>
                    <div class="card-body">
                        <div class="error-form"></div>
                        <form action="/purchase_add" method="post" class="form-inventory">
                            @csrf
                            <input type="hidden" name="data_inventory" id="data_inventory">

                            <div class="form-group">
                                <label for="nama-pembeli">Nama Pembeli</label>
                                <input type="text" value="{{ auth()->user()->name }}" required name="nama_pembeli"
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inventory">Inventory</label>
                                <br>
                                <div class="input-group">
                                    <select class="form-control" id="inventory"
                                        aria-label="Example select with button addon" required>
                                        <option value="">Pilih Inventory</option>
                                        @foreach ($inventory as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary add-item-inventory" type="button"
                                            id="button-addon1">Tambah</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-success">
                                        <tr class="bg-dark text-white">
                                            <th scope="col">Opsi</th>
                                            <th scope="col">Kode Barang</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Harga Barang</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="7" class="item-kosong small" align="center">Belum ada Inventory
                                                yang ditambahkan.</td>
                                        </tr>
                                    </tbody>
                                    <tfoot style="display:none">
                                        <tr class="bg-light">
                                            <th colspan="7" class="text-left">Total Harga : <span class="grand-total"
                                                    style=" color: blue;"></span>

                                            </th>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let arrayInventory = [];
        $('.form-inventory .add-item-inventory').on('click', function(e) {
            let id = $('.form-inventory #inventory').val();
            if (!id) return alert('Kode Inventory tidak valid');
            if (arrayInventory.filter(item => item.id == id).length > 0) return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Data Inventory Sudah Dipilih!",
            });
            if (arrayInventory.length == 0) $('.form-inventory table tbody .item-kosong').hide();

            $.getJSON(`/inventory/${id}`, function(data, status, xhr) {
                let html = `
                <tr id="${data.id}">
                    <td><button data-code="${data.id}" type="button" class="btn-remove-inventory btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                    <td>${data.code}</td>
                    <td>${data.name}</td>
                    <td>Rp.${data.formatrp}</td>
                    <td width="100"><input data-price="${data.price}" data-stock="${data.stock}" data-id="${data.id}" type="number" class="form-control jumlah" value="1" min="1" /></td>
                    <td>Rp.${data.formatrp}</td>
                </tr>
                `;
                arrayInventory.push({
                    id: data.id,
                    jumlah: 1,
                    total: data.price
                });
                let grand_total = 0;
                arrayInventory.forEach(val => grand_total = grand_total + parseInt(val.total));


                $('.form-inventory table tbody').append(html)
                $('.form-inventory table tfoot').show();
                $('.form-inventory .grand-total').html(`<h4>Rp.${grand_total}</h4>`)
                $('.form-inventory #data_inventory').val(JSON.stringify(arrayInventory));
            })
        })

        $('.form-inventory table').on('click', '.btn-remove-inventory', function() {
            $(this).parent().parent().remove();
            let id = $(this).data('id');
            arrayInventory = arrayInventory.filter(e => e.id != id);
            $('.form-inventory #data_inventory').val(JSON.stringify(arrayInventory));
            countGrandTotal();
        })
        $('.form-inventory table').on('change', '.jumlah', function() {
            let id = $(this).data('id');
            let jumlah = $(this).val();
            let harga = $(this).data('price');
            let stock = $(this).data('stock');
            if (parseInt(jumlah) > parseInt(stock)) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Stok Tidak Mencukupi!"
                });
                $(this).val(stock);
                return;
            }
            let total = harga * jumlah;
            $(`.form-inventory #${id} td:last`).html(`Rp.${total}`)
            objIndex = arrayInventory.findIndex((obj => obj.id == id));
            arrayInventory[objIndex].jumlah = jumlah;
            arrayInventory[objIndex].total = total;
            countGrandTotal();

            $('.form-inventory #data_inventory').val(JSON.stringify(arrayInventory));
        })

        function countGrandTotal() {
            let grand_total = 0;
            arrayInventory.forEach(val => grand_total = grand_total + parseInt(val.total));
            if (grand_total <= 0) {
                $('.form-inventory table tfoot').hide();
                $('.form-inventory table tbody .item-kosong').show();
            }
            $('.form-inventory .grand-total').html(`<h4>Rp.${grand_total}</h4>`);


        }
    </script>
@endsection
