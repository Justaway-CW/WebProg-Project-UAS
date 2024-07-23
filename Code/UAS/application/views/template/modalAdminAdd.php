<div class="modal fade" id="adminuseradd" tabindex="-1" aria-labelledby="adminuseradd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content" style="border-radius: 25px">
            <div class="modal-header">
                <h5 class="modal-title" id="adminuseradd">Add More User</h5>
                <button type="button" class="btn-close" onclick="document.location='<?= site_url('admin/showUser') ?>'" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open(site_url('AdminAddUser/addUser'));
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

                    <?php if(isset($values)){ ?>
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
                    <?php } else { ?>
                            <div class="form-floating"><?php
                                echo form_dropdown('role', array(
                                    'GUEST' => 'Guest',
                                    'MANAGEMENT' => 'Management',
                                    'ADMIN' => 'Admin'
                                ), 'GUEST', array(
                                    'class' => 'form-select form-select-box',
                                    'style' => 'border-radius: 25px',
                                    'id' => 'role',
                                ));
                                echo form_label("Role", "role", array(
                                    "style" => "color: grey"
                                ));
                            ?></div>
                    <?php } ?>
                    <hr>
                    
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
                    if(isset($_SESSION['invalidAdd'])){
                        echo "<div class='alert alert-danger' style='border-radius: 25px'>" . $this->session->userdata('invalidAdd') . "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adminfacilityadd" tabindex="-1" aria-labelledby="adminfacilityadd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content" style="border-radius: 25px">
            <div class="modal-header">
                <h5 class="modal-title" id="adminfacilityadd">Add More User</h5>
                <button type="button" class="btn-close" onclick="document.location='<?= site_url('facility/showFacility') ?>'" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open_multipart(site_url('AddFacility/addFacility'));
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
                        if(form_error('description') != NULL){ ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'description',
                                'class' => 'form-control is-invalid',
                                'style' => 'border-radius: 25px',
                                'id' => 'description',
                                'placeholder' => 'Enter description',
                                'value' => $values['description']
                            ));
                            echo form_label("Description", "description", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } else { ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'description',
                                'class' => 'form-control',
                                'style' => 'border-radius: 25px',
                                'id' => 'description',
                                'placeholder' => 'Enter description',
                                'value' => $values['description']
                            ));
                            echo form_label("Description", "description", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } ?>
                    <?php } else { 
                        if(form_error('description') != NULL){ ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'description',
                                'class' => 'form-control is-invalid',
                                'style' => 'border-radius: 25px',
                                'id' => 'description',
                                'placeholder' => 'Enter description',
                            ));
                            echo form_label("Description", "description", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                        <?php } else { ?>
                            <div class="form-floating"><?php
                            echo form_input(array(
                                'name' => 'description',
                                'class' => 'form-control',
                                'style' => 'border-radius: 25px',
                                'id' => 'description',
                                'placeholder' => 'Enter description',
                            ));
                            echo form_label("Description", "description", array(
                                "style" => "color: grey"
                            ));
                            ?></div>
                    <?php }} ?>
                    <div class="form-text" style="color: #750E0E"><?php echo form_error('description'); ?></div>
                    <br>

                    <?php if(form_error('location') != NULL){ ?>
                        <div class="form-floating"><?php
                        echo form_input(array(
                            'name' => 'location',
                            'class' => 'form-control is-invalid',
                            'style' => 'border-radius: 25px',
                            'id' => 'location',
                            'placeholder' => 'Enter location'
                        ));
                        echo form_label("Location", "location", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                    <?php }else{ ?>
                        <div class="form-floating"><?php
                        echo form_input(array(
                            'name' => 'location',
                            'class' => 'form-control',
                            'style' => 'border-radius: 25px',
                            'id' => 'location',
                            'placeholder' => 'Enter location'
                        ));
                        echo form_label("Location", "location", array(
                            "style" => "color: grey"
                        ));
                        ?></div>
                    <?php } ?>
                    <div class="form-text" style="color: #750E0E"><?php echo form_error('location'); ?></div>
                    <br>

                    <?php
                        echo form_label("Image:", "image", array(
                            "style" => "color: grey"
                        ));
                        echo form_input(array(
                            'type' => 'file',
                            'name' => 'image',
                            'class' => 'form-control',
                            //'style' => 'border-radius: 25px',
                            'id' => 'image',
                        ));
                    ?>

                    <hr> 
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
                    if(isset($_SESSION['invalidAdd'])){
                        echo "<div class='alert alert-danger' style='border-radius: 25px'>" . $this->session->userdata('invalidAdd') . "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>