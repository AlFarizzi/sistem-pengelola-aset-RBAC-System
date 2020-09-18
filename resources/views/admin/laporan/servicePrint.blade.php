<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="file:///home/alfarizzi/Unduhan/dev/Aset3/public/assets/css/bootstrap.min.css" media="all">
    <title>Document</title>
</head>
<body>
    <div class="mt-5">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Service</th>
                 <th scope="col">Asset</th>
                <th scope="col">User</th>
                <th scope="col">Harga</th>
              </tr>
            </thead>
            <tbody>
            @forelse ($sp as $s)
                <tr>{{$s->asset->nama}} ({{$s->asset->no_asset}})
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$s->demage->demage}}</td>
                  <td>{{$s->asset->nama_asset}}</td>
                  <td>{{$s->user->nama}}</td>
                  <td>Rp.{{number_format($s->harga)}}</td>
                </tr>
            @empty
                <p class="text-center">Tidak Ada Data</p>
            @endforelse
        </tbody>


          </table>
    </div>
</body>
</html>