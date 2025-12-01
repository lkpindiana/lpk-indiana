<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .table_component {
        overflow: auto;
        width: 100%;
    }

    .table_component table {
        border: 1px solid #dededf;
        height: 100%;
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        border-spacing: 1px;
        text-align: center;
    }

    .table_component caption {
        caption-side: top;
        text-align: center;
    }

    .table_component th {
        border: 1px solid #dededf;
        background-color: #eceff1;
        color: #000000;
        padding: 5px;
    }

    .table_component td {
        border: 1px solid #dededf;
        background-color: #ffffff;
        color: #000000;
        padding: 5px;
    }
</style>

<body>
    <h1>Daftar Siswa</h1>
    <div class="table_component" role="region" tabindex="0">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $i => $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>{{ $row->telepon }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
