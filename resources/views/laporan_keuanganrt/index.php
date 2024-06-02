<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan Kas RT 44</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #000;
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: right;
        }
        th:nth-child(2), td:nth-child(2) {
            text-align: left;
        }
        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }
        .footer div {
            text-align: center;
        }
        .signature {
            margin-top: 60px;
            display: flex;
            justify-content: space-around;
        }
        .signature div {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LAPORAN KEUANGAN KAS RT 44</h1>
        <h2>BULAN JANUARI 2011</h2>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>URAIAN</th>
                    <th>DEBET</th>
                    <th>PENGELUARAN</th>
                    <th>SALDO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Define the financial data
                $data = [
                    ['Penerimaan saldo bulan Desember 2010', 546200, 0],
                    ['Penerimaan bulan Januari 2011', 1220000, 0],
                    ['Bayar sampah', 0, 300000],
                    ['Bayar ronda', 0, 300000],
                    ['Bayar UP', 0, 100000],
                    ['Bayar Kematian', 0, 190000],
                    ['Bayar fotocopy', 0, 15000],
                    ['Bayar operasional RW', 0, 70000],
                    ['Bayar operasional RT', 0, 60000],
                    ['Bayar Pulsa Pet. Ronda', 0, 12000],
                    ['Bayar Buku Dan Polpen', 0, 36800],
                    ['Bayar Posyandu', 0, 25000]
                ];

                // Initialize the initial balance and variables to store totals
                $initial_balance = 0;
                $total_debet = 0;
                $total_pengeluaran = 0;
                $saldo = 0;

                // Loop through the data and output the rows
                foreach ($data as $index => $item) {
                    $urutan = $index + 1;
                    $debet = $item[1];
                    $pengeluaran = $item[2];
                    $saldo = $saldo + $debet - $pengeluaran;

                    // Output the table row
                    echo "<tr>";
                    echo "<td>{$urutan}</td>";
                    echo "<td>{$item[0]}</td>";
                    echo "<td>" . number_format($debet, 0, ',', '.') . "</td>";
                    echo "<td>" . number_format($pengeluaran, 0, ',', '.') . "</td>";
                    echo "<td>" . number_format($saldo, 0, ',', '.') . "</td>";
                    echo "</tr>";

                    // Update totals
                    $total_debet += $debet;
                    $total_pengeluaran += $pengeluaran;
                }
                ?>
                <tr>
                    <td>JU</td>
                    <td>ML</td>
                    <td><?php echo number_format($total_debet, 0, ',', '.'); ?></td>
                    <td><?php echo number_format($total_pengeluaran, 0, ',', '.'); ?></td>
                    <td><?php echo number_format($saldo, 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            <div>Mengetahui<br>Ketua RT 44</div>
            <div>Subang, 30 Januari 2011<br>Bendahara RT 44</div>
        </div>
        <div class="signature">
            <div>JOJO SUHARJO Spd</div>
            <div>W A L U Y O</div>
        </div>
    </div>
</body>
</html>
