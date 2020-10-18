    <?php
	$bu = base_url();
	?>


    <div class="container-fluid bg-light-opac">
    	<div class="row">
    		<div class="container my-3 main-container">
    			<div class="row align-items-center">
    				<div class="col">
    					<h2 class="content-color-primary page-title">Master Admin</h2>
    				</div>
    				<div class="col-auto">
    					<button class="btn btn-rounded pink-gradient text-uppercase pr-3" id="tombole"><i class="material-icons"></i> <span class="text-hide-xs" data-toggle="modal" data-target="#modal">Tambah</span></button>
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
    							<h4 class="content-color-primary mb-0">User List</h4>
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
    								<th>User</th>
    								<th>Email</th>
    								<th>Status</th>
    								<th>Created At</th>
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
    						<h5 class="mt-4">Admin</h5>
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
    									<label>Nama</label>
    									<input type="text" class="form-control" name="nama" id="nama" placeholder="">
    									<input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="">
    								</div>
    								<div class="col-lg-6 col-md-6">
    									<label>Email</label>
    									<input type="email" name="email" id="email" class="form-control" placeholder="">
    								</div>
    							</div>
    							<br>
    							<div class="form-group row">
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
    								<div class="col-lg-6 col-md-6">
    									<label>Password</label>
    									<input type="password" name="password" id="password" class="form-control" placeholder="">
    								</div>
    							</div>
    							<div class="row ">
    								<div class="col-lg-12 col-md-12">
    									<div class="form-group ">
    										<label>Role</label>
    										<table class="table table-striped table-bordered table-hover w-100">
    											<thead>
    												<tr>
    													<th>#</th>
    													<th>Lihat</th>
    													<th>Tambah</th>
    													<th>Edit</th>
    													<th>Hapus</th>
    												</tr>
    											</thead>
    											<tbody>
    												<tr>
    													<th>Admin</th>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="admin_r">
    															<label class="custom-control-label" for="admin_r">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="admin_c">
    															<label class="custom-control-label" for="admin_c">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="admin_u">
    															<label class="custom-control-label" for="admin_u">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="admin_d">
    															<label class="custom-control-label" for="admin_d">Ok</label>
    														</div>
    													</td>
    												</tr>
    												<tr>
    													<th>Suplier</th>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="suplier_r">
    															<label class="custom-control-label" for="suplier_r">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="suplier_c">
    															<label class="custom-control-label" for="suplier_c">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="suplier_u">
    															<label class="custom-control-label" for="suplier_u">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="suplier_d">
    															<label class="custom-control-label" for="suplier_d">Ok</label>
    														</div>
    													</td>
    												</tr>
    												<tr>
    													<th>Produk</th>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="produk_r">
    															<label class="custom-control-label" for="produk_r">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="produk_c">
    															<label class="custom-control-label" for="produk_c">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="produk_u">
    															<label class="custom-control-label" for="produk_u">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="produk_d">
    															<label class="custom-control-label" for="produk_d">Ok</label>
    														</div>
    													</td>
    												</tr>
    												<tr>
    													<th>Kendaraan</th>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="kendaraan_r">
    															<label class="custom-control-label" for="kendaraan_r">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="kendaraan_c">
    															<label class="custom-control-label" for="kendaraan_c">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="kendaraan_u">
    															<label class="custom-control-label" for="kendaraan_u">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="kendaraan_d">
    															<label class="custom-control-label" for="kendaraan_d">Ok</label>
    														</div>
    													</td>
    												</tr>
    												<tr>
    													<th>Customer</th>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="custumer_c">
    															<label class="custom-control-label" for="custumer_c">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="custumer_r">
    															<label class="custom-control-label" for="custumer_r">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="custumer_u">
    															<label class="custom-control-label" for="custumer_u">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="custumer_d">
    															<label class="custom-control-label" for="custumer_d">Ok</label>
    														</div>
    													</td>
    												</tr>
    												<tr>
    													<th>Biaya</th>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="biaya_r">
    															<label class="custom-control-label" for="biaya_r">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="biaya_c">
    															<label class="custom-control-label" for="biaya_c">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="biaya_u">
    															<label class="custom-control-label" for="biaya_u">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="biaya_d">
    															<label class="custom-control-label" for="biaya_d">Ok</label>
    														</div>
    													</td>
    												</tr>
    												<tr>
    													<th>Histori</th>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="histori_r">
    															<label class="custom-control-label" for="histori_r">Ok</label>
    														</div>
    													</td>
    													<!-- <td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="feedback2">
    															<label class="custom-control-label" for="feedback2">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="feedback3">
    															<label class="custom-control-label" for="feedback3">Ok</label>
    														</div>
    													</td>
    													<td>
    														<div class="custom-control custom-checkbox">
    															<input type="checkbox" class="custom-control-input" id="feedback3">
    															<label class="custom-control-label" for="feedback3">Ok</label>
    														</div>
    													</td> -->
    												</tr>
    											</tbody>
    										</table>
    									</div>
    								</div>
    							</div>

    						</div>
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
    					}, {
    						"targets": 4,
    						"className": "dt-head-center"
    					},
    				],
    				"order": [
    					[1, "desc"]
    				],
    				'ajax': {
    					url: '<?= $bu ?>Admin/getAllProduk',
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
    							columns: [1, 2, 3, 4, 5, 6, 7]
    						}
    					}, {
    						text: "PDF",
    						extend: "pdfHtml5",
    						className: "<br>btn btn-round btn-danger",
    						title: 'Data Siswa',
    						exportOptions: {
    							columns: [1, 2, 3, 4, 5, 6, 7]
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

    			$('#tombole').on('click', function() {

    				$(':checkbox').prop('checked', false);

    			})

    			$('#btnUbah').hide();

    			$('#btnTambahAdmin').on('click', function() {

    				// console.log("buton");return false
    				$('small.text-danger').html('');
    				var status = $('#status').val();
    				var nama = $('#nama').val();
    				var password = $('#password').val();
    				var email = $('#email').val();

    				var admin_r = $('#admin_r').prop('checked');
    				var admin_c = $('#admin_c').prop('checked');
    				var admin_u = $('#admin_u').prop('checked');
    				var admin_d = $('#admin_d').prop('checked');


    				var suplier_r = $('#suplier_r').prop('checked');
    				var suplier_c = $('#suplier_c').prop('checked');
    				var suplier_u = $('#suplier_u').prop('checked');
    				var suplier_d = $('#suplier_d').prop('checked');


    				var produk_r = $('#produk_r').prop('checked');
    				var produk_c = $('#produk_c').prop('checked');
    				var produk_u = $('#produk_u').prop('checked');
    				var produk_d = $('#produk_d').prop('checked');

    				var kendaraan_r = $('#kendaraan_r').prop('checked');
    				var kendaraan_c = $('#kendaraan_c').prop('checked');
    				var kendaraan_u = $('#kendaraan_u').prop('checked');
    				var kendaraan_d = $('#kendaraan_d').prop('checked');

    				var custumer_r = $('#custumer_r').prop('checked');
    				var custumer_c = $('#custumer_c').prop('checked');
    				var custumer_u = $('#custumer_u').prop('checked');
    				var custumer_d = $('#custumer_d').prop('checked');

    				var biaya_r = $('#biaya_r').prop('checked');
    				var biaya_c = $('#biaya_c').prop('checked');
    				var biaya_u = $('#biaya_u').prop('checked');
    				var biaya_d = $('#biaya_d').prop('checked');

    				var histori_r = $('#histori_r').prop('checked');

    				var kosong = "0";
    				if (nama == '' || password == '') {
    					Swal.fire({
    						icon: 'error',
    						title: 'Maaf!',
    						text: 'Harap Lengkapi Semua Field!',
    					})
    				} else {

    					$.ajax({
    						url: '<?= $bu ?>admin/tambah_admin ',
    						dataType: 'json',
    						method: 'POST',
    						data: {
    							nama: nama,
    							password: password,
    							email: email,
    							status: status,
    							admin_r: admin_r,
    							admin_c: admin_c,
    							admin_u: admin_u,
    							admin_d: admin_d,

    							suplier_r: suplier_r,
    							suplier_c: suplier_c,
    							suplier_u: suplier_u,
    							suplier_d: suplier_d,

    							produk_r: produk_r,
    							produk_c: produk_c,
    							produk_u: produk_u,
    							produk_d: produk_d,

    							kendaraan_r: kendaraan_r,
    							kendaraan_c: kendaraan_c,
    							kendaraan_u: kendaraan_u,
    							kendaraan_d: kendaraan_d,

    							custumer_r: custumer_r,
    							custumer_c: custumer_c,
    							custumer_u: custumer_u,
    							custumer_d: custumer_d,

    							biaya_r: biaya_r,
    							biaya_c: biaya_c,
    							biaya_u: biaya_u,
    							biaya_d: biaya_d,

    							histori_r: histori_r,

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
    							$(':checkbox').prop('checked', false);
    							Swal.fire({
    								title: 'Error!',
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

    				$(':checkbox').prop('checked', false);

    				var id_user = $(this).data('id_user');
    				var nama = $(this).data('nama_admin');
    				var password = $(this).data('password');
    				var email = $(this).data('email');
    				var status = $(this).data('status');
    				var admin_r = $(this).data('admin_r');
    				var admin_c = $(this).data('admin_c');
    				var admin_d = $(this).data('admin_d');
    				var admin_u = $(this).data('admin_u');

    				var suplier_r = $(this).data('suplier_r');
    				var suplier_c = $(this).data('suplier_c');
    				var suplier_u = $(this).data('suplier_u');
    				var suplier_d = $(this).data('suplier_d');

    				var produk_r = $(this).data('produk_r');
    				var produk_c = $(this).data('produk_c');
    				var produk_u = $(this).data('produk_u');
    				var produk_d = $(this).data('produk_d');

    				var kendaraan_r = $(this).data('kendaraan_r');
    				var kendaraan_c = $(this).data('kendaraan_c');
    				var kendaraan_u = $(this).data('kendaraan_u');
    				var kendaraan_d = $(this).data('kendaraan_d');


    				var custumer_r = $(this).data('custumer_r');
    				var custumer_c = $(this).data('custumer_c');
    				var custumer_u = $(this).data('custumer_u');
    				var custumer_d = $(this).data('custumer_d');

    				var biaya_r = $(this).data('biaya_r');
    				var biaya_c = $(this).data('biaya_c');
    				var biaya_u = $(this).data('biaya_u');
    				var biaya_d = $(this).data('biaya_d');

    				var histori_r = $(this).data('histori_r');

    				$('#id_user').val(id_user);
    				$('#status').val(status);
    				$('#password').val(password);
    				$('#email').val(email);
    				$('#nama').val(nama);
    				// $('#admin_r').val(admin_r);
    				if (admin_r == "1") $('#admin_r').prop('checked', true);
    				if (admin_c == "1") $('#admin_c').prop('checked', true);
    				if (admin_u == "1") $('#admin_u').prop('checked', true);
    				if (admin_d == "1") $('#admin_d').prop('checked', true);

    				if (suplier_r == "1") $('#suplier_r').prop('checked', true);
    				if (suplier_c == "1") $('#suplier_c').prop('checked', true);
    				if (suplier_u == "1") $('#suplier_u').prop('checked', true);
    				if (suplier_d == "1") $('#suplier_d').prop('checked', true);

    				if (produk_r == "1") $('#produk_r').prop('checked', true);
    				if (produk_c == "1") $('#produk_c').prop('checked', true);
    				if (produk_u == "1") $('#produk_u').prop('checked', true);
    				if (produk_d == "1") $('#produk_d').prop('checked', true);

    				if (kendaraan_r == "1") $('#kendaraan_r').prop('checked', true);
    				if (kendaraan_c == "1") $('#kendaraan_c').prop('checked', true);
    				if (kendaraan_u == "1") $('#kendaraan_u').prop('checked', true);
    				if (kendaraan_d == "1") $('#kendaraan_d').prop('checked', true);

    				if (custumer_r == "1") $('#custumer_r').prop('checked', true);
    				if (custumer_c == "1") $('#custumer_c').prop('checked', true);
    				if (custumer_u == "1") $('#custumer_u').prop('checked', true);
    				if (custumer_d == "1") $('#custumer_d').prop('checked', true);

    				if (biaya_r == "1") $('#biaya_r').prop('checked', true);
    				if (biaya_c == "1") $('#biaya_c').prop('checked', true);
    				if (biaya_u == "1") $('#biaya_u').prop('checked', true);
    				if (biaya_d == "1") $('#biaya_d').prop('checked', true);

    				if (histori_r == "1") $('#histori_r').prop('checked', true);

    			});

    			$('#btnUbah').on('click', function() {

    				var nama = $('#nama').val();
    				var id_user = $('#id_user').val();
    				var status = $('#status').val();
    				var password = $('#password').val();
    				var email = $('#email').val();
    				var admin_r = $('#admin_r').prop('checked');
    				var admin_c = $('#admin_c').prop('checked');
    				var admin_u = $('#admin_u').prop('checked');
    				var admin_d = $('#admin_d').prop('checked');


    				var suplier_r = $('#suplier_r').prop('checked');
    				var suplier_c = $('#suplier_c').prop('checked');
    				var suplier_u = $('#suplier_u').prop('checked');
    				var suplier_d = $('#suplier_d').prop('checked');


    				var produk_r = $('#produk_r').prop('checked');
    				var produk_c = $('#produk_c').prop('checked');
    				var produk_u = $('#produk_u').prop('checked');
    				var produk_d = $('#produk_d').prop('checked');

    				var kendaraan_r = $('#kendaraan_r').prop('checked');
    				var kendaraan_c = $('#kendaraan_c').prop('checked');
    				var kendaraan_u = $('#kendaraan_u').prop('checked');
    				var kendaraan_d = $('#kendaraan_d').prop('checked');

    				var custumer_r = $('#custumer_r').prop('checked');
    				var custumer_c = $('#custumer_c').prop('checked');
    				var custumer_u = $('#custumer_u').prop('checked');
    				var custumer_d = $('#custumer_d').prop('checked');

    				var biaya_r = $('#biaya_r').prop('checked');
    				var biaya_c = $('#biaya_c').prop('checked');
    				var biaya_u = $('#biaya_u').prop('checked');
    				var biaya_d = $('#biaya_d').prop('checked');

    				var histori_r = $('#histori_r').prop('checked');

    				if (nama == '' || password == '') {
    					Swal.fire({
    						icon: 'error',
    						title: 'Maaf!',
    						text: 'Harap Lengkapi Semua Field!',
    					})
    				} else {

    					$.ajax({
    						url: '<?= $bu ?>admin/edit_admin ',
    						dataType: 'json',
    						method: 'POST',
    						data: {
    							id_admin: id_user,
    							nama: nama,
    							password: password,
    							email: email,
    							status: status,
    							admin_r: admin_r,
    							admin_c: admin_c,
    							admin_u: admin_u,
    							admin_d: admin_d,

    							suplier_r: suplier_r,
    							suplier_c: suplier_c,
    							suplier_u: suplier_u,
    							suplier_d: suplier_d,

    							produk_r: produk_r,
    							produk_c: produk_c,
    							produk_u: produk_u,
    							produk_d: produk_d,

    							kendaraan_r: kendaraan_r,
    							kendaraan_c: kendaraan_c,
    							kendaraan_u: kendaraan_u,
    							kendaraan_d: kendaraan_d,

    							custumer_r: custumer_r,
    							custumer_c: custumer_c,
    							custumer_u: custumer_u,
    							custumer_d: custumer_d,

    							biaya_r: biaya_r,
    							biaya_c: biaya_c,
    							biaya_u: biaya_u,
    							biaya_d: biaya_d,

    							histori_r: histori_r,


    						}
    					}).done(function(e) {
    						console.log('berhasil');
    						// console.log(e);
    						$('#nama').val('');
    						$('#username').val('');
    						$('#Password').val('');
    						$('#email').val('');
    						$(':checkbox').prop('checked', false);
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
    				var id_user = $(this).data('id_user');
    				var nama_admin = $(this).data('nama_admin');

    				Swal.fire({
    					title: 'Are you sure?',
    					text: "Anda akan Menghapus Admin: " + nama_admin,
    					icon: 'warning',
    					showCancelButton: true,
    					confirmButtonColor: '#3085d6',
    					cancelButtonColor: '#d33',
    					confirmButtonText: 'Yes, delete it!'
    				}).then((result) => {


    					if (result.isConfirmed) {
    						$.ajax({
    							url: '<?= $bu ?>Admin/hapusAdmin ',
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
    			resetForm($('#modal'));

    			function resetForm($form) {
    				console.log("sss")
    				$form.find('input:text, input:password, input:file, select, textarea').val('');

    				$form.find('input:radio, input:checkbox')

    					.removeAttr('checked').removeAttr('selected');

    			}





    		});
    	</script>
