
<div class="container">
    <h1 class="mt-4 mb-3">LogIn</h1>
    <form method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Email</label>
            <input type="password" name="password" placeholder="Passwprd" class="form-control">
        </div>
        <input type="submit" name="btnLogin" value="Login" class="btn btn-primary">
    </form>
</div>

<?php if (@$login): ?>
    <script type="text/javascript">window.location.href="<?php echo BASE_URL; ?>";</script>
<?php endif; ?>

<?php if (@$wrong): ?>
    <div class="alert alert-danger" role="alert">
        Wrong email or password. Please try again.
    </div>
<?php endif; ?>
