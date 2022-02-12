<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" style="box-shadow: 0 6.4px 14.4px 0 rgb(0 0 0 / 13%), 0 1.2px 3.6px 0 rgb(0 0 0 / 11%);">
        <div class="container">
            <a class="navbar-brand" href="#">QRcode & Barcode</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('home/index') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('home/mahasiswa') ?>">Data Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-5">
        <div class="row justify-content-center pt-5">
            <div class="col-md-12 col-12 p-4" style="box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">

                <a href="<?= site_url('home/pdfAll') ?>" class="btn btn-danger btn-sm">Cetak Semua Data</a>
                <a href="<?= site_url('home/dowloadAllImage') ?>" class="btn btn-success btn-sm">QRcode</a>
                <hr>
                <table class="table pt-4">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Tgl Lulus</th>
                            <th scope="col">No Ijazah</th>
                            <th scope="col">IPK</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $key => $data) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $data->npm ?></td>
                                <td><?= $data->nama_mhs ?></td>
                                <td><?= $data->prodi ?></td>
                                <td><?= $data->tgl_lulus ?></td>
                                <td><?= $data->no_ijazah ?></td>
                                <td><?= $data->ipk ?></td>
                                <td nowrap>
                                    <a href="<?= site_url('home/pdf/' . $data->id) ?>" class="btn btn-danger btn-sm">Cetak PDF</a>
                                    <a href="<?= site_url('home/qrcodeSingel/' . $data->id) ?>" class="btn btn-success btn-sm">QRcode</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>