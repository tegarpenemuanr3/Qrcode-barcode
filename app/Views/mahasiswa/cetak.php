<?php

function namaBulan($angka)
{
    switch ($angka) {
        case '1':
            $bulan = "Januari";
            break;
        case '2':
            $bulan = "Februari";
            break;
        case '3':
            $bulan = "Maret";
            break;
        case '4':
            $bulan = "April";
            break;
        case '5':
            $bulan = "Mei";
            break;
        case '6':
            $bulan = "Juni";
            break;
        case '7':
            $bulan = "Juli";
            break;
        case '8':
            $bulan = "Agustus";
            break;
        case '9':
            $bulan = "September";
        case '10':
            $bulan = "Oktober";
            break;
        case '11':
            $bulan = "November";
            break;
        case '12':
            $bulan = "Desember";
            break;
        default:
            $bulan = "Tidak ada bulan yang dipilih...";
            break;
    }

    return $bulan;
}

function tglIndonesia($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = namaBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Ijazah</title>
    <style type="text/css">
        body {
            font-family: Arial;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table border="6" cellpadding="20" cellspacing="0" width="100%">
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td colspan="3">
                            <center>
                                <img src="<?= base_url('assets/img/logo.png') ?>" width="90px">
                                <h1>UNIVERSITAS LURUILMU.COM</h1>
                                <p>Jl. Pulau Beringin Blok. B Pondok Kelapa Bengkulu Tengah</p>
                                <hr>
                                <br>
                                <p>Ijazah ini diberikan sebagai contoh saja, ya.. sekedar untuk ngetes pembuatan QR Code dan Contoh Validasinya.</p>
                                <p>Oke langsung saja, menerangkan bahwa: </p>

                                <h1><u><?php echo $mahasiswa->nama_mhs ?></u></h1>

                                <p>Berhak menjadi Contoh dalam Ijazah ini. Dan dapat dilakukan tes lebih lanjut untuk mencoba mencetak ijazah ini dan memvalidasi dengan QR Code yang tersedia.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="<?= base_url("img/" . $mahasiswa->npm . ".png") ?>" height="120px"></td>
                        <td></td>
                        <td width="300px">
                            <p>Pulau Beringin, <?php echo tglIndonesia(date('Y-m-d')); ?><br />
                                Pengesah Ijazah,</p>
                            <br />
                            <br />
                            <br />
                            <p><b>LURUILMU.COM</b></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <center><a href="#" class="no-print" onclick="window.print();">Cetak/Print</a></center>
</body>

</html>