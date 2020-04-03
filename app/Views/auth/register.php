<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register Page</title>
</head>

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
                            <h4>Silahkan Daftar</h4>
                        </div>
                        <?= form_open('auth/register') ?>
                        <div class="form-group">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?= old('fullname') ?>">
                            <p class="small text-danger"><?= $validate->showError('fullname') ?></p>
                        </div>
                        <div class="form-group">
                            <label for="nim">Nomor Induk Mahasiswa</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= old('nim') ?>">
                            <p class="small text-danger"><?= $validate->showError('nim') ?></p>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?= old('address') ?>">
                            <p class="small text-danger"><?= $validate->showError('address') ?></p>
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor HP</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="<?= old('phone') ?>">
                            <p class="small text-danger"><?= $validate->showError('phone') ?></p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= old('email') ?>">
                            <p class="small text-danger"><?= $validate->showError('email') ?></p>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <p class="small text-danger"><?= $validate->showError('password') ?></p>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            <p class="small text-danger"><?= $validate->showError('confirm_password') ?></p>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                        <?= form_close() ?>
                        <div class="text-center mt-2">
                            <a href="<?= route_to('login') ?>" class="btn btn-outline-primary">Masuk</a>
                        </div>
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