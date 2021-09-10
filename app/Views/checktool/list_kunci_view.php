<?= $this->extend('checktool/index'); ?>


<?= $this->section('content'); ?>
<br><br>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title poppins text-center bold">DAFTAR KUNCI</h3>
                        <p class="card-text poppins text-center"><?= strtoupper($teknisi) . ' | ' . strtoupper($caddy); ?></p>
                        <h6 class="card-subtitle mb-2 text-muted text-center"><?= $date . '/' . $month . '/' . $year; ?></h6>
                        <br>
                        <a href="/check/check_today/<?= $teknisi . '/' . $caddy; ?>" class="btn btn-success poppins float-end mb-5">
                            Checksheet Hari Ini
                            <i class="far fa-hand-point-right"></i>
                        </a>
                        <br>
                        <form action="/checktool/add" method="POST">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kunci</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kunci as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= strtoupper($row->kunci) . ' ' . $row->ukuran; ?></td>
                                            <td>
                                                <select name="<?= strval($row->id) ?>">
                                                    <option value="V">V</option>
                                                    <option value="H">H</option>
                                                    <option value="R">R</option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="mt-2 text-center">
                                <button type="submit" class="btn btn-primary poppins">
                                    <i class="fas fa-puzzle-piece"></i>
                                    SUBMIT
                                </button>
                            </div>

                            <!-- HIDDEN INPUT -->
                            <input type="hidden" value="<?= $teknisi; ?>" name="teknisi">
                            <input type="hidden" value="<?= $caddy; ?>" name="caddy">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br><br>


<style>
    .card {
        border: none;
        outline: none;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.12),
            0 2px 2px rgba(0, 0, 0, 0.12),
            0 4px 4px rgba(0, 0, 0, 0.12),
            0 8px 8px rgba(0, 0, 0, 0.12),
            0 16px 16px rgba(0, 0, 0, 0.12);
    }
</style>
<?= $this->endSection(); ?>