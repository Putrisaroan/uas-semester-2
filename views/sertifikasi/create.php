<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1><?= $data['title']; ?></h1>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title"><?= $data['title']; ?></h3>

            </div>

            <form role="form" action="<?= base_url; ?>/sertifikasi/simpanSertifikasi" method="POST" enctype="multipart/form-data">

                <div class="card-body">

                    <div class="form-group">

                        <label >Nama sertifikasi</label>

                        <input type="text" class="form-control" placeholder="masukkan nama..." name="nama_sertifikasi" required>

                    </div>
                    <div class="form-group">

                        <label >Tingkat sertifikasi</label>

                        <input type="text" class="form-control" placeholder="masukkan tingkat..." name="tingkat_sertifikasi" required>

                    </div>
                    <div class="form-group">

                        <label >Nomor sertifikasi</label>

                        <input type="number" class="form-control" placeholder="masukkan nomor..." name="nomor_sertifikasi" required>

                    </div>
                    <div class="form-group">

                        <label >Tanggal sertifikasi</label>

                        <input type="date" class="form-control" placeholder="masukkan tanggal..." name="tanggal_sertifikasi" required>

                    </div>

                    <div class="form-group">

                        <label >Lembaga</label>

                        <select class="form-control" name="lembaga_sertifikasi">

                            <option value="">Pilih Lembaga</option>

                            <?php foreach ($data['lembaga'] as $row) :?>

                                <option value="<?= $row['nama_lembaga']; ?>"><?= $row['nama_lembaga']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    

                  

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>

    </section>

</div>
