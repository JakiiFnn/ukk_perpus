<div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800 mb-4">Ulasan Buku</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
        <?php
    if(isset($_SESSION['user'])) {
        $user_role = $_SESSION['user']['level'];
        if($user_role != 'petugas') {
            echo '<a href="?page=ulasan_tambah" class="btn btn-primary mb-4">+ Tambah Ulasan</a>';
        }
    }
    ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Ulasan</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN user on user.id_user = ulasan.id_user LEFT JOIN buku on buku.id_buku = ulasan.id_buku");
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['ulasan']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
                            <td>
                                <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('apakah anda yakin ingin menghapus data ini?');"href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
</div>