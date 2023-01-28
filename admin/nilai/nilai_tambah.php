<div class="page-header">
    <h1>Tambah SubKriteria</h1>
</div>
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Nilai </h4>
                            </div>
  <div class="card-body">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" >
            <div class="form-group">
                <label>Nama Kriteria <span class="text-danger">*</span></label>
                <select  class="form-control" id="sel2" name="kode_kriteria" >
                <?php
            $rows = $db->get_results("SELECT * FROM tb_kriteria where kode_kriteria='3' OR kode_kriteria='5' OR kode_kriteria='2'");
            
            foreach($rows as $row):?>
                                                <option value="<?=$row->kode_kriteria?>"><?=$row->nama_kriteria?></option>
                                                <?php endforeach?>
                                            </select>
            </div>    
            <div class="form-group">
                <label>Nama Karyawan <span class="text-danger">*</span></label>
                <select  class="form-control" id="sel2" name="kode_alternatif" >
                <?php
            $rows = $db->get_results("SELECT * FROM tb_alternatif where hak_akses='karyawan'");
            
            foreach($rows as $row):?>
                                                <option value="<?=$row->kode_alternatif?>"><?=$row->nama_alternatif?></option>
                                                <?php endforeach?>
                                            </select>
            </div>        
                      
            <div class="form-group">
                <label>Penilaian 1 <span class="text-danger"></span></label>
                <input class="form-control" type="text" name="nilai1" value="0"/>
            </div> 
            <div class="form-group">
                <label>Penilaian 2 <span class="text-danger"></span></label>
                <input class="form-control" type="text" name="nilai2" value="0"/>
            </div> 
            <div class="form-group">
                <label>Penilaian 3 <span class="text-danger"></span></label>
                <input class="form-control" type="text" name="nilai3" value="0"/>
            </div> 
            <div class="form-group">
                <label>Penilaian 4 <span class="text-danger"></span></label>
                <input class="form-control" type="text" name="nilai4" value="0"/>
            </div> 
            <div class="form-group">
                <label>Penilaian 5 <span class="text-danger"></span></label>
                <input class="form-control" type="text" name="nilai5" value="0"/>
            </div> 
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=nilai/view"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>