<!-- DataTales Example -->
<div class="container mt-3">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
		  	<h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
		  	<!-- <a href="#" class="btn-sm btn-primary" data-toggle="modal" data-target="#formModal" data-url="<?= base_url(); ?>" id="addNewMenu">Add New Menu</a> -->
		</div>

		<?php if (!empty($error)) { ?>
    <div class="alert alert-danger"><?= $error; ?></div>
<?php } ?>

		<div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered table-striped table-hover" id="postsList" width="100%" cellspacing="0">
			      <thead>
			        <tr>
						<th style="max-width: 5%;">No</th>
						<th style="width: 70%; min-width: 250px;">Nama</th>
						<th style="width: 70%; min-width: 250px;">Saldo</th>
						<th style="width: 70%; min-width: 250px;">Alamat</th>
						<th style="width: 70%; min-width: 250px;">No Wa</th>
						<th style="width: 25%; min-width: 200px;">Email</th>
						<th style="width: 25%; min-width: 200px;">Tanggal Join</th>
			        </tr>
			      </thead>
			      <tbody>
			      	<?php 
			      	$number = 0;
			      	foreach($product as $m): ?>
			      	<tr>
			      		<td><?= ++$number; ?></td>
			      		<td><?= $m['name']; ?></td>
			      		<td><?= $m['saldo']; ?></td>
			      		<td><?= $m['alamat']  ?></td>
			      		<td><?= $m['kontak']; ?></td>
			      		<td><?= $m['email']; ?></td>
			      		<!-- <td><?= $m['date_create'] ?></td> -->
                          <td><?= date('Y-m-d H:i:s', $m['date_create']) ?></td>
			      		<!-- <td>
			      			<a href="#" class="btn-sm btn-warning p-2 tampilModalUbah" data-id="<?= $m['id']; ?>" data-url="<?= base_url(); ?>" data-toggle="modal" data-target="#formModalEdit">Edit</a>		
							<a href="#" class="btn-sm btn-danger p-2 tampilModalAlert" data-id="<?= $m['id']; ?>" data-url="<?= base_url(); ?>" data-toggle="modal" data-target="#alertModal">Delete</a>		
			      		</td> -->
			      	</tr>
				    <?php endforeach; ?>
			      </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>



<!-- Modal Tambah Data Produk -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Formulir Tambah Data Produk -->
                <form id="addProductForm" action="<?= site_url('product/addProduct'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Produk</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type Produk</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="0">Member</option>
                            <option value="1">Umum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Produk</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Edit Data Produk -->
<div class="modal fade" id="formModalEdit" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Formulir Tambah Data Produk -->
                <form id="editProductForm" action="<?= site_url('product/edit'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" id="editnama" name="nama" required>
                        <input type="hidden" class="form-control" id="editid" name="id">
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Produk</label>
                        <input type="text" class="form-control" id="editjenis" name="jenis" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type Produk</label>
                        <select class="form-control" id="edittype" name="edittype" required>
                            <option value="0">Member</option>
                            <option value="1">Umum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="editharga" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Produk</label>
                        <input type="file" class="form-control-file" id="editgambar" name="gambar">
                    </div>
                    <img src="" id="gambar-thumbnail" alt="Gambar Produk" style="max-width: 100px;">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alertModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus item ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" id="deleteItem" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>




<div class="modal" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tempatkan pesan kesalahan di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>







<script>
    $(document).ready(function () {
        $('#addProductForm').on('submit', function (e) {
            e.preventDefault(); // Mencegah pengiriman formulir bawaan

            // Lakukan validasi formulir dengan AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    // Tanggapan dari server

                    if (response === 'success') {
                        // Jika pengiriman berhasil, tutup modal
                        $('#formModal').modal('hide');
						location.reload(); 
                    } else {
                        // Jika ada kesalahan validasi, tampilkan pesan kesalahan di dalam modal
                        // $('#modal-content').html(response);
						$('#errorModal').modal('show');
                        $('#errorModal .modal-body').html(response);
                    }
                }
            });
        });
    });


    $('#editProductForm').on('submit', function (e) {

        e.preventDefault(); // Mencegah pengiriman formulir bawaan

        $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    // Tanggapan dari server

                    if (response === 'success') {
                        // Jika pengiriman berhasil, tutup modal
                        $('#formModaledit').modal('hide');
						location.reload(); 
                    } else {
                        // Jika ada kesalahan validasi, tampilkan pesan kesalahan di dalam modal
                        // $('#modal-content').html(response);
						$('#errorModal').modal('show');
                        $('#errorModal .modal-body').html(response);
                    }
                }
            });
        



    })




</script>



<script>
	$(document).ready(function(){
		
	


		$('.tampilModalUbah').on('click', function(){     

            const id = $(this).data('id');
            console.log(id);
            $.ajax({
                    type: 'POST',
                    url: 'product/detail', // Ganti dengan URL yang sesuai
                    data: {id: id},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response)
                        $('#editnama').val(response.nama);
                        $('#editjenis').val(response.jenis);
                        $('#editharga').val(response.harga);
                        $('#edittype').val(response.type);
                        $('#editid').val(response.id);

                        $('#gambar-thumbnail').attr('src', 'assets/img/Product/' + response.image);

                    }


            })

        })   

		// menampilkan alert konfirmasi hapus data
		$('.tampilModalAlert').on('click', function(){
			const id = $(this).data('id');
			const url = $(this).data('url');
			$('#anchorAlertModal').attr('href', url + '/product/deleteItem/' + id);
			$('#alertModalLabel').html('Delete Menu');
			$('#anchorAlertModal').attr('class', 'btn btn-danger');
			$('#anchorAlertModal').html('Delete');
			$('#paragrafBodyModal').html('Are You Sure..?');
		});

		// modal tambah data
		$('#addNewMenu').on('click', function(){
			const url = $(this).data('url') + 'menu';
			$('input[name=name]').val('');
			$('#formModalLabel').html('Add New Menu');
			$('#formModalBtn').html('Add');
			$('#formModalInput').removeAttr('value');
		});

		// modal edit data
		// $('.tampilModalUbah').on('click', function(){
		// 	$('.modal-footer button[type=submit]').attr('hidden', 'hidden');
		// 	$('input[name=name]').val('');
		// 	$('#formModalLabel').html('Edit Menu');
		// 	$('#formModalBtn').html('Edit');
		// 	const id = $(this).data('id');
		// 	const url = $(this).data('url');
		// 	$('#formModalAction').attr('action', url + 'product/edit');
		// 	$.ajax({
		// 		url: url + 'product/detail',
		// 		data: {id: id},
		// 		method: 'post',
		// 		dataType: 'json',
		// 		success: function(data){
		// 			console.log("detail",data.nama);
		// 			$('#nama').val(data.nama);
        //             $('#jenis').val(data.jenis);
        //             $('#harga').val(data.harga);
        //             $('#type').val(data.type);
        //             $('#gambar-thumbnail').attr('src', 'assets/img/Product/' + data.image);
		// 			$('#id').attr('value', data.id);
		// 		}
		// 	});
		// });
	});
</script>



<script>
    $(document).ready(function () {
        var itemToDelete = null;

        $('.tampilModalAlert').on('click', function () {
            // Menangani saat tombol delete di klik
            itemToDelete = $(this).data('id');
        });

        $('#deleteItem').on('click', function () {

			console.log("item to delete",itemToDelete);
		
            // Mengirim permintaan penghapusan dengan ID item yang akan dihapus
            if (itemToDelete !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'product/deleteProduct', // Ganti dengan URL yang sesuai
                    data: {id: itemToDelete},
                    success: function (response) {
                        // Tanggapan dari server setelah penghapusan
                        // Tampilkan pesan sukses atau error, dan perbarui tampilan jika diperlukan
                        if (response === 'success') {
							location.reload();
                            // Hapus item dari tampilan atau lakukan tindakan lain yang sesuai
                        } else {
                            // Tampilkan pesan error jika ada
                            alert('Gagal menghapus item.');
                        }
                    }
                });
            }
            itemToDelete = null;
            $('#alertModal').modal('hide');
        });
    });
</script>
