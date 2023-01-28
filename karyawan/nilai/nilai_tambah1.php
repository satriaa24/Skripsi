<div class="page-header">
    <h1>Penilaian Bekerja Sama Dalam Team</h1>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Nilai </h4>
        </div>
        <div class="card-body">
            <?php if($_POST) include'aksi.php'?>
            <form method="post">
                <input class="form-control" type="hidden" name="kode_kriteria" value="5" />
                <input class="form-control" type="hidden" name="kode_alternatif"
                    value="<?php echo $kode_alternatif2; ?>" />

                <div class="form-group">
                    <label> 1. Dalam sebuah kelompok kerja, Anda memiliki tujuh anggota kelompok.
                        Di antara seluruh anggota kelompok tersebut ada salah seorang anggota yang selalu menjadi
                        penghalang dalam menyelesaikan tugas-tugas yang diberikan perusahaan.
                        Apa yang seharusnya Anda lakukan? <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel1" name="nilai1">

                        <option value="1">A.Melaporkannya pada pimpinan perusahaan</option>
                        <option value="5">B.Memaklumi bahwa itulah dinamika yang terjadi dalam satu kelompok</option>
                        <option value="1">C.Gerak langkah orang tersebut perlu diperhatikan dan diwaspadai</option>
                        <option value="1">D.Orang tersebut harus segera disingkirkan dari kelompok</option>

                    </select>
                </div>
                <div class="form-group">
                    <label> 2. Anda harus bekerja dalam suatu tim yang sebagian besar anggotanya tidak sesuai dengan harapan Anda. Bagaimana Anda akan bekerja? <span class="text-danger">*</span></label>
                    <select class="form-control" id="sel2" name="nilai2">
                        <option value="1">A.Bekerja dengan setengah hati karena itu bukanlah tim yang Anda harapkan</option>
                        <option value="1">B.Menerima segala kekurangan dan kelebihan setiap anggota tim</option>
                        <option value="5">C.Berusaha bekerja dengan profesional</option>
                        <option value="1">D.Mengajak anggota tim untuk lebih kompak dalam menyelesaikan tugas</option>

                    </select>
                </div>
                <div class="form-group">
                    <label> 3. Dalam bekerja saya senang mempunyai teman yang.....<span class="text-danger">*</span></label>
                    <select class="form-control" id="sel3" name="nilai3">
                        <option value="1">A.Banyak membantu saya</option>
                        <option value="5">B.Memacu saya untuk menjadi lebih baik </option>
                        <option value="1">C.Baik kepada saya</option>
                        <option value="1">D.Mengerti tugasnya</option>

                    </select>
                </div>
                <div class="form-group">
                    <label>4. Saya ditempatkan dalam sebuah kelompok kerja bersama dengan rekan kerja yang tidak saya sukai secara pribadi. Yang saya lakukan....<span class="text-danger">*</span></label>
                    <select class="form-control" id="sel4" name="nilai4">
                        <option value="1">A.Membuat kesepakatan untuk membagi pekerjaan dan mengerjakannya masing-masing</option>
                        <option value="1">B.Bekerja malas-malasan supaya dipindahkan ke tim yang lain </option>
                        <option value="1">C.Tetap menjalankan pekerjaan dengan baik dan profesional</option>
                        <option value="5">D.Menjalankan pekerjaan dengan baik dan mencoba untuk memperbaiki komunikasi dengannya</option>

                    </select>
                </div>
                <div class="form-group">
                    <label>5. Rekan kerja yang paling baik menurut saya adalah rekan kerja yang mampu<span class="text-danger">*</span></label>
                    <select class="form-control" id="sel5" name="nilai5">
                        <option value="1">A.Mengikuti segala langkah yang saya ambil</option>
                        <option value="1">B.Membimbing dan mengingatkan saya </option>
                        <option value="1">C.Memberikan ide yang segar kepada saya</option>
                        <option value="5">D.Saling mengerti dan melengkapi dengan saya</option>

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