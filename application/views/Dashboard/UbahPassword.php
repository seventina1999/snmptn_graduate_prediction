<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ubah Password</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Ubah Password</h6>
            </nav>
            <div class="dropdown">
                <button class="btn bg-gradient-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ni ni-single-02"></i>Hello, <?= $admin['username']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="<?= site_url('Profil/index') ?>">Ganti Password</a></li>
                    <li><a class="dropdown-item" href="<?= site_url('Auth/logout') ?>">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h3 class="text-capitalize mb-4">Ubah Password</h3>
                        <?php echo validation_errors(); ?>
                        <?php if ($this->session->flashdata('success')) : ?>
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')) : ?>
                            <p><?php echo $this->session->flashdata('error'); ?></p>
                        <?php endif; ?>
                        <?php $data = $this->session->userdata(); ?>
                        <form method="POST" action="<?= base_url('Profil/ganti_password'); ?>">
                            <table class="table align-items-center mb-4">
                                <?php echo form_open('password/update_password'); ?>
                                <tbody>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Username</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">:</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            <input type="text" name="password" class="form-control-sm" placeholder="password" value="<?= $admin['username']; ?>" readonly>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Password Lama</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">:</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            <input type="password" name="current_password" class="form-control-sm" id="current_password" placeholder="Masukkan Password Lama" required>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Password Baru</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">:</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            <input type="password" name="new_password" class="form-control-sm" id="new_password" placeholder="Masukkan Password Baru" required>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Password Baru</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">:</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            <input type="password" name="confirm_password" class="form-control-sm" id="confirm_password" placeholder="Ulangi Password yang Baru" required>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="submit" value="Ganti Password" class="btn btn-primary btn-sm mb-4">
                            <?php echo form_close(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>