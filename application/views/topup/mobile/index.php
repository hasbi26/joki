<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?=base_url()?>assets\logo\favicon.ico">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/mobile/style.css">
	<link rel="preload" href="NATS.woff2" as="font" type="<?= base_url(); ?>/font/woff2" crossorigin>


	<style>

#searchInputContainer {
  display: flex;
  align-items: center;
}
.logo {
            text-align: center; /* Mengatur posisi tengah */
            /* text-align: right; // Mengatur posisi kanan */
            /* text-align: left; // Mengatur posisi kiri */
			margin-top : 30px;
			margin-bottom : 30px;
        }

        .logo img {
            max-width: 25%; /* Mengatur lebar maksimum gambar */
            height: auto; /* Mengatur ketinggian gambar sesuai proporsi */
        }


        footer a {

padding : 10px;

}



	</style>


	<title>Rideline</title>

</head>



<body>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  <nav class="navbar navbar-light bg-light justify-content-between">
  <img src="<?= base_url()?>assets\logo\logo.png" width="70" height="auto" class="d-inline-block align-top" alt="">

  <div class="d-inline-block align-top" alt="" style="margin-right: 20px;">
   <!-- <a href="auth"> <img src="<?= base_url()?>assets\logo\log-in.png" width="40" height="auto">
      </a> -->
      Saldo Rp. <?= $user['saldo']; ?>
<div>

</nav>



	<section class="container">



		<ul class="kategori_menu">
			<li class="active">
				<a href="#" >Saldo</a>
			</li>
		</ul>


        Lakukan Transfer Ke No Berikut


   













		<div class="row product-grid"></div>
	</section>




	<script src="<?= base_url(); ?>assets/js/jquery-3.6.3.min.js"></script>
	<!-- <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script> -->


    
<script>
  $(document).ready(function() {
    $('.form-group button[type=submit]').removeAttr('disabled', '');
    $('#fileInput').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
      valName();
    });

    $('input[name=name]').on('keyup', function() {
      valName();
    });

    function valName() {
      if ($('input[name=name]').val().length < 4) {
        $('.form-group button[type=submit]').attr('disabled', '');
        $('#p1').removeAttr('hidden', '');
        $('input[name=name]').attr('class', 'form-control border border-danger');
      } else {
        $('.form-group button[type=submit]').removeAttr('disabled', '');
        $('#p1').attr('hidden', '');
        $('input[name=name]').attr('class', 'form-control border border-success');
      }
    }
  });
</script>

</body>

</html>
