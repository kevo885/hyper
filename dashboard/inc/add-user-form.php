<div id="add-user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">User info</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form action="../inc/server.php" method="post" class="mt-4">
                <div class="row align-items-center">
    <div class="col-md-6 mb-3">
        <div class="form-group mb-4">
            <label for="user_name">Name</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-account-circle"></span></span>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group mb-4">
            <label>Phone</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-phone"></span></span>
                <input type="text" name="phone" class="form-control" placeholder="xxx-xxx-xxxx" required data-toggle="input-mask" data-mask-format="000-000-0000">
            </div>
        </div>
    </div>
</div>
<div class="row align-items-center">
    <div class="col-md-6 mb-3">
        <div class="form-group mb-4">
            <label for="number">Username</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2">@</span>
                <input type="text" name="username" class='form-control' placeholder="Username" required>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group mb-4">
            <label for="number">Password</label>
            <div class="input-group">
            <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>
                <input type="password" name="password" class='form-control' placeholder="Password" required>
            </div>
        </div>
    </div>
</div>
<div class="row align-items-center">
    <div class="col-md-6 mb-3">
        <label for="birthday">Birthday</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-calendar"></span></span>

            <input class="form-control" id="birthday" name='dob' type="text" placeholder="mm/dd/yyyy" required autocomplete="off" data-toggle="input-mask" data-mask-format="00/00/0000">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="gender">Gender</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-gender-female"></span></span>
            <select class="form-select mb-0" id="gender" name='gender' aria-label="Gender" required>
                <option selected disabled hidden style='display: none' value="">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="N/A">Prefer not to say</option>
            </select>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary" name='add_user'>Submit</button>                </form>
            </div>
        </div>
    </div>
</form>
    <!-- modal end -->
</div>