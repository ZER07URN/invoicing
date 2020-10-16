 	<?php $this->load->view('templates/head') ?>


    <div class="wrapper">
        <!-- main header -->
 

 	<?php $this->load->view('templates/header') ?>

 
        <!-- main header ends -->

        <!-- sidebar left -->
 	<?php $this->load->view('templates/sidebar') ?>

        <!-- sidebar left ends -->

        <div class="settings-sidebar-backdrop pink-gradient"></div>
      
        <!-- setting sidebar ends -->

        <!-- content page title -->
        <!-- <div class="container-fluid bg-light-opac">
            <div class="row">
                <div class="container my-3 main-container">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="content-color-primary page-title">Dashboard</h2>
                            <p class="content-color-secondary page-sub-title">Creative, amazing, awesome and unique</p>
                        </div>
                        <div class="col-auto">
                            <div id="reportrange" class="btn btn-rounded primary-gradient daterangeheader mr-2">
                                <span></span>
                                <i class="material-icons ml-2">date_range</i>
                            </div>
                            <button class="btn btn-rounded pink-gradient text-uppercase pr-3" data-toggle="modal" data-target="#createOrder"><i class="material-icons">add</i> <span class="text-hide-xs">Transfer</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- content page title ends -->

        <!-- content page -->
        <div class="container mt-4 main-container">
				<?php $this->load->view($content) ?>


        </div>
        <!-- content page ends -->

    </div>
 	<?php $this->load->view('templates/footer') ?>

	
    