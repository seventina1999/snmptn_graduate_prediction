<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Lulusan</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Data Lulusan</h6>
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
            <div class="col-12">
                <div class="card mb-4">
                    <div class="container-fluid py-4">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <form method="POST" action="<?= site_url('importfile/excel') ?>" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required placeholder="Upload File">
                                    <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                                    <!-- <a class="btn bg-primary text-white mb-0">
                                        <i class="fas fa-upload" name="import"></i>&nbsp;&nbsp;Upload File</a> -->
                                    <button type="submit" name="import" class="btn bg-primary text-white mb-0"><i class="fas fa-upload" name="import"></i>&nbsp;&nbsp;Upload File</a></button>
                                </div>
                                <button type="button" class="btn bg-gradient-info" onclick="downloadExcel()">Download Template</button>
                                <script>
                                    function downloadExcel() {
                                        window.location.href = '<?= site_url("importfile/downloadExcel") ?>';
                                    }
                                </script>
                                <?php if ($this->session->flashdata('message')) : ?>
                                    <?php echo $this->session->flashdata('message'); ?>
                                <?php endif; ?>
                                <!-- <div class="form-group mb-0">
                                    <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
                                </div> -->
                            </form>
                            <div class="card mb-4">
                                <div class="table-responsive p-0">
                                    <div class="card-header pb-0">
                                        <h6>Data Lulusan SNMPTN</h6>
                                    </div>
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <table class="table align-items-center mb-0" id="example1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Siswa</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PTN</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Program Studi</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Sertifikat</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($uploadfile) > 0) {
                                                    foreach ($uploadfile as $row) : ?>
                                                        <tr>
                                                            <td class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?= $row->id ?></td>
                                                            <td class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?= $row->nama ?></td>
                                                            <td class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?= $row->kelas ?></td>
                                                            <td class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?= $row->ptn ?></td>
                                                            <td class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?= $row->prodi ?></td>
                                                            <td class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?= $row->nilai ?></td>
                                                            <td class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?= $row->sertifikat ?></td>
                                                            <td class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?= $row->keterangan ?></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="3" class="text-center">Tidak ada data</td>
                                                    </tr>
                                                <?php } ?>
                                                <!-- <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">John Michael</h6>
                                                                <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Manager</p>
                                                        <p class="text-xs text-secondary mb-0">Organization</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main