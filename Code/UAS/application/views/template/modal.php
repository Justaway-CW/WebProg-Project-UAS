<div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content" style="border-radius: 25px">
            <div class="modal-header">
                <h5 class="modal-title" id="login">Sign In</h5>
                <button type="button" class="btn-close" onclick="document.location='<?= base_url() ?>'" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open(site_url('home/login')); ?>
                    <div class="form-floating"><?php
                    echo form_input(array(
                        'name' => 'emailL',
                        'class' => 'form-control',
                        'style' => 'border-radius: 25px',
                        'id' => 'email',
                        'placeholder' => 'Enter email'
                    ));
                    echo form_label("Email", "email", array(
                        "style" => "color: grey"
                    ));
                    ?></div>
                    <br>

                    <div class="form-floating"><?php
                    echo form_input(array(
                        'type' => 'password',
                        'name' => 'passwordL',
                        'class' => 'form-control',
                        'style' => 'border-radius: 25px',
                        'id' => 'password',
                        'placeholder' => 'Enter password'
                    ));
                    echo form_label("Password", "password", array(
                        "style" => "color: grey"
                    ));
                    ?></div>
                    <hr>
                    <div class="g-recaptcha d-flex justify-content-center" data-sitekey="6LdHQ2cdAAAAACNDcihuXMvpsuXC0IR_yq5Hbg2h"></div>
                    <?php
                    echo "<br>";
                    ?>
                    <div class="d-flex justify-content-center">
                    <?php
                    echo form_submit(array(
                        'class' => 'btn btn-outline-success btn-form w-50',
                        'style' => 'border-radius: 25px',
                        'id' => 'submit',
                        'value' => 'Submit'
                    ));
                    ?></div><?php
                    echo form_close();
                    echo "<br>";
                    if(isset($_SESSION['invalidLogin'])){
                        echo "<div class='alert alert-danger' style='border-radius: 25px'>" . $this->session->userdata('invalidLogin') . "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content" style="border-radius: 25px">
            <div class="modal-header">
                <h5 class="modal-title" id="register">Register</h5>
                <button type="button" class="btn-close" onclick="document.location='<?= base_url() ?>'" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open(site_url('home/register'));
                    if(isset($values)){
                        if(form_error('name') != NULL){ 
                            ?><div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'name',
                                'class' => 'form-control is-invalid',
                                'style' => 'border-radius: 25px',
                                'id' => 'name',
                                'placeholder' => 'Enter name',
                                'value' => $values['name']
                            ));
                            echo form_label("Name", "name", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } else { ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'name',
                                'class' => 'form-control',
                                'style' => 'border-radius: 25px',
                                'id' => 'name',
                                'placeholder' => 'Enter name',
                                'value' => $values['name']
                            ));
                            echo form_label("Name", "name", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } ?>
                    <?php } else {
                        if(form_error('name') != NULL){ 
                            ?><div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'name',
                                'class' => 'form-control is-invalid',
                                'style' => 'border-radius: 25px',
                                'id' => 'name',
                                'placeholder' => 'Enter name',
                            ));
                            echo form_label("Name", "name", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } else { ?>
                        <div class="form-floating"><?php
                        echo form_input(array(
                            'name' => 'name',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'name',
                            'placeholder' => 'Enter name',
                        ));
                        echo form_label("Name", "name", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                    <?php }} ?>
                    <div class="form-text" style="color: #750E0E"><?php echo form_error('name'); ?></div>
                    <br>
                    <?php 
                    if(isset($values)){ 
                        if(form_error('email') != NULL){ ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'email',
                                'class' => 'form-control is-invalid',
                                'style' => 'border-radius: 25px',
                                'id' => 'email',
                                'placeholder' => 'Enter email',
                                'value' => $values['email']
                            ));
                            echo form_label("Email", "email", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } else { ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'email',
                                'class' => 'form-control',
                                'style' => 'border-radius: 25px',
                                'id' => 'email',
                                'placeholder' => 'Enter email',
                                'value' => $values['email']
                            ));
                            echo form_label("Email", "email", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } ?>
                    <?php } else { 
                        if(form_error('email') != NULL){ ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'email',
                                'class' => 'form-control is-invalid',
                                'style' => 'border-radius: 25px',
                                'id' => 'email',
                                'placeholder' => 'Enter email',
                            ));
                            echo form_label("Email", "email", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } else { ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'email',
                                'class' => 'form-control',
                                'style' => 'border-radius: 25px',
                                'id' => 'email',
                                'placeholder' => 'Enter email',
                            ));
                            echo form_label("Email", "email", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                    <?php }} ?>
                    <div class="form-text" style="color: #750E0E"><?php echo form_error('email'); ?></div>
                    <br>

                    <?php if(form_error('password') != NULL){ ?>
                        <div class="form-floating"><?php
                        echo form_input(array(
                            'type' => 'password',
                            'name' => 'password',
                            'class' => 'form-control is-invalid',
                            'style' => 'border-radius: 25px',
                            'id' => 'password',
                            'placeholder' => 'Enter password'
                        ));
                        echo form_label("Password", "password", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                    <?php }else{ ?>
                        <div class="form-floating"><?php
                        echo form_input(array(
                            'type' => 'password',
                            'name' => 'password',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'password',
                            'placeholder' => 'Enter password'
                        ));
                        echo form_label("Password", "password", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                    <?php } ?>
                    <div class="form-text" style="color: #750E0E"><?php echo form_error('password'); ?></div>
                    <br>

                    <?php if(form_error('repassword') != NULL){ ?>
                        <div class="form-floating"><?php
                        echo form_input(array(
                            'type' => 'password',
                            'name' => 'repassword',
                            'class' => 'form-control is-invalid',
                            'style' => 'border-radius: 25px',
                            'id' => 'repassword',
                            'placeholder' => 'Retype password'
                        ));
                        echo form_label("Retype Password", "repassword", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                    <?php }else{ ?>
                        <div class="form-floating"><?php
                        echo form_input(array(
                            'type' => 'password',
                            'name' => 'repassword',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'repassword',
                            'placeholder' => 'Retype password'
                        ));
                        echo form_label("Retype Password", "repassword", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                    <?php } ?>
                    <div class="form-text" style="color: #750E0E"><?php echo form_error('repassword'); ?></div>
                    <hr>
                    <div class="g-recaptcha d-flex justify-content-center" data-sitekey="6LdHQ2cdAAAAACNDcihuXMvpsuXC0IR_yq5Hbg2h"></div>
                    <?php
                    echo "<br>";
                    ?>
                    <div class="d-flex justify-content-center">
                    <?php
                    echo form_submit(array(
                        'class' => 'btn btn-outline-success btn-form w-50',
                        'style' => 'border-radius: 25px',
                        'id' => 'submit',
                        'value' => 'Submit'
                    ));
                    ?></div><?php
                    echo form_close();
                    echo "<br>";
                    if(isset($_SESSION['invalidRegister'])){
                        echo "<div class='alert alert-danger' style='border-radius: 25px'>" . $this->session->userdata('invalidRegister') . "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>