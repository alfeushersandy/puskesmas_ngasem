<div class="modal fade" id="modal-aset-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-aset">
            @csrf
            @method('post');
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group-row">
                            <input type="hidden" name="id_mobilisasi" id="id_mobilisasi" value="{{ $id_mobilisasi }}">
                            <input type="hidden" name="id_aset" id="id_aset">
                            <input type="text" class="form-control" name="kode_member1" id="kode_member1" readonly>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="user" class="col-lg-2 col-lg-offset-1 control-label">User / Operator</label>
                        <div class="col-lg-6">
                        <input type="text" name="user" id="user" class="form-control datepicker"
                                style="border-radius: 0 !important;">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_awal" class="col-lg-2 col-lg-offset-1 control-label">Tanggal Awal</label>
                        <div class="col-lg-6">
                            <input type="date" value="{{ date('Y-m-d') }}" name="tanggal_awal" id="tanggal_awal" class="form-control datepicker" required autofocus
                                style="border-radius: 0 !important;">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_akhir" class="col-lg-2 col-lg-offset-1 control-label">Tanggal Akhir</label>
                        <div class="col-lg-6">
                            <input type="date" value="{{ date('Y-m-d') }}" name="tanggal_akhir" id="tanggal_akhir" class="form-control datepicker" required autofocus
                                style="border-radius: 0 !important;">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>