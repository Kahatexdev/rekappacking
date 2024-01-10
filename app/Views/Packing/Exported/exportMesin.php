<!-- app/Views/pdf_template.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Selected Rows to PDF</title>
    <style>
        body {
            background-image: url('path/to/your/background-image.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
        }

        h2 {
            color: #fff;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Selected Rows Export</h2>

        <table>
            <tr>
                <th>Tanggal Produksi</th>
                <th>Bagian</th>
                <th>Storage Awal</th>
                <th>Storage Akhir</th>
                <th>Qty Produksi</th>
                <!-- Add more header columns as needed -->
            </tr>
            <?php foreach ($productionData as $row) : ?>
                <tr>
                    <td><?= $row['tgl_prod']; ?></td>
                    <td><?= $row['bagian']; ?></td>
                    <td><?= $row['storage_awal']; ?></td>
                    <td><?= $row['storage_akhir']; ?></td>
                    <td><?= $row['qty_prod']; ?></td>
                    <!-- Add more data columns as needed -->
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>