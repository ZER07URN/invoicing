<?php      
$id_admin = $this->session->userdata('id_admin');
$h = $this->AdminModel->getRole($id_admin, 'histori_r')->r;

$pr = $this->AdminModel->getRole($id_admin, 'produk_r')->r;
$pc = $this->AdminModel->getRole($id_admin, 'produk_c')->r;
$pu = $this->AdminModel->getRole($id_admin, 'produk_u')->r;
$pd = $this->AdminModel->getRole($id_admin, 'produk_d')->r;

$admin_r = $this->AdminModel->getRole($id_admin, 'admin_r')->r;
$admin_c = $this->AdminModel->getRole($id_admin, 'admin_c')->r;
$admin_u = $this->AdminModel->getRole($id_admin, 'admin_u')->r;
$admin_d = $this->AdminModel->getRole($id_admin, 'admin_d')->r;

$cr = $this->AdminModel->getRole($id_admin, 'custumer_r')->r;
$cc = $this->AdminModel->getRole($id_admin, 'custumer_c')->r;
$cu = $this->AdminModel->getRole($id_admin, 'custumer_u')->r;
$cd = $this->AdminModel->getRole($id_admin, 'custumer_d')->r;

$sr = $this->AdminModel->getRole($id_admin, 'supplier_r')->r;
$sc = $this->AdminModel->getRole($id_admin, 'supplier_c')->r;
$su = $this->AdminModel->getRole($id_admin, 'supplier_u')->r;
$sd = $this->AdminModel->getRole($id_admin, 'supplier_d')->r;

$kr = $this->AdminModel->getRole($id_admin, 'kendaraan_r')->r;
$kc = $this->AdminModel->getRole($id_admin, 'kendaraan_c')->r;
$ku = $this->AdminModel->getRole($id_admin, 'kendaraan_u')->r;
$kd = $this->AdminModel->getRole($id_admin, 'kendaraan_d')->r;

$br = $this->AdminModel->getRole($id_admin, 'biaya_r')->r;
$bc = $this->AdminModel->getRole($id_admin, 'biaya_c')->r;
$bu = $this->AdminModel->getRole($id_admin, 'biaya_u')->r;
$bd = $this->AdminModel->getRole($id_admin, 'biaya_d')->r;




// var_dump($r);die;

		
		
		
	?>
		<div class="sidebar sidebar-left">
        	<ul class="nav flex-column">
        		<li class="nav-item">
        			<a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">insert_chart_outlined</i> <span>Master</span><i class="material-icons icon arrow">expand_more</i></a>
        			<ul class="nav flex-column">
						<?php 	if($admin_r =='1' || $admin_c == '1'|| $admin_u == '1'|| $admin_d == '1' ){ ?>
        				<li class="nav-item">
        					<a href="<?= base_url(); ?>Admin" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Master Admin</span></a>
        				</li>
					<?php }?>
					<?php 	if($cr == '1' || $cc == '1' || $cu == '1' || $cd == '1' ){ ?>
        				<li class="nav-item">
        					<a href="<?= base_url(); ?>Customer" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Master Custumer</span></a>
        				</li>
							<?php }?>

					<?php 	if($sr == '1' || $sc == '1' || $su == '1' || $sd == '1' ){ ?>

        				<li class="nav-item">
        					<a href="<?= base_url(); ?>Suplier" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Master Suplier</span></a>
        				</li>
				<?php }?>
				<?php 
				if ($pr == '1' || $pc == '1' || $pu == '1' || $pd == '1') {?>
        				<li class="nav-item">
        					<a href="<?= base_url(); ?>Produk" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Master Produk</span></a>
        				</li>
						<?php }


					if ($kr == '1' || $kc == '1' || $ku == '1' || $kd == '1') {?>
        				<li class="nav-item">
        					<a href="<?= base_url(); ?>Kendaraan" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Master Kendaran</span></a>
        				</li>

						
						<?php }
						if ($br == '1' || $bc == '1' || $bu == '1' || $bd == '1') {?>

        				<li class="nav-item">
        					<a href="<?= base_url(); ?>Biaya" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Master Biaya Oprs.</span></a>
        				</li>
						
						<?php }?>

						<?php if($h==1){ ?>
        				<li class="nav-item">
        					<a href="<?= base_url(); ?>Histori" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Master Histori</span></a>
        				</li>
						<?php }?>
        			</ul>
        			<ul>
        				<a href="<?= base_url(); ?>Admin/logout" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>LogOut</span></a>
        			</ul>
        		</li>

        	</ul>
        </div>
