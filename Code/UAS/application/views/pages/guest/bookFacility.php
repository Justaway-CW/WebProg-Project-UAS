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
        <div class="row mx-3">
            <div class="col-lg-3 col-sm-1"></div>
            <div class="card p-0 col-lg-6 col-sm-10 mx-auto my-5" style="border-radius: 30px;">
                <img src="<?= base_url('assets/background/gedungUMN1Long.jpg') ?>" style="border-top-left-radius: 30px; border-top-right-radius: 30px" class="card-img-top" alt="UMN">
                <div class="card-header">
                    <h5 class="card-title pt-2 d-flex justify-content-center">Edit Facility</h5>
                </div>
                <div class="card-body">
                    <?php
                        echo form_open_multipart(site_url('guest/bookFacility')); ?>

                        <div class="form-floating">
                            <select name="id" class="form-select form-select-box" id="role" style="border-radius: 25px">
                                <?php foreach($data as $i){
                                    if($i['id'] == $id){ ?>
                                        <option value="<?= $i['id'] ?>" selected><?= $i['id'] ?> | <?= $i['name'] ?></option>
                                    <?php }else{ ?>
                                        <option value="<?= $i['id'] ?>"><?= $i['id'] ?> | <?= $i['name'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <label for="id" style="color: grey">ID</label>
                            <?php
                            // echo form_dropdown('id', array(
                            //     foreach($data as $i){
                            //         echo $i['id'] . ' => ' . $i['id'] . ',';
                            //     }
                            // ), $id, array(
                            //     'class' => 'form-select form-select-box',
                            //     'style' => 'border-radius: 25px',
                            //     'id' => 'id',
                            // ));
                            // echo form_label("ID", "id", array(
                            //     "style" => "color: grey"
                            // ));
                        ?></div>
                        <br>
                        
                        <?php if(isset($values)){ ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'type' => 'date',
                                'name' => 'date',
                                'class' => 'form-control',
                                'style' => 'border-radius: 25px',
                                'id' => 'date',
                                'placeholder' => 'Enter reservation date',
                                'value' => $values['date']
                            ));
                            echo form_label("Date", "date", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } else { ?>
                            <?php if(form_error('date') != NULL){ ?>
                                <div class="form-floating"><?php
                                echo form_input(array(
                                    'type' => 'date',
                                    'name' => 'date',
                                    'class' => 'form-control is-invalid',
                                    'style' => 'border-radius: 25px',
                                    'id' => 'date',
                                    'placeholder' => 'Enter reservation date'
                                ));
                                echo form_label("Date", "date", array(
                                    "style" => "color: grey"
                                ));
                                ?></div>
                            <?php } else { ?>
                                <div class="form-floating"><?php
                                echo form_input(array(
                                    'type' => 'date',
                                    'name' => 'date',
                                    'class' => 'form-control',
                                    'style' => 'border-radius: 25px',
                                    'id' => 'date',
                                    'placeholder' => 'Enter reservation date'
                                ));
                                echo form_label("Date", "date", array(
                                    "style" => "color: grey"
                                ));
                                ?></div>
                            <?php } ?>
                        <?php } ?>
                        <div class="form-text" style="color: #750E0E"><?php echo form_error('date'); ?></div>
                        <br>

                        <?php if(isset($values)){ ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'type' => 'time',
                                'name' => 'sTime',
                                'class' => 'form-control',
                                'style' => 'border-radius: 25px',
                                'id' => 'sTime',
                                'placeholder' => 'Enter start time',
                                'value' => $values['startTime']
                            ));
                            echo form_label("Start Time", "sTime", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } else { ?>
                            <?php if(form_error('sTime') != NULL){ ?>
                                <div class="form-floating"><?php
                                echo form_input(array(
                                    'type' => 'time',
                                    'name' => 'sTime',
                                    'class' => 'form-control is-invalid',
                                    'style' => 'border-radius: 25px',
                                    'id' => 'sTime',
                                    'placeholder' => 'Enter start time'
                                ));
                                echo form_label("Start Time", "sTime", array(
                                    "style" => "color: grey"
                                ));
                                ?></div>
                                <!-- <div class="form-text" style="color: #750E0E"><?php echo form_error('sTime'); ?></div> -->
                            <?php } else { ?>
                                <div class="form-floating"><?php
                                echo form_input(array(
                                    'type' => 'time',
                                    'name' => 'sTime',
                                    'class' => 'form-control',
                                    'style' => 'border-radius: 25px',
                                    'id' => 'sTime',
                                    'placeholder' => 'Enter start time'
                                ));
                                echo form_label("Start Time", "sTime", array(
                                    "style" => "color: grey"
                                ));
                                ?></div>
                            <?php } ?>
                        <?php } ?>
                        <div class="form-text" style="color: #750E0E"><?php echo form_error('sTime'); ?></div>
                        <br>

                        <?php if(isset($values)){ ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'type' => 'time',
                                'name' => 'eTime',
                                'class' => 'form-control',
                                'style' => 'border-radius: 25px',
                                'id' => 'eTime',
                                'placeholder' => 'Enter end time',
                                'value' => $values['endTime']
                            ));
                            echo form_label("End Time", "eTime", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } else { ?>
                            <?php if(form_error('eTime') != NULL){ ?>
                                <div class="form-floating"><?php
                                echo form_input(array(
                                    'type' => 'time',
                                    'name' => 'eTime',
                                    'class' => 'form-control is-invalid',
                                    'style' => 'border-radius: 25px',
                                    'id' => 'eTime',
                                    'placeholder' => 'Enter end time'
                                ));
                                echo form_label("End Time", "eTime", array(
                                    "style" => "color: grey"
                                ));
                                ?></div>
                                <!-- <div class="form-text" style="color: #750E0E"><?php echo form_error('eTime'); ?></div> -->
                            <?php } else { ?>
                                <div class="form-floating"><?php
                                echo form_input(array(
                                    'type' => 'time',
                                    'name' => 'eTime',
                                    'class' => 'form-control',
                                    'style' => 'border-radius: 25px',
                                    'id' => 'eTime',
                                    'placeholder' => 'Enter end time'
                                ));
                                echo form_label("End Time", "eTime", array(
                                    "style" => "color: grey"
                                ));
                                ?></div>
                            <?php } ?>
                        <?php } ?>
                        <div class="form-text" style="color: #750E0E"><?php echo form_error('eTime'); ?></div>
                        
                        <hr>
                        <?php
                        echo "<br>";
                        ?>
                        <div class="d-flex justify-content-evenly">
                        <?php
                        echo form_button(array(
                            'class' => 'btn btn-outline-secondary btn-form w-25',
                            'style' => 'border-radius: 25px',
                            'id' => 'cancel',
                            'content' => '<b>Cancel</b>',
                            'onclick' => "document.location='".site_url('guest/showFacilityDetail/'.$id)."'"
                        ));
                        echo form_submit(array(
                            'class' => 'btn btn-outline-success btn-form w-25',
                            'style' => 'border-radius: 25px; font-weight: bold;',
                            'id' => 'submit',
                            'value' => 'Submit'
                        ));
                        ?></div><?php
                        echo form_close();
                        echo "<br>";
                        if(isset($_SESSION['invalidBook'])){
                            echo "<div class='alert alert-danger' style='border-radius: 25px'>" . $this->session->userdata('invalidBook') . "</div>";

                            if(isset($schedule)){
                                echo "<div class='alert alert-warning' style='border-radius: 25px'>";
                                echo "Schedules taken for the selected facility:<br>";
                                foreach($schedule as $s){
                                    echo $s['startTime'] . " - " . $s['endTime'] . "<br>";
                                }
                                echo "</div>";
                            }
                            $this->session->unset_userdata('invalidBook');
                        }
                    ?>
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
            </div>
            <div class="col-lg-3 col-sm-1"></div>
        </div>
    </body>
</html>