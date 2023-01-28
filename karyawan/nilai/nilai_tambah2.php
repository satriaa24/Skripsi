<div class="page-header">
    <h1>Penilaian kreativitas</h1>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Nilai </h4>
        </div>
        <div class="card-body">
            <?php if($_POST) include'aksi.php'?>
            <form method="post">
                <input class="form-control" type="hidden" name="kode_kriteria" value="2" />
                <input class="form-control" type="hidden" name="kode_alternatif"
                    value="<?php echo $kode_alternatif2; ?>" />

                <div class="form-group">
                    <label> 1. Apa saja yang termasuk kedalam proses sikap pemikiran kreatif? <span
                            class="text-danger">*</span></label>
                    <select class="form-control" id="sel2" name="nilai1">

                        <option value="5">A.Sikap independent</option>
                        <option value="1">B.Proses meniru sesuatu</option>
                        <option value="1">C.Evaluasi dan implementasi</option>
                        <option value="1">D.pencarian masalah yang terjadi</option>

                    </select>
                </div>
                <div class="form-group">
                    <label> 2. Keterampilan generasi Abad 21, antara lain meliputi keterampilan …. <span
                            class="text-danger">*</span></label>
                    <select class="form-control" id="sel2" name="nilai2">
                        <option value="5">A.belajar dan keterampilan teknologi informasi dan komunikasi</option>
                        <option value="1">B.berinovasi, keterampilan mencari kerja</option>
                        <option value="1">C.sosial, keterampilan emosional</option>
                        <option value="1">D.intelektual dan keterampilan hidup</option>

                    </select>
                </div>
                <div class="form-group">
                    <label> 3. Salah satu penghambat Kreativitas adalah :<span class="text-danger">*</span></label>
                    <select class="form-control" id="sel2" name="nilai3">
                        <option value="5">A.Takut gagal</option>
                        <option value="1">B.Nekat </option>
                        <option value="1">C.Sabar</option>
                        <option value="1">D.Semangat</option>

                    </select>
                </div>
                <div class="form-group">
                    <label>4. Pernyataan paling benar tentang Inovasi adalah :<span class="text-danger">*</span></label>
                    <select class="form-control" id="sel2" name="nilai4">
                        <option value="1">A.Harus sebuah penemuan baru</option>
                        <option value="5">B.Sebuah pemikiran baru yang belum menemukan bentuk </option>
                        <option value="1">C.Sebuah ide baru yang telah dibuatkan hak paten</option>
                        <option value="1">D.Kreativitas yang terbukti manfaatnya dan diterima pasar</option>

                    </select>
                </div>
                <div class="form-group">
                    <label>5. Faktor-faktor personal dalam mendorong kita untuk dapat Berinovasi ,Kecuali<span
                            class="text-danger">*</span></label>
                    <select class="form-control" id="sel2" name="nilai5">
                        <option value="5">A.Adanya keinginan untuk mau menjadi Kreatif dan Berinovatif</option>
                        <option value="2">B.Adanya faktor pengalaman sebelumnya dalam berkreatif dan berinovatif</option>
                        <option value="2">C.Adanya keinginan untuk mau menanggung permasalahan yang di dapati</option>
                        <option value="1">D.Kemampuan sensitivitas</option>

                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="?page=nilai/view"><span
                            class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>