<?php
// File: functions.php

// Fungsi escape biar aman dari XSS
function e($data) {
    return htmlspecialchars($data ?? '', ENT_QUOTES, 'UTF-8');
}

// Sanitasi dasar
function sanitize($data) {
    return trim($data ?? '');
}

// Validasi Nama: min 3 karakter
function validasiNama($nama) {
    if(empty($nama)) return 'Nama wajib diisi';
    if(mb_strlen($nama) < 3) return 'Nama minimal 3 karakter';
    return '';
}

// Validasi NIM: 8-15 digit angka
function validasiNIM($nim) {
    if(empty($nim)) return 'NIM wajib diisi';
    if(!preg_match('/^[0-9]{8,15}$/', $nim)) return 'NIM harus 8-15 digit angka';
    return '';
}

// Validasi Email
function validasiEmail($email) {
    if(empty($email)) return 'Email wajib diisi';
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return 'Format email tidak valid';
    return '';
}

// Validasi Pilihan: harus ada di array yang diizinkan
function validasiPilihan($data, $daftar, $label) {
    if(empty($data)) return "$label wajib dipilih";
    if(!in_array($data, $daftar)) return "$label tidak valid";
    return '';
}

// Validasi Jumlah: 1-3
function validasiJumlah($jumlah) {
    if(empty($jumlah)) return 'Jumlah peserta wajib diisi';
    if(!is_numeric($jumlah) || $jumlah < 1 || $jumlah > 3) return 'Jumlah peserta harus 1-3';
    return '';
}

// Validasi Persetujuan: harus dicentang
function validasiPersetujuan($setuju) {
    if(empty($setuju)) return 'Anda wajib menyetujui ketentuan';
    return '';
}
?>