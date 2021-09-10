<?= $this->extend('checktool/index'); ?>


<?= $this->section('content'); ?>
<br><br><br>
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title poppins text-center bold">DAFTAR KUNCI TERISI</h3>
                        <p class="card-text poppins text-center"><?= strtoupper($teknisi) . ' | ' . strtoupper($caddy); ?></p>
                        <h6 class="card-subtitle mb-2 text-muted text-center"><?= $date . '/' . $month . '/' . $year; ?></h6>
                        <br>
                        <div class="row">
                            <div class="col"><a href="/checktool/<?= $teknisi . '/' . $caddy; ?>" class="btn btn-success poppins float-start mb-5">
                                    <i class="far fa-hand-point-left"></i>
                                    Kembali
                                </a>
                            </div>
                            <div class="col">
                                <form action="/checktool/delete_today" onclick="return confirm('Yakin Hapus Checksheet Hari ini?');">
                                    <input type="hidden" name="teknisi" value="<?= $teknisi; ?>">
                                    <input type="hidden" name="caddy" value="<?= $caddy; ?>">
                                    <button type="submit" class="btn btn-danger poppins float-end mb-5">
                                        <i class="fas fa-eraser"></i>
                                        Hapus Checksheet Hari Ini
                                    </button>
                                </form>
                            </div>
                        </div>
                        <br>
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
                                foreach ($today as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= strtoupper($row->kunci); ?></td>
                                        <td><a id="<?= $row->id; ?>" class="btn btn-primary btnChange" data-id="<?= $row->id; ?>"><?= $row->status; ?></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('body').on('click', '.btnChange', function() {
            var id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: "<?= site_url('checktool/change_status'); ?>",
                data: {
                    kunciId: id
                },
                dataType: "json",
                success: function(response) {
                    btn = document.getElementById(id);
                    btn.innerHTML = response.data;
                }
            });

        });
    });
</script>


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