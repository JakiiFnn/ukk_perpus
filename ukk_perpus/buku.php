<div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800 mb-4">Buku</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                <?php
    if(isset($_SESSION['user'])) {
        $user_role = $_SESSION['user']['level'];
        if($user_role != 'petugas') {
            echo '<a href="?page=buku_tambah" class="btn btn-primary mb-4">+ Tambah Buku</a>';
        }
    }
    ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                        <?php 
                        $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $data['kategori']; ?></td>
                                        <td><img src="assets/img/<?php echo $data['gambar']; ?>" width="100"></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td><?php echo $data['penulis']; ?></td>
                                        <td><?php echo $data['penerbit']; ?></td>
                                        <td><?php echo $data['tahun_terbit']; ?></td>
                                        <td><?php echo $data['deskripsi']; ?></td>
                                        <td>
                                            <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-info">Ubah</a>
                                            <a onclick="return confirm('Apakah Anda Yakin akan Menghapus Kategori Ini?')" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </table>                
                </div>
            </div>
        </div>
    </div>