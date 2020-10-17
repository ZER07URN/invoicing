    <?php
	$bu = base_url();
	?>


    <div class="container-fluid bg-light-opac">
    	<div class="row">
    		<div class="container my-3 main-container">
    			<div class="row align-items-center">
    				<div class="col">
    					<h2 class="content-color-primary page-title">Master Produk</h2>
    				</div>
    				<div class="col-auto">
    					<button class="btn btn-rounded pink-gradient text-uppercase pr-3"><i class="material-icons"></i> <span class="text-hide-xs" data-toggle="modal" data-target="#modal">Tambah</span></button>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- content page title ends -->

    <!-- content page -->
    <div class="container mt-4 main-container">
    	<div class="row">
    		<div class="col-sm-12">
    			<div class="card mb-4 fullscreen">
    				<div class="card-header">
    					<div class="media">
    						<div class="media-body">
    							<h4 class="content-color-primary mb-0">Produk List</h4>
    						</div>
    						<a href="javascript:void(0);" class="icon-circle icon-30 content-color-secondary fullscreenbtn">
    							<i class="material-icons ">crop_free</i>
    						</a>
    					</div>
    				</div>
    				<div class="card-body">
    					<table class="table " id="masteradmin">
    						<thead>
    							<tr>
    								<th>No</th>
    								<th>Nama Produk</th>
    								<th>Status</th>
    								<th>Action</th>
    							</tr>
    						</thead>
    						<tbody>
    						</tbody>
    					</table>
    					<!-- /.table-responsive -->
    				</div>
    			</div>
    		</div>

    	</div>


    	<!-- modal for create form -->
    	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="createOrderTitle" aria-hidden="true">
    		<div class="modal-dialog modal-lg" role="document">
    			<div class="modal-content">
    				<div class="modal-header" id="createOrderTitle">
    					<div class="col text-center">
    						<img src="img/logo.png" alt="" class="mt-4">
    						<br>
    						<h5 class="mt-4">Produk</h5>
    					</div>
    					<button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
    					</button>
    				</div>
    				<div class="modal-body">
    					<div class="row justify-content-center">
    						<div class="col-md-10 mx-auto">
    							<div class="form-group row">
    								<div class="col-lg-6 col-md-6">
    									<label>Nama Produk</label>
    									<input type="text" class="form-control" name="nama" id="nama" placeholder="">
    									<input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="">
    								</div>
    								<div class="col-lg-6 col-md-6">
    									<div class="row">
    										<div class="col-lg-12">
    											<label>Status</label>
    											<select class="form-control " name="status" id="status" data-live-search="true" tabindex="-1" aria-hidden="true">
    												<option value=1>Aktif</option>
    												<option value=0>NonAktif</option>
    											</select>
    										</div>
    									</div>
    								</div>
    							</div>
    							<br>
    						</div>
    					</div>
    					<div class="modal-footer">
    						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    						<!-- <button type="button" id="btnTambahAdmin" class="btn btn-primary">Submit</button> -->
    						<button type="button" id="btnTambahAdmin" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    						<button type="button" id="btnUbah" class="btn btn-primary"><i class="fas fa-save"></i> Ubah</button>
    					</div>
    				</div>
    			</div>
    		</div>
    		<!-- modal for create form ends-->

    		<script type="text/javascript">
    			document.addEventListener("DOMContentLoaded", function(event) {



    				var datatable = $('#masteradmin').DataTable({
    					dom: "Bfrltip",
    					'pageLength': 10,
    					"responsive": true,
    					"processing": true,
    					"bProcessing": true,
    					"autoWidth": false,
    					"serverSide": true,


    					"columnDefs": [{
    							"targets": 0,
    							"className": "dt-body-center dt-head-center",
    							"width": "20px",
    							"orderable": false
    						},
    						{
    							"targets": 1,
    							"className": "dt-head-center"
    						},
    						{
    							"targets": 2,
    							"className": "dt-head-center"
    						}, {
    							"targets": 3,
    							"className": "dt-head-center"
    						},
    					],
    					"order": [
    						[1, "desc"]
    					],
    					'ajax': {
    						url: '<?= $bu ?>Produk/getAllProduk',
    						type: 'POST',
    						"data": function(d) {
    							// d.id_kelas = id_kelas;

    							return d;
    						}
    					},

    					buttons: [

    						// 'excelHtml5',
    						// 'pdfHtml5'
    						{
    							text: "Excel",
    							extend: "excelHtml5",
    							className: "btn btn-round btn-info",

    							title: 'Data Siswa',
    							exportOptions: {
    								columns: [1, 2]
    							}
    						}, {
    							text: "PDF",
    							extend: "pdfHtml5",
    							className: "<br>btn btn-round btn-danger",
    							title: 'Data Siswa',
    							exportOptions: {
    								columns: [1, 2]
    							}
    						}
    					],
    					language: {
    						searchPlaceholder: "Cari..",

    					},
    					"lengthMenu": [
    						[10, 25, 50, 1000],
    						[10, 25, 50, 1000]
    					]

    				});



    				$('#btnUbah').hide();

    				$('#btnTambahAdmin').on('click', function() {

    					// console.log("buton");return false
    					$('small.text-danger').html('');
    					var status = $('#status').val();
    					var nama = $('#nama').val();
    					if (nama == '' || status == '') {
    						Swal.fire({
    							icon: 'error',
    							title: 'Maaf!',
    							text: 'Harap Lengkapi Semua Field!',
    						})
    					} else {

    						$.ajax({
    							url: '<?= $bu ?>produk/tambah ',
    							dataType: 'json',
    							method: 'POST',
    							data: {
    								nama: nama,
    								status: status,

    							}
    						}).done(function(e) {
    							console.log('berhasil');
    							// console.log(e);
    							$('#nama').val('');
    							$('#username').val('');
    							$('#password').val('');
    							$('#email').val('');
    							$(':checkbox').prop('checked', false);
    							$('#modalAdmin').modal('show');
    							// datatable.ajax.reload();
    							var alert = '';

    							if (e.status) {
    								$('#modal').modal('hide');
    								datatable.ajax.reload();
    								Swal.fire({
    									title: 'Sukses!',
    									text: e.message,
    									icon: 'success',
    									confirmButtonText: 'Cool'
    								})
    							} else {
    								Swal.fire({
    									icon: 'error',
    									title: 'Oops...',
    									text: 'Something went wrong!',
    								})
    							}
    						}).fail(function(e) {
    							Swal.fire({
    								icon: 'error',
    								title: 'Oops...',
    								text: 'Something went wrong!',
    							})
    						});
    					}
    					return false;
    				});

    				$('body').on('click', '.btn_edit', function() {
    					$('#btnTambahAdmin').hide();
    					$('#btnUbah').show();


    					var id_user = $(this).data('id_produk');
    					var nama = $(this).data('nama_produk');
    					var status = $(this).data('status');

    					$('#id_user').val(id_user);
    					$('#status').val(status);
    					$('#nama').val(nama);

    				});

    				$('#btnUbah').on('click', function() {

    					var nama = $('#nama').val();
    					var id_user = $('#id_user').val();
    					var status = $('#status').val();

    					if (nama == '' || status == '') {
    						Swal.fire({
    							icon: 'error',
    							title: 'Maaf!',
    							text: 'Harap Lengkapi Semua Field!',
    						})
    					} else {

    						$.ajax({
    							url: '<?= $bu ?>Produk/edit ',
    							dataType: 'json',
    							method: 'POST',
    							data: {
    								id_admin: id_user,
    								nama: nama,
    								status: status,
    							}
    						}).done(function(e) {
    							console.log('berhasil');
    							// console.log(e);
    							$('#nama').val('');
    							$('#username').val('');
    							// $(':checkbox').prop('checked', false);
    							// $('#modalAdmin').modal('hide'); //$('body').removeClass('modal-open');$('.modal-backdrop').remove();
    							var alert = '';
    							if (e.status) {
    								Swal.fire({
    									title: 'Mantoel!',
    									text: e.message,
    									icon: 'success',
    									confirmButtonText: 'Cool'
    								})
    								$('#modal').modal('hide');
    								datatable.ajax.reload();
    								// resetForm();
    							} else {

    								Swal.fire({
    									title: 'Error!',
    									text: e.message,
    									icon: 'Error',
    									confirmButtonText: 'Cool'
    								})

    							}
    						}).fail(function(e) {
    							Swal.fire({
    								title: 'Error!',
    								text: e.message,
    								icon: 'Error',
    								confirmButtonText: 'Cool'
    							})
    							console.log(e);

    							$('#modal').modal('hide');

    						});
    					}
    					return false;
    				});
    				$('body').on('click', '.hapus', function() {
    					var id_user = $(this).data('id_produk');
    					var nama_admin = $(this).data('nama_produk');

    					Swal.fire({
    						title: 'Are you sure?',
    						text: "Anda akan Menghapus Produk: " + nama_admin,
    						icon: 'warning',
    						showCancelButton: true,
    						confirmButtonColor: '#3085d6',
    						cancelButtonColor: '#d33',
    						confirmButtonText: 'Yes, delete it!'
    					}).then((result) => {


    						if (result.isConfirmed) {
    							$.ajax({
    								url: '<?= $bu ?>Produk/hapus ',
    								dataType: 'json',
    								method: 'POST',
    								data: {
    									id_user: id_user
    								}
    							}).done(function(e) {
    								// console.log(e);
    								Swal.fire(
    									'Deleted!',
    									e.message,
    									'success'
    								)
    								$('#modal-detail').modal('hide');

    								datatable.ajax.reload();
    								resetForm();

    							}).fail(function(e) {
    								console.log('gagal');
    								console.log(e);
    								var message = 'Terjadi Kesalahan. #JSMP01';
    							});



    							// Swal.fire(
    							// 	'Deleted!',
    							// 	'Your file has been deleted.',
    							// 	'success'
    							// )
    						}
    					})





    					var c = confirm('Apakah anda yakin akan menghapus admin: "' + username + '" ?');
    					if (c == true) {
    						$.ajax({
    							url: bu + 'admin/hapusAdmin',
    							dataType: 'json',
    							method: 'POST',
    							data: {
    								id_admin: id_admin
    							}
    						}).done(function(e) {
    							console.log(e);
    							notifikasi('#alertNotif', e.message, !e.status);
    							datatable.ajax.reload();
    						}).fail(function(e) {
    							console.log('gagal');
    							console.log(e);
    							var message = 'Terjadi Kesalahan. #JSMP01';
    							notifikasi('#alertNotif', message, true);
    						});
    					}
    					return false;
    				});






    			});
    		</script>
