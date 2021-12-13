<div class="mb-3">
    <label class="form-label">Username</label>
    <input class="form-control" type="text" id="username" name='username' required placeholder="Enter your username">
</div>

<div class="mb-3">
    <a href="" class="text-muted float-end"><small>Forgot your password?</small></a>
    <label for="password" id='password' name='password' class="form-label">Password</label>
    <div class="input-group input-group-merge">
        <input type="password" id='password' name='password' class="form-control" placeholder="Enter your password" required>
        <div class="input-group-text" data-password="false">
            <span class="password-eye"></span>
        </div>
    </div>
</div>

<div class="mb-3 mb-3">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="remember" name='remember'>
        <label class="form-check-label" for="checkbox-signin">Remember me</label>
    </div>
</div>

<div class="mb-3 mb-0 text-center">
    <button class="btn btn-primary" type="submit" name='sign-in'> Log In </button>
</div>
<div class="row mt-3">
    <div class="col-12 text-center">
        <p class="text-muted">Don't have an account? <a href="register.php" class="text-muted ms-1"><b>Sign Up</b></a></p>
    </div> <!-- end col -->
</div>