<?php
    //panggil database
    include "koneksi.php";
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD - PHP & MySQL + Modal Bootstrap 5</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">

            <div class="mt-3">
                <h3 class="text-center">CRUD - PHP & MySQL + Modal Bootstrap 5</h3>
            </div>
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    DATA MAHASISWA
                </div>
                <div class="card-body">
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        Tambah Data
                    </button>
                    <!--Akhir button trigger modal -->
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>

                        <?php
                            //persiapan menampilkan data
                            $no = 1;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs DESC");

                            while($data = mysqli_fetch_array($tampil)):
                        ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nim']?></td>
                            <td><?= $data['nama']?></td>
                            <td><?= $data['alamat']?></td>
                            <td><?= $data['prodi']?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>" >Ubah</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>" >Hapus</a>
                            </td>
                        </tr>

                        <!-- Awal Modal Ubah -->
                        <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="aksi-crud.php">
                                    <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">

                                    <div class="modal-body">
                                
                                        <div class="mb-3">
                                            <label class="form-label">NIM</label>
                                            <input type="text" class="form-control" name="tnim" value="<?= $data['nim']?>" placeholder="Masukan NIM Anda">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="tnama" value="<?= $data['nama']?>" placeholder="Masukan Nama Anda">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea class="form-control" name="talamat" rows="3"><?= $data['alamat']?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Prodi</label>
                                            <select class="form-select" name="tprodi">
                                                <option value="<?= $data['prodi']?>"><?= $data['prodi']?></option>
                                                <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                                                <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                                <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                            </select>
                                        </div>
                                

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    <!-- Akhir Modal Ubah -->


                    <!-- Awal Modal Hapus -->
                    <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="aksi-crud.php">
                                    <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">

                                    <div class="modal-body">
                                
                                        <h5 class="text-center">Apakah anda ingin menghapus data ini ? <br>
                                        <span class="text-danger"><?= $data['nim']?> - <?= $data['nama']?></span>
                                        </h5>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    <!-- Akhir Modal Hapus -->

                        <?php endwhile; ?>
                    </table>

                    

                    <!-- Awal Modal -->
                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="aksi-crud.php">
                            <div class="modal-body">
                            
                                <div class="mb-3">
                                    <label class="form-label">NIM</label>
                                    <input type="text" class="form-control" name="tnim" placeholder="Masukan NIM Anda">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="tnama" placeholder="Masukan Nama Anda">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" name="talamat" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Prodi</label>
                                    <select class="form-select" name="tprodi">
                                        <option value=""></option>
                                        <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                                        <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                        <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                    </select>
                                </div>
                            

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    <!-- Akhir Modal -->

                </div>
            </div>
        </div>

       




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>