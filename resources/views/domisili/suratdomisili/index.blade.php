<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan Domisili</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #000;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img.logo {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }

        .header-text {
            text-align: center;
            flex-grow: 1;
        }

        .header-text h2,
        .header-text h3,
        .header-text p {
            margin: 5px 0;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .title h2,
        .title p {
            margin: 5px 0;
        }

        .content p {
            text-align: justify;
            margin: 10px 0;
        }

        .center-table {
            margin: 0 auto 20px auto;
        }

        table td {
            padding: 5px;
        }

        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: flex-end;
        }

        .signature {
            text-align: center;
            width: 30%;
            position: relative;
        }

        .signature .sign {
            z-index: 1;
            margin-top: -20px;
        }

        .kopsurat {
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            margin-right: 100px;
        }

        .judul {
            text-align: center;
            line-height: 5px;
        }
    </style>
</head>

<body>

    <div class="kopsurat">
        <div class="header">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/image/malang.png') }}" alt="Logo" class="logo" />
                </div>
                <div class="col-md-8">
                    <div class="header-text">
                        <h2>PEMERINTAH KABUPATEN MALANG</h2>
                        <h3>KECAMATAN SETEMPAT</h3>
                        <h3>DESA SETEMPAT</h3>
                        <p>Alamat Desa Setempat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table width="100%" style="border-bottom: 3px solid #000; padding: 2px"></table>

    <div class="title">
        <h2>SURAT KETERANGAN DOMISILI</h2>
        <p>Nomor Reg : 000/0000/000.0.0.0/000</p>
    </div>

    <div class="content">
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Kepala Desa Setempat Kecamatan
            Setempat Kabupaten Malang. Menerangkan dengan sebenar-benarnya bahwa
            orang tersebut di bawah ini :
        </p>

        <table class="center-table">
            <tr>
                <td>Nama</td>
                <td>
                    {{ $domisili->pemohon->nama }}
                </td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>
                    {{ $domisili->pemohon->pekerjaan }}
            </tr>
            <tr>
                <td>Tempat / Tgl. Lahir</td>
                <td>
                    {{ $domisili->pemohon->tempat_lahir }},{{ $domisili->pemohon->tgl_lahir }}
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    {{ $domisili->pemohon->jenis_kelamin }}
            </tr>
            <tr>
                <td>No. NIK</td>
                <td>
                    {{ $domisili->pemohon->nik }}
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    {{ $domisili->rt->nama }}, {{ $domisili->rw->nama }},Desa Jatimulyo
                </td>
            </tr>
        </table>

        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adalah benar-benar warga kami yang berdomisili di RT
            {{ $domisili->rt_id }}
            RW {{ $domisili->rw_id }} Desa Jatimulyo Kecamatan setempat Kabupaten Malang. Surat Keterangan ini dibuat
            untuk {{ $domisili->keterangan }}
        </p>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat domisili ini dibuat
            dengan
            sebenar
            benarnya dan untuk dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <div class="footer">
        <div class="signature">
            <p>Mengetahui</p>
            <p>Tgl {{ date('Y-m-d') }}</p>
            <div class="sign"><img src="{{ asset('assets/image/signature.png') }}" width="150px" alt="Signature">
                <p>Kepala Desa setempat</p>
            </div>
        </div>
    </div>

</body>

</html>
