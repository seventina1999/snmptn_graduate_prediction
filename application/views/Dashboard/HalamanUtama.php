<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
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
        <div class="row">
            <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">LULUSAN SNMPTN</p>
                                    <h5 class="font-weight-bolder">
                                        2018
                                    </h5>
                                    <h6><?= $hitung; ?></h6>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder"><?= $hitungLulusan; ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php foreach ($year as $y) : ?>
                <div class="col-xl-3 col-sm-6 mb-xl-2 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">LULUSAN SNMPTN</p>
                                        <h5 class="font-weight-bolder">
                                            <?php echo $y; ?>
                                        </h5>
                                        <span class="text-warning text-sm font-weight-bolder"><?= $hitung[$y]; ?></span>
                                    </div>
                                </div>
                                <div class="col-4 ">
                                    <p class="mb-0 mt-4">
                                    <h3 class="text-success font-weight-bolder"><?= $hitungLulusan[$y]; ?></h3>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</main>