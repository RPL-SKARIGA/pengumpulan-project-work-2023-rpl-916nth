<?php

function tanggal($tgl){

    $bulan = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des');

    //2017-12-05
    //012345678
    $tg = substr($tgl,8,2);
    $bl = substr($tgl,5,2);
    $th = substr($tgl,0,4);

    return $tg.''.$bulan[(int)$bl].''.$th;

}

?>