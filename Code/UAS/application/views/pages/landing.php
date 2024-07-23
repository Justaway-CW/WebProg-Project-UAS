<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UAS</title>
        <?= $bootstrap ?>
        <?= $captcha ?>
    </head>
    <body>
        <?= $navbar ?>
        <div class="container-fluid">
            <img width="1500" height="800" style="z-index: -2; position: absolute; opacity: 0.6;" src="<?= base_url('assets/background/landingPage.png') ?>">

            <div id="carouselExampleInterval" class="carousel slide col-lg-6 col-md-8 col-sm-10 mx-auto" style="padding-top: 50px" data-bs-ride="carousel">
                <div class="carousel-inner" style="border-radius: 25px">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="<?= base_url('assets/background/gedungUMN1.jpg') ?>" class="d-block w-100" alt="GedungUMN1">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="<?= base_url('assets/background/gedungUMN2.jpg') ?>" class="d-block w-100" alt="GedungUMN2">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="<?= base_url('assets/background/gedungUMN3.jpeg') ?>" class="d-block w-100" alt="GedungUMN3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="d-flex justify-content-center" style="padding-top: 50px;">
                <h3>UMN Facility Booking</h3><br>
            </div> 
            <div class="d-flex justify-content-center">
                <h5 style='font-size: 15px'>"Excellent Career Begin With Excellent Education"</h5><br>
            </div> 
            <div class="d-flex justify-content-center" style="padding-bottom: 75px">
                <a class="btn btn-outline-secondary btn-shadow" style="border-radius: 20px" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                <span style="width: 25px"></span>
                <a class="btn btn-outline-secondary btn-shadow" style="border-radius: 20px" data-bs-toggle="modal" data-bs-target="#register">Register</a>
            </div>
        </div>

        <?= $modal ?>
    </body>
    <?php if(isset($_SESSION['invalidLogin'])){ ?>
        <script type="text/javascript">
            var myModal = new bootstrap.Modal(document.getElementById('login'), {
                keyboard: false,
                focus: false
            })
            myModal.show()
        </script>
        <?php $this->session->unset_userdata('invalidLogin');
    } ?>
    <?php if(isset($_SESSION['invalidRegister'])){ ?>
        <script type="text/javascript">
            var myModal = new bootstrap.Modal(document.getElementById('register'), {
                keyboard: false,
                focus: false
            })
            myModal.show()
        </script>
        <?php $this->session->unset_userdata('invalidRegister');
    } ?>
</html>