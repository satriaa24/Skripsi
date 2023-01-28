<?php
    $row = $db->get_row("SELECT * FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'"); 
?>
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ubah Kriteria (<?=set_value('nama', $row->nama_kriteria)?>)</h4>
                            </div>
  <div class="card-body">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
           <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?=$row->kode_kriteria?>" readonly/>
            </div>
            <div class="form-group">
                <label>Nama Kriteria<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=set_value('nama', $row->nama_kriteria)?>"/>
            </div>
            <div class="form-group">
                <label>Bobot <span class="text-danger"></span></label>
               <input class="form-control" type="text" name="bobot" value="<?=set_value('bobot', $row->bobot)?>"/>
            </div>    
            <div class="form-group">
                <label>Jenis <span class="text-danger">*</span></label>
                <select  class="form-control" id="sel2" name="jenis" >
                                                <option value="<?=set_value('jenis', $row->jenis)?>"><?=set_value('jenis', $row->jenis)?></option>
                                                <option value="benefit">benefit</option>
                                                <option value="cost">cost</option>
                                            </select>
            </div>        
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=kriteria"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>
</div>