<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UAS</title>
        <?= $bootstrap ?>
    </head>
    <body>
        <?= $navbar ?>

        <div class="news-header">
            <h1 style="text-align: center">Facility</h1>
        </div>

        <!-- <div class="row mx-5 d-flex justify-content-center"> -->
        <div class="container-fluid">
            <div class="mt-4" style="text-align: center">
                <!-- <a class="btn btn-outline-secondary" href="news.php?kategori=<?= $data['kategori'] ?>"><?= $data['kategori'] ?></a><br><br> -->
                <h3><?= $data[0]['name'] ?></h3>
                <h5>Location: <?= $data[0]['location'] ?> | Open: 08:00 - 22:00</h5>
                <div class="row mx-3">
                    <div class="col-lg-3 col-sm-1"></div>
                    <div class="p-0 card col-lg-6 col-sm-10 my-5" style="border-radius: 25px; box-shadow: 3px 4px 4px #505050">
                        <img style="border-radius: 25px" src="<?= base_url('assets/facility/' . $data[0]['image']) ?>" class="card-img-top">
                    </div>
                    <div class="col-lg-3 col-sm-1"></div>
                </div>
                <br>
                <div class="row mx-3">
                    <div class="col-lg-3 col-sm-1"></div>
                    <div class="mb-5 col-lg-6 col-sm-10" style="text-align: justify">
                        <?= $data[0]['description'] ?>
                    </div>
                    <div class="col-lg-3 col-sm-1"></div>
                </div>
                <div class="row mb-5 mx-3">
                    <span class="col-lg-2 col-sm-1"></span>
                    <span class="col-lg-3 col-sm-4"><a style="border-radius: 25px" class="w-100 btn btn-form btn-outline-success" href="<?= site_url('guest/showBookFacility/'.$data[0]['id']) ?>"><b>Book</b></a></span>
                    <span class="col-lg-2 col-sm-2"></span>
                    <span class="col-lg-3 col-sm-4"><a style="border-radius: 25px" class="w-100 btn btn-form btn-outline-secondary" href="<?= site_url('guest/showFacility') ?>"><b>Cancel</b></a></span>
                    <span class="col-lg-2 col-sm-1"></span>
                </div>
            </div>
        </div>

        <?= $footer ?>
    </body>
</html>