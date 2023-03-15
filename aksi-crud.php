<?php

    //panggil koneksi database
    include "koneksi.php";

    //uji jika tombol simpan diklik
    if(isset($_POST['bsimpan'])){

        //persiapan simpan data baru
        $simpan = mysqli_query($koneksi, "INSERT INTO tmhs(nim, nama, alamat, prodi)
                                          VALUES ('$_POST[tnim]',
                                                  '$_POST[tnama]',
                                                  '$_POST[talamat]',
                                                  '$_POST[tprodi]')");
        //jika simpan suksek
        if($simpan){
            echo "<script>
                    alert('Simpan Data Sukses');
                    document.location = 'index.php';
                  </script>";
        }else{
            echo "<script>
                    alert('Simpan Data Gagal');
                    document.location = 'index.php';
                  </script>";
        }
    }

    //uji jika tombol ubah diklik
    if(isset($_POST['bubah'])){

        //persiapan ubah data
        $ubah = mysqli_query($koneksi, "UPDATE tmhs SET 
                                                        nim = '$_POST[tnim]',
                                                        nama = '$_POST[tnama]',
                                                        alamat = '$_POST[talamat]',
                                                        prodi = '$_POST[tprodi]'
                                                        WHERE id_mhs = '$_POST[id_mhs]'");
        //jika simpan suksek
        if($ubah){
            echo "<script>
                    alert('Update Data Sukses');
                    document.location = 'index.php';
                    </script>";
        }else{
            echo "<script>
                    alert('Update Data Gagal');
                    document.location = 'index.php';
                    </script>";
        }
    }

    //uji jika tombol hapus diklik
    if(isset($_POST['bhapus'])){
        //persiapan hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_POST[id_mhs]'");

        //jika hapus sukses
        if($hapus){
            echo "<script>
                    alert('Hapus Data Sukses');
                    document.location = 'index.php';
                    </script>";
        }else{
            echo "<script>
                    alert('Hapus Data Gagal');
                    document.location = 'index.php';
                    </script>";
        }
    }