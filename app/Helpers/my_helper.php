<?php
if(!function_exists('remove_time_from_date')) {
    function remove_time_from_date($date){
        $temp = explode(' ', $date);

        return $temp[0];
    }
}

if(!function_exists('change_format_date_with_month')) {
    function change_format_date_with_month($date, $pemisah = '-'){
        $temp = explode('-', $date);
        $tanggal = $temp[2];
        $tahun = $temp[0];

        switch($temp[1]){
            case 1:
                $bulan = 'January';
                break;
            case 2:
                $bulan = 'February';
                break;
            case 3:
                $bulan = 'March';
                break;
            case 4:
                $bulan = 'April';
                break;
            case 5:
                $bulan = 'May';
                break;
            case 6:
                $bulan = 'June';
                break;
            case 7:
                $bulan = 'July';
                break;
            case 8:
                $bulan = 'August';
                break;
            case 9:
                $bulan = 'September';
                break;
            case 10:
                $bulan = 'October';
                break;
            case 11:
                $bulan = 'November';
                break;
            default:
                $bulan = 'december';
                break;
        }

        return $tanggal . $pemisah . $bulan . $pemisah . $tahun;
    }
}

if(!function_exists('change_format_date_with_month_to_url')) {
    function change_format_date_with_month_to_url($date, $pemisah = '/'){
        $temp = explode('-', $date);
        $tanggal = $temp[2];
        $bulan = $temp[1];
        $tahun = $temp[0];

        return $tanggal . $pemisah . $bulan . $pemisah . $tahun . $pemisah;
    }
}



if(!function_exists('youtube_embed_generator')) {
    function youtube_embed_generator($data, $width = 420, $height = 315, $class = '', $allow = ''){
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe class=\"$class\" width=\"$width\" height=\"$height\" src=\"//www.youtube.com/embed/$1\" allow=\"$allow\" frameborder=\"0\" allowfullscreen></iframe>",$data);
    }
}
if(!function_exists('limit_word')) {
    function limit_word($data, $limit) {
        return preg_replace('/((\w+\W*){'.($limit-1).'}(\w+))(.*)/', '${1}', strip_tags(html_entity_decode($data)));   
    }
}
if(!function_exists('xss')) {
    function xss($data){
        $clean = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', htmlspecialchars(strip_tags($data)));

        return $clean;
    }
}

if(!function_exists('meta_tag')) {
    function meta_tag($data){
        $clean = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', substr(strip_tags(html_entity_decode($data)), 0, 200));

        return $clean;
    }
}

if(!function_exists('cekUser')) {
    function cekUser(){
        if(!is_null(session()->get('id'))){ 
            return redirect()->to('/');  
        }
    }
}

if(!function_exists('hitung_umur')) {
    function hitung_umur($tanggal_lahir){
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) { 
            exit("0 tahun 0 bulan 0 hari");
        }
        
        $y = $today->diff($birthDate)->y;

        return $y;
    }
}