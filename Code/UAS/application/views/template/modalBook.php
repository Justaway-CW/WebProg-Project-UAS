<div class="modal fade" id="book" tabindex="-1" aria-labelledby="book" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content" style="border-radius: 25px">
            <div class="modal-header">
                <h5 class="modal-title" id="book">Booking</h5>
                <button type="button" class="btn-close" onclick="document.location='<?= site_url('guest/showRequest') ?>'" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    if(isset($_SESSION['validBook'])){
                        echo "<div class='alert alert-success' style='border-radius: 25px'>" . $this->session->userdata('validBook') . "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>