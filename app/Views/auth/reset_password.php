<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Reset Password</title>
</head>

<body>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <!-- Content -->
                <div class="col-md-4">
                    <!-- Card -->
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="card-title text-center mb-5">
                                <h4>Atur ulang akun Anda</h4>
                            </div>
                            <?= form_open('auth/reset') ?>
                            <div class="form-group">
                                <label for="nim">Nomor Induk Mahasiswa</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $user->nim ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Konfirmasi Password</label>
                                <input type="confirm_password" class="form-control" id="confirm_password" name="confirm_password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>

</html>