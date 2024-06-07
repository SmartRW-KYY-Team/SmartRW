<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Tidak Mampu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
            margin-top: 10px;
        }

        .header {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            position: absolute;
            height: auto;
            margin-right: 20px;
        }

        .header .header-text {
            text-align: center;
            flex-grow: 1;
        }

        .header .header-text h2,
        .header .header-text h3 {
            margin: 0;
        }

        .header .header-text p {
            margin: 5px 0;
        }

        .content {
            margin-top: 20px;
        }

        .table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        .table td {
            padding: 5px;
        }

        .footer {
            text-align: right;
            margin-top: 40px;
        }

        .footer img {
            width: 150px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/image/malang.png') }}" alt="Logo">
            <div class="header-text">
                <h3>PEMERINTAH KABUPATEN MALANG</h3>
                <h3>KECAMATAN LOWOKWARU</h3>
                <h3>KELURAHAN JATIMULYO</h3>
                <p>{{ $sktm->rt->nama }}, {{ $sktm->rw->nama }}, KELURAHAN JATIMULYO</p>
            </div>
        </div>
        <hr>
        <div class="text-center mb-4" style="text-align: center !important;">
            <h3>SURAT KETERANGAN TIDAK MAMPU (SKTM) </h3>
            @php
                $date = new \DateTime($sktm->updated_at);
                $formattedDate = $date->format('d/m/Y');
                [$day, $month, $year] = explode('/', $formattedDate);
            @endphp
            <p>Nomor Reg: SKTM {{ $sktm->id_suratSKTM }}/{{ $day }}/{{ $month }}/{{ $year }}</p>
        </div>
        <div class="content">
            <p class="text-justify">
                Yang bertanda tangan di bawah ini Kepala Desa Setempat Kecamatan Setempat Kabupaten Malang. Menerangkan
                dengan sebenar-benarnya bahwa orang tersebut di bawah ini:
            </p>
            <table class="table table-borderless">
                <tr>
                    <td>No. NIK</td>
                    <td>: {{ $sktm->pemohon->nik }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $sktm->pemohon->nama }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $sktm->rt->nama }}, {{ $sktm->rw->nama }}, Desa Jatimulyo</td>
                </tr>
            </table>
            <br>
            <p style="text-align: center;">
                Orang Tua dari anak:
            </p>
            <table class="table table-borderless">
                <tr>
                    <td>Nama</td>
                    <td>: {{ $sktm->nama_orang_tua }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: {{ $sktm->pekerjaan_orang_tua }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>: Rp. {{ $sktm->gaji_orang_tua }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $sktm->rt->nama }}, {{ $sktm->rw->nama }}, Desa Jatimulyo</td>
                </tr>
            </table>
            <p>
                Adalah benar-benar warga Desa Jatimulyo yang kehidupan ekonominya tergolong Keluarga Tidak Mampu /
                Miskin dan surat keterangan ini dipergunakan untuk {{ $sktm->keterangan }}
            </p>
            <p>
                Demikian surat keterangan tidak mampu ini dibuat dengan sebenar-benarnya dan untuk dipergunakan
                sebagaimana mestinya.
            </p>
        </div>
        <div class="footer">
            <p>Mengetahui</p>
            <p>Tgl {{ date('Y-m-d') }}</p>
            <div>
                <img src="{{ asset('assets/image/signature.png') }}" alt="Signature">
                <p>RW 4 Jatimulyo</p>
            </div>
        </div>
    </div>
</body>

</html>
