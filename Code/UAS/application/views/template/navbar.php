<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="<?= base_url() ?>"><img src="<?= base_url('assets/background/umn.png') ?>" width="50" height="50">  Universitas Multimedia Nusantara</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-5 ms-auto mb-2 mb-lg-0">
                <?php if(!isset($_SESSION['role'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">UMN Facility Booking</a>
                    </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>" style="background-color: <?php if($this->uri->segment(2, 1) != 'mahasiswa'){echo "rgb(224, 235, 235)";} else {echo "white";} ?>">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('home/mahasiswa') ?>" style="background-color: <?php if($this->uri->segment(2, 1) == 'mahasiswa'){echo "rgb(224, 235, 235)";} else {echo "white";} ?>">Mahasiswa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, <?= $this->session->userdata('admin') ?></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= site_url('home/signOut') ?>">Sign Out</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow" style="background-color: rgba(255,255,255,0.7);">
    <div class="container px-2 py-1">
        <a class="navbar-brand fw-bold" href="<?= base_url() ?>" style="font-size: 16px"><img src="<?= base_url('assets/background/umn.png') ?>" width="45" height="45"> Universitas Multimedia Nusantara</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-center ms-auto me-4 my-3 my-lg-0">
                <?php if(!isset($_SESSION['role'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>" style="font-size: 15px">UMN Facility Booking</a>
                    </li>
                <?php } else { ?>
                <?php if($this->uri->segment(2) == 'showFacility' && ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGEMENT')){ ?>
                    <li class="nav-item"><a class="nav-link me-lg-3 btn-form" data-bs-toggle="modal" data-bs-target="#adminfacilityadd">Add More Facility</a></li>
                <?php } else if($this->uri->segment(2) == 'showUser' || $this->uri->segment(2) == 'showAdminUsers'){ ?>
                    <li class="nav-item"><a class="nav-link me-lg-3 btn-form" data-bs-toggle="modal" data-bs-target="#adminuseradd">Add More User</a></li>
                <?php } else {}?>
                <li class="nav-item">
                    <div class="btn-group" style="display: block">
                        <a type="button" class="btn nav-link" id="dropdownBtn">Hi, <?= $_SESSION['name'] ?> &#11167</a>
                        <div id="options" style="width: 100%; margin: auto; display: none; overflow: visible">
                            <h5 style="color: <?php if($_SESSION['role'] == 'ADMIN') echo '#A20202'; else if($_SESSION['role'] == 'MANAGEMENT') echo '#B96F0F'; else echo '#505050'; ?>"><?= $_SESSION['role'] ?></h5>
                            <hr class="dropdown-divider">

                            <?php if($_SESSION['role'] == 'ADMIN'){ ?>
                            <a class="nav-link" href="<?= site_url('Facility/showFacility') ?>">Facilities</a>
                            <a class="nav-link" href="<?= site_url('admin/showUser') ?>">Users</a>
                            <a class="nav-link" href="<?= site_url('admin/showRequest') ?>">Requests</a>
                            <?php } ?>

                            <?php if($_SESSION['role'] == 'MANAGEMENT'){ ?>
                            <a class="nav-link" href="<?= site_url('Facility/showFacility') ?>">Facilities</a>
                            <a class="nav-link" href="<?= site_url('management/showRequest') ?>">Requests</a>
                            <?php } ?>

                            <?php if($_SESSION['role'] == 'GUEST'){ ?>
                            <a class="nav-link" href="<?= site_url('guest/showFacility') ?>">Facilities</a>
                            <a class="nav-link" href="<?= site_url('guest/showBookFacility/0') ?>">Booking</a>
                            <a class="nav-link" href="<?= site_url('guest/showRequest') ?>">Requests</a>
                            <?php } ?>

                            <hr class="dropdown-divider">
                            <a class="nav-link" href="<?= site_url('home/logout') ?>">Log Out</a>
                        </div>
                    </div>
                </li>
                <?php } ?>
                <!-- <?php
                    //include '..\model\navbar_fetch.php';
                    if(isset($_SESSION['role'])){ ?>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="..\controller\logout.php">Logout</a></li>
                        <li class="nav-item">
                            <div class="card mx-auto my-auto">
                                <div class="card-header p-0">
                                    <div class="row g-0">
                                        <div class="col-sm-2">
                                            <img src="..\assets\profilePictures\<?= $user['profilePicture'] ?>" width="100" height="100" class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-sm-10" style="padding-top: 5%; padding-bottom: 5%">
                                            <?php if($_SESSION['admin'] == true){ ?>
                                                <b><?= $user['firstName'] . " " . $user['lastName'] . " - " . "<span style='color: darkred'><b>ADMIN</b></span>"?></b>
                                            <?php }
                                            else{ ?>
                                                <b><?= $user['firstName'] . " " . $user['lastName'] . " - " . "<span style='color: darkgreen'>GUEST</b></span>"?></b>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php }
                    else{ ?>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="login.php">Login</a></li>
                    <?php }
                ?> -->
                <!-- <li class="nav-item"><a class="nav-link me-lg-3" href="#">Berita</a></li> -->
            </ul>
        </div>
    </div>
</nav>