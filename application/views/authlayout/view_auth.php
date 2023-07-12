<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/images/SMAN8.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="<?= base_url('auth/cek_login'); ?>">
                <span class="login100-form-logo">
                    <img src="<?= base_url('assets/') ?>img/sman8.png" class="login100-form-logo">
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    Log in
                </span>

                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-3>', '</small>'); ?>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
                    <?= form_error('password', '<small class="text-danger pl-3>', '</small>'); ?>
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>