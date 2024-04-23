<div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800 mb-4">Peminjaman Buku</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
<?php
    if(isset($_SESSION['user'])) {
        $user_role = $_SESSION['user']['level'];
        if($user_role != 'petugas') {
            echo '<a href="?page=peminjaman_tambah" class="btn btn-primary mb-4">+ Pinjam Buku</a>';
        }
    }
    ?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status Peminjaman</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user=". $_SESSION['user']['id_user']);
            while($data = mysqli_fetch_array($query)){
                ?>
        <tr>
            <td> <?php echo $i++; ?> </td>
            <td> <?php echo $data['nama']; ?> </td>
            <td> <?php echo $data['judul']; ?> </td>
            <td> <?php echo $data['tanggal_peminjaman']; ?> </td>
            <td> <?php echo $data['tanggal_pengembalian']; ?> </td>
            <td> <?php echo $data['status_peminjaman']; ?> </td>
            <td>

            <?php 
                if($data['status_peminjaman'] != 'dikembalikan') {
            ?>

                <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-info"> Ubah</a>
                <a onclick="return confirm('Apakah anda yakin menghapus data ini?');"
                    href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger"> Hapus</a>

                <?php
                }
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>