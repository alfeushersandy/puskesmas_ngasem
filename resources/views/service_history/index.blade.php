@extends('layouts.master')

@section('title')
    Historical Service
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Historical Service</li>
@endsection

@section('content')
<ul class="nav nav-tabs">
    <li role="presentation" class="active"> <a href="{{ route('service.history') }}">
        <span>History per item</span>
    </a></li>
    <li role="presentation"><a href="{{ route('service.allArmada') }}">
        <span>Total seluruh item</span>
    </a></li>
</ul>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <form action="" class="form-kode-kendaraan">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <label for="kode_produk" class="col-lg-2">kode Kendaraan</label>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <select class="form-control" id="kode_kendaraan" name="kode_kendaraan">
                                        @foreach ($member as $member)
                                            <option value="{{ $member->kode_member }}">{{ $member->kode_kabin }}</option>
                                        @endforeach
                                      </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="button" id="cari">Cari</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button  class="btn btn-danger btn-flat" type="button" onclick="notaBesar('Laporan Service')" id="cari">Cetak PDF</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered table-penjualan">
                    <thead>
                        <th>Tanggal</th>
                        <th>kode Permintaan</th>
                        <th>Nama Barang</th>
                        <th>jumlah</th>
                        <th>Total Harga</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('penjualan.detail')
@endsection

@push('scripts')
<script>
     let table, table1;

    // // function cari_otomatis(){
        
        $(function() {
                table = $('.table-penjualan').DataTable({
                order : [1, 'DESC'],
                responsive: true,
                processing: true,
                serverSide: false,
                autoWidth: false,
                data: [],
                columns: [
                    {data: 'tanggal'},
                    {data: 'kode_permintaan'},
                    {data: 'nama_barang'},
                    {data: 'jumlah'},
                    {data: 'biaya'},
                ],
            });
        });
        
    $("#cari").on("click", function (event) {
        let id = $('#kode_kendaraan').val();
        table.ajax.url("data/"+id);
        table.ajax.reload();
        });

    function showDetail(url) {
        $('#modal-detail').modal('show');

        table1.ajax.url(url);
        table1.ajax.reload();
    }

    

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

    function notaBesar(title) {
        let id = $('#kode_kendaraan').val();
        let url = "/service/laporan/"+id;
        popupCenter(url, title, 900, 675);
    }

    function popupCenter(url, title, w, h) {
        const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
        const dualScreenTop  = window.screenTop  !==  undefined ? window.screenTop  : window.screenY;

        const width  = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        const systemZoom = width / window.screen.availWidth;
        const left       = (width - w) / 2 / systemZoom + dualScreenLeft
        const top        = (height - h) / 2 / systemZoom + dualScreenTop
        const newWindow  = window.open(url, title, 
        `
            scrollbars=yes,
            width  = ${w / systemZoom}, 
            height = ${h / systemZoom}, 
            top    = ${top}, 
            left   = ${left}
        `
        );

        if (window.focus) newWindow.focus();
    }
   
</script>
@endpush