<div class="page-header">
    <h1>Tambah Kriteria</h1>
</div>
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Kriteria </h4>
                            </div>
  <div class="card-body">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?page=kriteria/kriteria_tambah">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?=set_value('kode', kode_oto('kode_kriteria', 'tb_kriteria', '15', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Nama Kriteria<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=set_value('nama')?>"/>
            </div>             
            <div class="form-group">
                <label>Bobot <span class="text-danger"></span></label>
                <input class="form-control" type="text" name="bobot" value="<?=set_value('bobot')?>"/>
            </div>           
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=kriteria/view"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>