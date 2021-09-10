<?= $this->extend('checktool/index'); ?>


<?= $this->section('content'); ?>

<br><br><br><br><br>

<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <h3 class="card-title text-center">Silahkan Login</h3>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <form action="/checktool/login_validation" method="POST">
                                            <br>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama Anda</label>
                                                <select name="username" class="form-control">
                                                    <?php foreach ($list_teknisi as $row) : ?>
                                                        <option value="<?= $row['teknisi']; ?>"><?= $row['teknisi']; ?></option>
                                                    <?php endforeach;; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Pilih Caddy</label>
                                                <select name="caddy" class="form-control">
                                                    <option value="ams">AMS</option>
                                                    <option value="em">EM</option>
                                                    <option value="sata">SATA</option>
                                                    <option value="toyota">TOYOTA</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password" required>
                                            </div>
                                            <div class="col text-center">
                                                <button type="submit" class="btn btn-primary text-center">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- STYLING -->
<style>
    /* FONT */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

    .card {
        font-family: 'Poppins', sans-serif;
        outline: none;
        border: none;
        margin: 0;
        background: #FFDAB9;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
        border-radius: 8px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.12),
            0 2px 2px rgba(0, 0, 0, 0.12),
            0 4px 4px rgba(0, 0, 0, 0.12),
            0 8px 8px rgba(0, 0, 0, 0.12),
            0 16px 16px rgba(0, 0, 0, 0.12);

    }

    .card-title {
        color: #1c1c1c;
    }
</style>

<?= $this->endSection(); ?>