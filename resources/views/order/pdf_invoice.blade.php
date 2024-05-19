<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <h2 style="text-align: center">Pembayaran Domain</h2>
    <h6 class="mb-3">No Invoice : {{ $data->invoice }}</h6>
    <h6>Status : {{ $data->status }}</h6>
    <h6>Nama : {{ $data->name }}</h6>
    <h6 class="mb-3">Email : {{ $data->email }}</h6>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>Pembelian Domain {{ $data->domain }}</td>
                <td>Rp.{{ $data->total }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" style="text-align: center;">Total</th>
                <th style="text-align: left;">Rp.{{ $data->total }}</th>
            </tr>
        </tfoot>
    </table>
    <div class="text-center" style="margin-top: 10px">
        <h6>Silahkan Bayar di no rekening berikut ini : </h6>
        <h6>123456789101112</h6>
    </div>

</body>

</html>
