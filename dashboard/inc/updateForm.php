<div class="row align-items-center">
    <div class="col-md-6 mb-3">
        <div class="form-group mb-4">
            <label for="user_name">Name</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-account-circle"></span></span>
                <input type="text" name="newName" class="form-control" placeholder="Name">
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group mb-4">
            <label>Phone</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-phone"></span></span>
                <input type="text" name="phone" class="form-control" placeholder="xxx-xxx-xxxx" data-toggle="input-mask" data-mask-format="000-000-0000">
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
                <input type="text" name="newUsername" class='form-control' placeholder="Username">
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
                <input type="password" name="newPassword" class='form-control' placeholder="Password">
            </div>
        </div>
    </div>
</div>
<div class="row align-items-center">
    <div class="col-md-6 mb-3">
        <label for="birthday">Birthday</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-calendar"></span></span>

            <input class="form-control" id="birthday" name='dob' type="text" placeholder="mm/dd/yyyy" autocomplete="off" data-toggle="input-mask" data-mask-format="00/00/0000">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="gender">Gender</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-gender-female"></span></span>
            <select class="form-select mb-0" id="gender" name='gender' aria-label="Gender">
                <option selected disabled hidden style='display: none' value="">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="N/A">Prefer not to say</option>
            </select>
        </div>
    </div>
</div>
<?php if(isset($_GET['id']))
echo '<button class="btn btn-primary rounded-pill mb-4" type="submit" name="update-teacher">Save your changes</button>';

else
echo '<button class="btn btn-primary rounded-pill mb-4" type="submit" name="updateUser">Save your changes</button>';

?>