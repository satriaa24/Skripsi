<?php
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah nilai bobot &raquo; <small><?=$row->nama_alternatif?></small></h1>
</div>
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ubah/Tambah nilai bobot &raquo; <small><?=$row->nama_alternatif?></h4>
                            </div>
  <div class="card-body">
		<?php if($_POST) include 'aksi.php'?>
		<form method="post">
			<?php
			$rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria,ra.nilai FROM tb_relasi ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  WHERE kode_alternatif='$_GET[ID]' ORDER BY kode_kriteria");
			foreach($rows as $row):?>
			<div class="form-group">
			    <label><?=$row->nama_kriteria?></label>    
			    <input class="form-control" type="text" name="ID-<?=$row->ID?>" value="<?=$row->nilai?>"/>
			</div>
			<?php endforeach?>
			<button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
			<a class="btn btn-danger" href="?page=penilaian/view"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
		</form>
	</div>
</div>
</div>