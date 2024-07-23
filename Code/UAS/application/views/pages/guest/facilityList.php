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
        
        <div class="row mx-5 d-flex justify-content-center">
        <?php foreach($data as $row){ ?>
            <a class="btn my-4 col-lg-5" href="<?= site_url('guest/showFacilityDetail/'.$row['id']) ?>">
                <div class="my-4">
                    <div class="card mx-auto btn-card" style="width: 90%; border-radius: 30px;">
                        <img src="<?= base_url('assets/facility/'.$row['image']) ?>" style="border-top-left-radius: 30px; border-top-right-radius: 30px" class="card-img-top" alt="UMN">
                        <div class="card-header" style="border-bottom-right-radius: 30px; border-bottom-left-radius: 30px">
                            <h5 class="card-title pt-2 d-flex justify-content-center"><?= $row['name'] ?></h5>
                        </div>
                        <!-- <div class="card-body">
                            
                        </div> -->
                    </div>
                </div>
            </a>
        <?php } ?>
        </div>

            <!-- <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div> -->

        <?= $footer ?>
    </body>
</html>