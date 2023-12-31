<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body md">
          <div class="container-fluid">
            <div class="text-center">
              <!-- <h1 class="h4 text-gray-900 mb-3">Joki</h1> -->
              
                <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" class="img-thumbnail"  style="min-height:150px;height:200px;" > 
            </div>
            <?php if ($this->session->flashdata('titleFlash')) : ?>
              <div class="alert alert-<?= $this->session->flashdata('colorFlash'); ?> alert-dismissible fade show m-3" role="alert">
                <strong><?= $this->session->flashdata('titleFlash'); ?>!</strong> <?= $this->session->flashdata('captionFlash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif ?>
            <div class="p-3">
              <form class="user" action="" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="inputEmail" name="inputEmail" placeholder="Enter Email Address..." value="<?= set_value('inputEmail'); ?>">
                  <?= form_error('inputEmail', '<div class="small text-danger ml-3">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="inputPassword" name="inputPassword" placeholder="Password">
                  <?= form_error('inputPassword', '<div class="small text-danger ml-3">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="showPassword">
                    <label class="custom-control-label" for="showPassword">Show Password</label>
                  </div>
                </div>
                <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-primary btn-user btn-block">Login</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/forgot_password'); ?>">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/registrasion'); ?>">Mendaftar Member</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('main'); ?>">Kembali Ke halaman Utama</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    no = 1;
    $('#showPassword').on('click', function() {
      if (no % 2 == 0) {
        // console.log('off');
        $('#inputPassword').attr('type', 'password');
      } else {
        // console.log('on');
        $('#inputPassword').attr('type', 'text');
      }
      no++;
    });
  });
</script>
