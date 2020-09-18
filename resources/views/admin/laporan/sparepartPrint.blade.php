<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/home/alfarizzi/Unduhan/dev/Aset3/public/assets/css/bootstrap.min.css" media="all">
    <title>Document</title>
</head>
<body>
    <div class="mt-5">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
              </tr>
            </thead>
            <tbody>
            @forelse ($sp as $s)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$s->nama}}</td>
                  <td>Rp.{{number_format($s->harga)}}</td>
                  <td>{{$s->jumlah}}</td>
                </tr>
            @empty
                <p class="text-center">Tidak Ada Data</p>
            @endforelse
        </tbody>


          </table>
    </div>
</body>
</html>