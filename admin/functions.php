<?php
error_reporting(~E_NOTICE);
session_start();

include'config.php';
include'includes/db.php';
include'includes/electre_class.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
    
$page = $_GET['page'];
$act = $_GET['act'];   
$sid = session_id();

$rows = $db->get_results("SELECT kode_alternatif, nama_alternatif FROM tb_alternatif ORDER BY kode_alternatif");
foreach($rows as $row){
    $ALT[$row->kode_alternatif] = $row->nama_alternatif;
} 

$rows = $db->get_results("SELECT kode_kriteria, nama_kriteria, bobot FROM tb_kriteria ORDER BY kode_kriteria");
foreach($rows as $row){
    $KRT[$row->kode_kriteria] = array(
        'nama_kriteria'=>$row->nama_kriteria,
        'bobot'=>$row->bobot
    );
}

function kode_oto($field, $table, $prefix, $length){
    global $db;
    $var = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");    
    if($var){
        return $prefix . substr( str_repeat('0', $length) . (substr($var, - $length) + 1), - $length );
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function set_value($key = null, $default = null){
    global $_POST;
    if(isset($_POST[$key]))
        return $_POST[$key];
        
    if(isset($_GET[$key]))
        return $_GET[$key];
        
    return $default;
}

function get_data(){
    global $db;
 
    $rows = $db->get_results("SELECT *
        FROM tb_relasi  ORDER BY kode_alternatif, kode_kriteria");
    $data = array();
    foreach($rows as $row){
        $data[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;
    }
    return $data;
}
function get_rank($array){
    $data = $array;
    arsort($data);
    $no=1;
    $new = array();
    foreach($data as $key => $value){
        $new[$key] = $no++;
    }
    return $new;
}
function esc_field($str){
    if (!get_magic_quotes_gpc())
        return addslashes($str);
    else
        return $str;
}

function redirect_js($url){
    echo '<script type="text/javascript">window.location.replace("'.$url.'");</script>';
}

function alert($url){
    echo '<script type="text/javascript">alert("'.$url.'");</script>';
}

function print_msg($msg, $type = 'danger'){
    echo('<div class="alert alert-'.$type.' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msg.'</div>');
}

$NILAI = array();
$NILAI = array();
$ATRIBUT_NILAI = array();
$rows = $db->get_results("SELECT kode_kriteria, id_subkriteria, nilai, nama_subkriteria FROM tb_subkriteria ORDER BY id_subkriteria");
foreach ($rows as $row) {
    $NILAI[$row->id_subkriteria] = $row;
    $ATRIBUT_NILAI[$row->kode_kriteria][$row->id_subkriteria] = $row->nilai;
}
function get_nilai_option($kode_kriteria, $selected = '')
{
    global $NILAI;
    $a = '';
    foreach ($NILAI as $key => $val) {
        if ($val->kode_kriteria == $kode_kriteria) {
            if ($selected == $key)
                $a .= "<option value='$val->bobot' selected>$val->nama_subkriteria |$val->bobot</option>";
            else
                $a .= "<option value='$val->bobot'>$val->nama_subkriteria|$val->bobot</option>";
        }
    }
    return $a;
}