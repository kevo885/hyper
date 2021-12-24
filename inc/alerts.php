<?php
function message($alert, $message)
{
    $_SESSION['alert'] = $alert;
    $_SESSION['message'] .= $message;
}
if (isset($_SESSION['message']) && isset($_SESSION['alert'])) { ?>
    <div class="<?php echo $_SESSION['alert']?>" role="alert">
    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <i class="dripicons-information me-2"></i> <?php echo $_SESSION['message']; ?>
    </div>
<?php
    unset($_SESSION['message']);
    unset($_SESSION['alert']);
} ?>