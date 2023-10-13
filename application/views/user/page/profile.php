<!-- DataTales Example -->
<div class="container mt-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt="<?= $user['name']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9 p-2">
                    <p class="card-text"> Nama :  <?= $user['name']; ?></p>
                    <p class="card-text"> Email : <?= $user['email']; ?></p>
                    <p class="card-text"> Saldo : RP. <?= $user['saldo']; ?></p>
                    <p class="card-text"> Alamat : <?= $user['alamat']; ?></p>
                    <p class="card-text"> Kontak : <?= $user['kontak']; ?></p>
                    <p class="card-text">Member Sejak : <?= date('D, d M Y', $user['date_create']); ?></p>
                    <a href="<?= base_url('user/edit'); ?>" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>