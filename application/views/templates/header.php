<?php 
setlocale(LC_ALL, 'id_ID.utf8');
setlocale(LC_TIME, 'id_ID.utf8');
$hariIni = new DateTime();
# lokalisasi tidak berpengaruh
// echo $hariIni->format('l F Y, H:i') . '<br>';
// echo $hariIni->format('D M y, H:i') . '<br>';

// echo "<br>";
// echo strftime('%A %d %B %Y, %H:%M', $hariIni->getTimestamp()) . '<br>';
// echo strftime('%a %d %b %Y, %H:%M', $hariIni->getTimestamp()) . '<br>';
// echo date('D M y, H:i') . '<br>';
// die;
$id_admin = $this->session->userdata('id_admin');
$admin = $this->AdminModel->getAdminById($id_admin)[0];
		// var_dump($admin);die;


?>      
      <header class="main-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-auto pl-0">
                        <button class="btn pink-gradient btn-icon" id="left-menu"><i class="material-icons">widgets</i></button>
                        <a href="<?= base_url() ?>Admin" class="logo"><img src="<?php echo base_url() . "templates/"; ?>img/logo-icon.png" alt=""><span class="text-hide-xs"><b>Go</b>TRI</span></a>
                    </div>
                    <div class="col text-center p-xs-0">
                        <ul class="time-day">
                            <li class="text-right">
                                <p class="header-color-primary"><span class="header-color-secondary"><?=  $hariIni->format('l F, H:i') ?></span><small><?=  $hariIni->format(' Y') ?></small></p>
                                <h2><?=   $hariIni->format('D');?></h2>
                            </li>
                            <li class="text-left">
                                <h2>36<span class="header-color-secondary font-weight-light"><sup>o</sup>C</span></h2>
                                <p class="header-color-primary text-hide-lg"><span class="header-color-secondary">Indonesia</span><small><?=  $hariIni->format(' H:i') ?></small></p>
                            </li>
                        </ul>

                    </div>
                    <div class="col-auto pr-0">
                        <button class="btn btn-link text-hide-md header-color-secondary font-small px-0" type="button"><i class="material-icons">text_format</i></button>
                        <button class="btn btn-link text-hide-md header-color-secondary font-big px-0 mr-3" type="button"><i class="material-icons">text_format</i></button>

                        <!-- <button class="btn btn-search btn-icon header-color-secondary" type="button"><i class="material-icons">search</i></button> -->

              
                        <div class="dropdown text-hide-lg d-inline-block">
                            <a class="btn header-color-secondary btn-icon dropdown-toggle caret-none" href="#" role="button" id="dropdownnotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications_none</i>
                                <span class="status-dot pink-gradient"></span>
                            </a>
                            <div class="dropdown-menu notification-dropdown" aria-labelledby="dropdownnotification">
                                <a href="#" class="media  pink-gradient-active new">
                                    <figure class="avatar avatar-40">
                                        <img src="<?php echo base_url() . "templates/"; ?>img/user1.png" alt="Generic placeholder image">
                                    </figure>
                                    <div class="media-body">
                                        <h5 class="mt-0">Media heading</h5>
                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                                    </div>
                                </a>
                                <a href="#" class="media  pink-gradient-active">
                                    <figure class="avatar avatar-40">
                                        <img src="<?php echo base_url() . "templates/"; ?>img/user1.png" alt="Generic placeholder image">
                                    </figure>
                                    <div class="media-body">
                                        <h5 class="mt-0">Media heading</h5>
                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                                    </div>
                                </a>
                                <a href="#" class="media  pink-gradient-active">
                                    <figure class="avatar avatar-40">
                                        <img src="<?php echo base_url() . "templates/"; ?>img/user1.png" alt="Generic placeholder image">
                                    </figure>
                                    <div class="media-body">
                                        <h5 class="mt-0">Media heading</h5>
                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown d-inline-block">
                            <a class="btn header-color-secondary dropdown-toggle username" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <figure class="userpic"><img src="<?php echo base_url() . "templates/"; ?>img/avatar.png" alt=""></figure>
                                <h5 class="text-hide-xs">
                                    <small class="header-color-secondary">Welcome,</small>
                                    <span class="header-color-primary"><?= $admin->nama_admin ?></span>
                                </h5>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown" aria-labelledby="dropdownMenuLink">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <a href="profile.html">
                                            <figure class="avatar avatar-120 mx-auto my-3">
                                                <img src="<?php echo base_url() . "templates/"; ?>img/avatar.png" alt="">
                                            </figure>
                                            <h5 class="card-title mb-2 header-color-primary"><?= $admin->nama_admin ?></h5>
                                            <h6 class="card-subtitle mb-3 header-color-secondary"><?= $admin->email ?></h6>
                                        </a>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <!-- <button class="btn btn-sm pink-gradient border-0 mb-3">Edit</button> -->
                                    </div>
                                </div>
                                <div class="dropdown-divider m-0"></div>
                                <a class="dropdown-item pink-gradient-active" href="<?= base_url() ?>Admin/logout">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            Logout
                                        </div>

                                        <div class="col-auto">
                                            <div class="text-danger ml-2"><i class="material-icons vm">exit_to_app</i></div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>