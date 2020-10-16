    <?php 
        $bu = base_url();
    ?>        
        
        
        <div class="container-fluid bg-light-opac">
            <div class="row">
                <div class="container my-3 main-container">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="content-color-primary page-title">DataTable</h2>
                            <p class="content-color-secondary page-sub-title">Creative, amazing, awesome and unique</p>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-rounded pink-gradient text-uppercase pr-3"><i class="material-icons">add</i> <span class="text-hide-xs" data-toggle="modal" data-target="#modal">Tambah</span></button>
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
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Created At</th>
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
                                        <input type="text" class="form-control" name="nama" id="nama"placeholder="">
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
                                        <input type="text" name="password" id="password" class="form-control" placeholder="">
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
                                                        <th>Presence</th>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="feedback1">
                                                                <label class="custom-control-label" for="feedback1">Ok</label>
                                                            </div>
                                                        </td>
                                                        <td>
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
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Presence</th>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="feedback1">
                                                                <label class="custom-control-label" for="feedback1">Ok</label>
                                                            </div>
                                                        </td>
                                                        <td>
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
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Presence</th>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="feedback1">
                                                                <label class="custom-control-label" for="feedback1">Ok</label>
                                                            </div>
                                                        </td>
                                                        <td>
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
                                                        </td>
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
								url: '<?= $bu?>Admin/getAllProduk',
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




		$('#btnTambahAdmin').on('click', function() {

            // console.log("buton");return false
			$('small.text-danger').html('');
			var status = $('#status').val();
			var nama = $('#nama').val();
			var password = $('#password').val();
			var email = $('#email').val();


			// var all_admin = $('#role-all_admin').prop('checked');
			// var tambah_admin = $('#role-tambah_admin').prop('checked');
			// var all_user = $('#role-all_user').prop('checked');
			// var all_produk = $('#role-all_produk').prop('checked');
			// var tambah_produk = $('#role-tambah_produk').prop('checked');

			// var transaksi = $('#role-transaksi').prop('checked');
			// var bundling = $('#role-bundling').prop('checked');
			// var grade = $('#role-grade').prop('checked');
			// var spek_hp = $('#role-spek_hp').prop('checked');
			// var spek_smartwatch = $('#role-spek_smartwatch').prop('checked');
			// var spek_laptop = $('#role-spek_laptop').prop('checked');
			// var waktu = $('#role-waktu').prop('checked');

			// var transaksi_ldu = $('#role-transaksi_ldu').prop('checked');
			// var transaksi_bundling = $('#role-transaksi_bundling').prop('checked');
			// var bidding_ldu = $('#role-bidding_ldu').prop('checked');
			// var master_user_lihat = $('#role-master_user_lihat').prop('checked');
			// var master_harga = $('#role-harga').prop('checked');
			// var transaksi_ldu_lihat = $('#role-transaksi_ldu_lihat').prop('checked');
			// var histori_admin = $('#role-histori_admin').prop('checked');
			// var histori_user = $('#role-histori_user').prop('checked');
			// var daftarBidderLihat = $('#role-daftarBidderLihat').prop('checked');
			// var membership = $('#role-membership').prop('checked');
			// var voucher = $('#role-voucher').prop('checked');
			// var statistik = $('#role-statistik').prop('checked');


			// // console.log(statistik);
			// // return (false);
			// var noRoleSelected = true;
			// if (all_admin || tambah_admin || all_user ||
			// 	all_produk || tambah_produk ||
			// 	transaksi || bundling || grade ||
			// 	spek_hp || spek_smartwatch || spek_laptop || waktu || transaksi_ldu_lihat || transaksi_ldu || master_user_lihat || master_harga || transaksi_bundling || bidding_ldu || histori_user || histori_admin || daftarBidderLihat || membership || voucher || statistik
			// ) noRoleSelected = false;

			if (nama == '') {
				$('*[for="nama"] > small').html('Harap diisi!');
				// alert('harap isi username!');
			} else if (password == '') {
				$('*[for="password"] > small').html('Harap diisi!');
				// alert('harap isi password!');
			} else if (status == '') {
				$('*[for="status"] > small').html('Harap Isikan Nama!');
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
                                     footer: '<a href>Why do I have this issue?</a>'
                        })
					}
				}).fail(function(e) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>Why do I have this issue?</a>'
                        })
				});
			}
			return false;
		});






        });

    </script>