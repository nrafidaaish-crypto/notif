<?php

interface MetodePembayaran
{
    public function bayar(string $akun, int $jumlah): void;
}

class PembayaranTransferBank implements MetodePembayaran
{
    public function bayar(string $akun, int $jumlah): void
    {
        echo "Transfer Bank dari rekening " . $akun . " sebesar Rp" . number_format($jumlah, 0, ',', '.') . " berhasil.\n";
    }
}

class PembayaranGoPay implements MetodePembayaran
{
    public function bayar(string $akun, int $jumlah): void
    {
        echo "GoPay atas nomor " . $akun . " sebesar Rp" . number_format($jumlah, 0, ',', '.') . " berhasil dibayar.\n";
    }
}

class PembayaranDana implements MetodePembayaran
{
    public function bayar(string $akun, int $jumlah): void
    {
        echo "DANA atas nomor " . $akun . " sebesar Rp" . number_format($jumlah, 0, ',', '.') . " berhasil dibayar.\n";
    }
}

class Kasir
{
    public function prosesBayar(MetodePembayaran $metode, string $akun, int $jumlah): void
    {
        $metode->bayar($akun, $jumlah);
    }
}

$kasir = new Kasir();

$bank = new PembayaranTransferBank();
$gopay = new PembayaranGoPay();
$dana = new PembayaranDana();

$kasir->prosesBayar($bank, "1234567890", 150000);
$kasir->prosesBayar($gopay, "08123456789", 45000);
$kasir->prosesBayar($dana, "08987654321", 20000);

?>
