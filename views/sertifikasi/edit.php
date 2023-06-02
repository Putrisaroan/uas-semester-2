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

            <form role="form" action="<?= base_url; ?>/sertifikasi/updateSertifikasi" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['sertifikasi']['id']; ?>">

                <div class="card-body">

                    <div class="form-group">

                        <label >Nama Sertifikasi</label>

                        <input type="text" class="form-control" placeholder="masukkan nama..." name="nama_sertifikasi" value="<?= $data['sertifikasi']['nama_sertifikasi'];?>">

                    </div>
                    <div class="form-group">

                        <label >Tingkat Sertifikasi</label>

                        <input type="text" class="form-control" placeholder="masukkan tingkat..." name="tingkat_sertifikasi" value="<?= $data['sertifikasi']['tingkat_sertifikasi'];?>">

                    </div>
                    <div class="form-group">

                        <label >Nomor Sertifikasi</label>

                        <input type="number" class="form-control" placeholder="masukkan nomor..." name="nomor_sertifikasi" value="<?= $data['sertifikasi']['nomor_sertifikasi'];?>">

                    </div>
                    <div class="form-group">

                        <label >Tanggal Sertifikasi</label>

                        <input type="date" class="form-control" placeholder="masukkan tanggal..." name="tanggal_sertifikasi" value="<?= $data['sertifikasi']['tanggal_sertifikasi'];?>">

                    </div>

                    <div class="form-group">

                        <label >Lembaga Sertifikasi</label>

                        <select class="form-control" name="lembaga_sertifikasi">

                            <option value="">Pilih lembaga</option>

                            <?php foreach ($data['lembaga'] as $row) :?>

                                <option value="<?= $row['nama_lembaga']; ?>" <?php if($data['sertifikasi']['lembaga_sertifikasi'] == $row['nama_lembaga']) { echo "selected"; } ?>><?= $row['nama_lembaga']; ?></option>

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