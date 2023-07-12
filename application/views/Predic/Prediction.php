<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Masukkan Pilihan</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Masukkan Pilihan</h6>
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
                        <h3 class="text-capitalize mb-4">Prediction Form</h3>
                        <form method="post" action="<?php echo base_url('Predict/predict') ?>">
                            <table class="table align-items-center mb-4">
                                <tbody>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Perguruan Tinggi</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">:</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            <select class="form-control-sm select2" name="ptn">
                                                <?php if ($selectedp == '--Pilih PTN--') { ?>
                                                    <option>--Pilih PTN--</option>
                                                <?php } ?>
                                                <?php foreach ($ptn as $p) : ?>
                                                    <option value="<?= $p['ptn_label']; ?>" <?= ($p['ptn_label'] == $selectedp) ? 'selected' : '' ?>><?= ($selectedp == '--Pilih PTN--') ? $p['ptn'] : $p['ptn'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <!-- <input type="text" step="0.1" name="ptn" class="form-control-sm" placeholder="Perguruan Tinggi" aria-label="number" required value="<?php echo $ptn; ?>"> -->
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Program Studi</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">:</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            <select class="form-control-sm select2" name="prodi" value="<?php echo $prodi2; ?>">
                                                <?php if ($selectedpd == '--Pilih Prodi--') { ?>
                                                    <option>--Pilih Prodi--</option>
                                                <?php } ?>
                                                <?php foreach ($prodi as $pd) : ?>
                                                    <option value="<?= $pd['prodi_label']; ?>" <?= ($pd['prodi_label'] == $selectedpd) ? 'selected' : '' ?>><?= ($selectedpd == '--Pilih Prodi--') ? $pd['prodi'] : $pd['prodi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <!-- <input type="number" step="0.1" name="prodi" class="form-control-sm" placeholder="Program studi" required value="<?php echo $prodi; ?>"> -->
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Nilai</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">:</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            <input type="number" step="0.01" name="nilai" class="form-control-sm" placeholder="Nilai" required value="<?php echo $nilai; ?>">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Sertifikat</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">:</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            <input type="number" step="0.1" name="sertifikat" class="form-control-sm" placeholder="Sertifikat" value="<?php echo $sertifikat; ?>" required>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="submit" value="Predict" class="btn btn-primary btn-sm mb-4">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="row">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h3 class="text-capitalize mb-4">Hasil Prediksi</h3>
                            <div class="mb-3">
                                <input type="text" name="hasil" value="<?php echo $pred; ?>" class="form-control form-control-lg" placeholder="Hasil Prediksi" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>