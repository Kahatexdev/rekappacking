<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <style>
        body {

            font-family: Arial, sans-serif;
        }

        .container {
            padding: 5px;
        }

        h2 {
            color: black;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 2px;
            text-align: center;
        }

        th {
            background-color: white;
            color: black;
            text-align: center;
            text-decoration: solid;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Export data Produksi Mesin</h2>
        <img src="/bg2.png" alt="">
        <table>
            <tr>
                <th>Tanggal Produksi</th>
                <th>Bagian</th>
                <th>PDK</th>
                <th>Inisial</th>
                <th>Style</th>
                <th>Colour</th>
                <th>Qty Prod</th>
                <th>BS Prod</th>
                <th>No Box</th>
                <th>No Label</th>
                <!-- Add more header columns as needed -->
            </tr>
            <?php foreach ($dataProd as $row) : ?>
                <tr>
                    <td><?= $row['tgl_prod']; ?></td>
                    <td><?= $row['bagian']; ?></td>
                    <td><?= $row['no_model']; ?></td>
                    <td><?= $row['inisial']; ?></td>
                    <td><?= $row['style']; ?></td>
                    <td><?= $row['colour']; ?></td>
                    <td><?= $row['qty_prod'] ?></td>
                    <td><?= $row['bs_prod'] ?></td>
                    <td><?= $row['no_box'] ?></td>
                    <td><?= $row['no_label'] ?></td>
                    <!-- Add more data columns as needed -->
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html