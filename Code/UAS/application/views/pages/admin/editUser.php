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
                    <h5 class="card-title pt-2 d-flex justify-content-center">Edit User</h5>
                </div>
                <div class="card-body">
                    <?php
                        echo form_open(site_url('admin/editUser')); ?>
                        <div class="form-floating"><?php
                        echo form_input(array(
                            'name' => 'id',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'id',
                            'placeholder' => 'Missing ID',
                            'disabled' => true,
                            'value' => $values[0]['id']
                        ));
                        echo form_label("ID", "id", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                        <?php
                        echo form_input(array(
                            'name' => 'id',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'id',
                            'placeholder' => 'Missing ID',
                            'type' => 'hidden',
                            'value' => $values[0]['id']
                        ));?>
                        <br>

                        <div class="form-floating"><?php
                        echo form_input(array(
                            'name' => 'name',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'name',
                            'placeholder' => 'Enter name',
                            'value' => $values[0]['name']
                        ));
                        echo form_label("Name", "name", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                        <br>

                        <div class="form-floating"><?php
                        echo form_input(array(
                            'name' => 'email',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'email',
                            'placeholder' => 'Enter email',
                            'value' => $values[0]['email']
                        ));
                        echo form_label("Email", "email", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                        <br>

                        <div class="form-floating"><?php
                        echo form_input(array(
                            'type' => 'password',
                            'name' => 'password',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'password',
                            'placeholder' => 'Enter password',
                            'value' => $values[0]['password'],
                            'disabled' => true
                        ));
                        echo form_label("Password", "password", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                        <?php
                        echo form_input(array(
                            'type' => 'hidden',
                            'name' => 'password',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'password',
                            'placeholder' => 'Enter password',
                            'value' => $values[0]['password'],
                        ));?>
                        <br>

                        <div class="form-floating"><?php
                        echo form_dropdown('role', array(
                            'GUEST' => 'Guest',
                            'MANAGEMENT' => 'Management',
                            'ADMIN' => 'Admin'
                        ), $values[0]['role'], array(
                            'class' => 'form-select form-select-box',
                            'style' => 'border-radius: 25px',
                            'id' => 'role',
                        ));
                        echo form_label("Role", "role", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                        <hr>
                        <div class="g-recaptcha d-flex justify-content-center" data-sitekey="6LdHQ2cdAAAAACNDcihuXMvpsuXC0IR_yq5Hbg2h"></div>
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
                            'onclick' => "document.location='".site_url('admin/showUser')."'"
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
                        if(isset($_SESSION['invalidEdit'])){
                            echo "<div class='alert alert-danger' style='border-radius: 25px'>" . $this->session->userdata('invalidEdit') . "</div>";
                            $this->session->unset_userdata('invalidEdit');
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