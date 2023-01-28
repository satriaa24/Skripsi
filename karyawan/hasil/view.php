<?php
error_reporting(0);
    $row = $db->get_results("SELECT nilai FROM tb_relasi where nilai is null ");
    if (!$ALT || !$KRT):
        echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
    elseif ($row):
        echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Alternatif</strong>.";
    else:
?>

<div class="row">                  
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Perhitungan Electre</h4>
                            </div>
                            <?php        
$data = get_data();
$bobot = array();
foreach($KRT as $key => $val){
    $bobot[$key] = $val['bobot'];
}
$electre = new Electre($data, $bobot);
?>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home8">
                                            <span>
                                               Data
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile8">
                                            <span>
                                            Matriks R (Normalisasi)
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages8">
                                            <span>
                                            Matriks V (Normalisasi Terbobot)
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages9">
                                            <span>
                                            Concordance
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages10">
                                            <span>
                                            Disordance
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages11">
                                            <span>
                                            Matriks Concordance
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages12">
                                            <span>
                                            Matriks Discordance
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages13">
                                            <span>
                                            Matriks Dominan Concordance
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages14">
                                            <span>
                                            Matriks Dominan Discordance
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages15">
                                            <span>
                                            Agregate Dominance Matrix E
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane fade show active" id="home8" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
            <thead><tr align="center">
                <th align="center">Nama Karyawan</th>
                <?php foreach($electre->kriteria as $key => $val):?>
                <th><?=$KRT[$key]['nama_kriteria']?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($data as $key => $val):?>
            <tr align="center">
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$v?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile8" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
            <thead><tr align="center">
            <th>Nama Karyawan</th>
                <?php foreach($electre->kriteria as $key => $val):?>
                <th><?=$KRT[$key]['nama_kriteria']?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->normal as $key => $val):?>
            <tr align="center">
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=round($v, 4)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="messages8" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
            <thead><tr align="center">
            <th>Nama Karyawan</th>
                <?php foreach($electre->kriteria as $key => $val):?>
                <th><?=$KRT[$key]['nama_kriteria']?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->terbobot as $key => $val):?>
            <tr align="center">
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=round($v, 4)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
                                        </div>
                                    </div>

<!-- 4 -->
<div class="tab-pane fade" id="messages9" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
        <thead><tr align="center">
                <th>Nama Karyawan</th>
                <?php foreach($electre->concordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->concordance as $key => $val):?>
            <tr align="center">
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : implode(', ', $v)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
                                        </div>
                                    </div>
<!-- 4 -->
<!-- 5 -->
<div class="tab-pane fade" id="messages10" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
        <thead><tr align="center">
                <th>Nama Karyawan</th>
                <?php foreach($electre->discordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->discordance as $key => $val):?>
            <tr align="center">
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : implode(', ', $v)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
                                        </div>
                                    </div>
<!-- 5 -->
<!-- 6 -->
<div class="tab-pane fade" id="messages11" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
        <thead><tr align="center">
                <th>Nama Karyawan</th>
                <?php foreach($electre->m_concordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->m_concordance as $key => $val):?>
            <tr align="center">
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : $v?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
                                        </div>
                                    </div>
<!-- 6 -->
<!-- 7 -->
<div class="tab-pane fade" id="messages12" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
        <thead><tr align="center">
                <th>Nama Karyawan</th>
                <?php foreach($electre->m_discordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->m_discordance as $key => $val):?>
            <tr align="center">
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : round($v, 4)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
                                        </div>
                                    </div>
<!-- 7 -->
<!-- 8 -->
<div class="tab-pane fade" id="messages13" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
        <thead><tr align="center">
                <th>Nama Karyawan</th>
                <?php foreach($electre->md_concordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->md_concordance as $key => $val):?>
            <tr align="center">
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : $v?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
                                        </div>
                                    </div>
<!-- 8 -->
<!-- 9 -->
<div class="tab-pane fade" id="messages14" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
        <thead><tr align="center">
                <th>Nama Karyawan</th>
                <?php foreach($electre->md_discordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->md_discordance as $key => $val):?>
            <tr align="center">
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : round($v, 4)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
                                        </div>
                                    </div>
<!-- 9 -->
<!-- 10 -->
<div class="tab-pane fade" id="messages15" role="tabpanel">
                                        <div class="pt-4">
                                        <div class="table-responsive">
        <table class="table header-border table-responsive-sm"> 
        <thead>
                      <tr align="center">
                        <th>Nama Karyawan</th>
                            <?php $rank = get_rank($electre->total); foreach($rank as $key => $val):?>
                          <th><?=$ALT[$key]?></th>
                        <?php endforeach?> 
                        <th>Total</th>
                        <th>Peringkat</th>
                      </tr>
                    </thead>
                    <?php
                        $rank = get_rank($electre->total);
                    foreach($rank as $key => $val):
                    $total_hasil+=$electre->total[$key];
                        ?> 
                      <tr align="center">
                        <td><?=$ALT[$key]?></td>
                        <?php foreach($electre->agregate[$key] as $k => $v):?>
                        <td><?=$key==$k ? '-' : round($v, 4)?></td>
                        <?php endforeach?>
                        <td><?=$electre->total[$key]?></td>
                        <td><?=$rank[$key]?></td>
                      </tr>
                    <?php 
                echo $total_hasil;
                endforeach;?>
                    <thead>
                             <tr align="center" bgcolor="bg-secondary">
                                <th scope="col"></th>
                                <th scope="col" >Total</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <!-- <th scope="col"></th> -->
                                <th scope="col"></th>
                                <th scope="col"><?php echo $total_hasil; ?></th>
                                
                            </tr>
                        </thead>
        </table>
        <?php
                        $hasil_akhir = ($total_hasil/$rank[$key])*1;
                    ?>
                    <h3>Menghitung Akurasi Metode Electre</h3>
                    <h4>(Total Hasil / Jumlah Data) X 100%</h4>
                    <h4>( <?php echo $total_hasil." / ".$rank[$key]; ?> ) X 100% = <?php echo round($hasil_akhir,2)."%"; ?></h4> 
                    <h3>Perhitungan Akurasi Di Ambil Dari Jurnal SIMESTRIS, Vol 9 NO 1 April 2018</h3>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php endif; ?>