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
  <!-- <a class="navbar-brand">Joki</a> -->
  <img src="<?= base_url()?>assets\logo\logo.png" width="70" height="auto" class="d-inline-block align-top" alt="">

  <div class="d-inline-block align-top" alt="" style="margin-right: 10;">
   <!-- <a href="auth"> <img src="<?= base_url()?>assets\logo\log-in.png" width="40" height="auto">
      </a> -->

      <div class="col-sm-3">
      <!--  -->
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
      Saldo Rp. <?= $user['saldo']; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="user">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="auth/logout">Logout</a></li>
          </ul>

          <!-- <div class="d-inline-block align-top" alt="" style="margin-right: 20px;"> -->
   <!-- <a href="auth"> <img src="<?= base_url()?>assets\logo\log-in.png" width="40" height="auto">
      </a> -->
<div>



                    <!-- <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt="" width="40" height="auto" > -->
       </div>
<div>
</nav>



	<section class="container">

<img src="<?= base_url()?>assets\logo\banner1.png"  style="height:180; margin-left: 5px ">


      <!-- </div> -->

		<ul class="kategori_menu">
			<li class="active">
				<a href="#" onclick="tampil_data_barang('Jasa', this)">Jasa</a>
			</li>
			<li>
				<a href="#" onclick="tampil_data_barang('Motor', this)">UMKM</a>
			</li>
			<li>
				<a href="#" onclick="tampil_data_barang('Aksesoris', this)">Promo</a>
			</li>
		</ul>

		 <div class="row mt-4 mb-4">
			<div class="col-2">
				<a href="" class="ms-2">
					<box-icon name='slider' class="ikon" onclick="openFilter(event)"></box-icon>
				</a>
			</div>
<div class="col-9">
<div id="searchInputContainer" style="">
    <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
	<box-icon class="ikon me-2" name='search-alt' style="margin-left: 9px;"></box-icon>
  </div>
</div>

	

		</div> 
		<div class="row product-grid"></div>
	</section>


	<!-- Modal -->
	<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="filterModalLabel">Filter</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url(); ?>assets/js/jquery-3.6.3.min.js"></script>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
	<script>



	tampil_data_barang("Jasa", $("#default")[0]);

	var searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', filterData);

    function filterData() {
      var searchValue = searchInput.value.trim();
	  var param = document.querySelector('.kategori_menu li.active').innerText;; // Ganti dengan nilai param yang sesuai
	  $('.product-grid').empty();

	  $.ajax({
        type: 'POST',
        url: 'GetItem/WithSearch',
        async: false,
        data: {
          param: param,
		  search : searchValue
        },
        dataType: 'json',
        success: function(data) {

			// console.log("Data", data)
			var products = data;  
			  var productItem = "";
			  $.each(products, function(index, product) {
				              var productBubble = "";
            if (product.isNew) {
              productBubble = '<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>';
            }

            productItem += `<div class="col-6 mb-3">
                              <div class="card">
                                <div class="card-body">
                                  <img src="<?= base_url(); ?>assets/images/${param}/${param == 'Aksesoris' ? product.namaItem : product.nopol}/${param == 'Aksesoris' ? product.foto1 : product.fotodepan}" class="img-fluid">
                                  <h5 class="card-title mt-2">${product.merk + ' ' + product.namaItem + ' ' + product.namaItem + (product.tahun ? ' ' + product.tahun : '')}</h5>
                                  <div class="price">Rp. ${formatRupiah(product.harga)}</div>
                                  <a href="welcome/detailProduct/${product.id}/${param}" class="btn btn-warning btn-xs btn-block text-white">Detail</a>
                                </div>
                              </div>
                            </div>`;
          });

          $('.product-grid').append(productItem);

        },
        error: function(error) {
          console.log(error);
        }
      });





    }

  function tampil_data_barang(param, elem, kategori, sort, searchValue) {
	
      var urlAll = 'GetItem';

      if (typeof elem !== 'undefined') {
        $('.kategori_menu li').removeClass('active');
      }

      $(elem).parent().addClass('active');
      $(elem).prepend('<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>');

      $.ajax({
        type: 'POST',
        url: "Main/getJasa",
        async: false,
        data: {
          postdata: param
        },
        dataType: 'json',
        success: function(data) {

          
          var products = data.Item;
          
          console.log("products", products)
          // // Sorting berdasarkan harga (dari terendah ke tertinggi)
          // products.sort(function(a, b) {
          //   return a.harga - b.harga;
          // });

          var productItem = "";
          $('.product-grid').empty(); // menghapus data sebelumnya
          $.each(products, function(index, product) {

            var productBubble = "";
            if (product.isNew) {
              productBubble = '<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>';
            }

            productItem += `<div class="col-6 mb-3">
                              <div class="card">
                                <div class="card-body">
                                  <img src="<?= base_url(); ?>assets/img/Product/${product.image}" class="img-fluid">
                                  <h5 class="card-title mt-2">${product.nama}</h5>
                                  <div class="price">Rp. ${formatRupiah(product.harga)}</div>
                                  <a href="https://wa.me/6285933255498?text=Pesan Ojeg Min" class="btn btn-warning btn-xs btn-block text-white">Pesan</a>
                                </div>
                              </div>
                            </div>`;
          });

          $('.product-grid').append(productItem);

        },
        error: function(error) {
          console.log(error);
        }
      });
    }



		function formatRupiah(angka) {
			var reverse = angka.toString().split('').reverse().join('');
			var ribuan = reverse.match(/\d{1,3}/g);
			ribuan = ribuan.join('.').split('').reverse().join('');
			return ribuan;
		}

		function openFilter(e) {
			e.preventDefault();
			$('#filterModal').modal('show');

			var paramIs = document.querySelector('.kategori_menu li.active').innerText;; // Ganti dengan nilai param yang sesuai


			var selectOptions = '';
  if (paramIs === 'Mobil' || paramIs === 'Motor') {
    selectOptions = `
      <select name="sorting_options" id="sorting_options" class="form-select">
        <option value="">Default Sorting</option>
        <option value="harga_Asc">Harga Terendah</option>
        <option value="harga_Desc">Harga Tertinggi</option>
		<option value="tahun_Asc">Tahun Terendah</option>
        <option value="tahun_Desc">Tahun Tertinggi</option>
      </select>
      <button onclick="handleSelectOption()">Set</button>
    `;
  } else {
    selectOptions = `
      <select name="sorting_options" id="sorting_options" class="form-select">
        <option value="">Default Sorting</option>
        <option value="harga_Asc">Harga Terendah</option>
        <option value="harga_Desc">Harga Tertinggi</option>
      </select>
      <button onclick="handleSelectOption()">Set</button>
    `;
  }

  document.querySelector('.modal-body').innerHTML = selectOptions;

		}

		$('#sorting_options').change(function() {
			var sortingOption = $(this).val(); // Ambil nilai data-sort dari elemen yang diklik
			var str = "Tahun_Asc";
			var parts = sortingOption.split("_");

			var kat = parts[0]
			var sort = parts[1]
			console.log(parts[0]); // Output: "Tahun"
			console.log(parts[1]); // Output: "Asc"

			console.log("Sorting", sortingOption)
			// Kirim data sorting ke controller menggunakan AJAX
			$.ajax({
				url: 'GetItem/MobilSorting',
				type: 'POST',
				data: {
					kat: kat,
					sort: sort
				},

				success: function(response) {
					// Lakukan tindakan setelah menerima respons dari controller
				},
				error: function(xhr, status, error) {
					// Tangani error jika terjadi
				}
			});
		});



		function handleSelectOption() {
  var selectedOption = document.getElementById('sorting_options').value;
  var paramIs = document.querySelector('.kategori_menu li.active').innerText;; // Ganti dengan nilai param yang sesuai

  $.ajax({
				url: 'GetItem/Sorting',
				type: 'POST',
				data: {
					param: paramIs,
					sort: selectedOption
				},
				dataType: 'json',
				success: function(data) {
					// Lakukan tindakan setelah menerima respons dari controller
					$('.product-grid').empty();
					var products = data;
			  var productItem = "";
			  $.each(products, function(index, product) {
				              var productBubble = "";
            if (product.isNew) {
              productBubble = '<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>';
            }

            productItem += `<div class="col-6 mb-3">
                              <div class="card">
                                <div class="card-body">
                                  <img src="<?= base_url(); ?>assets/images/${paramIs}/${paramIs == 'Aksesoris' ? product.namaItem : product.nopol}/${paramIs == 'Aksesoris' ? product.foto1 : product.fotodepan}" class="img-fluid">
                                  <h5 class="card-title mt-2">${product.merk + ' ' + product.namaItem + ' ' + product.namaItem + (product.tahun ? ' ' + product.tahun : '')}</h5>
                                  <div class="price">Rp. ${formatRupiah(product.harga)}</div>
                                  <a href="welcome/detailProduct/${product.id}/${paramIs}" class="btn btn-warning btn-xs btn-block text-white">Detail</a>
                                </div>
                              </div>
                            </div>`;
          });

          $('.product-grid').append(productItem);

				},
				error: function(xhr, status, error) {
					// Tangani error jika terjadi
				}
			});

  $('#filterModal').modal('hide'); // Menutup modal

}

	</script>


</body>

</html>
