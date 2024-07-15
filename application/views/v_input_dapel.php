<form method="post" action="<?php echo site_url('input_pelanggaran/tambah_pelanggaran'); ?>">
    <div class="form-group">
        <label for="tanggal_pelanggaran">Tanggal Pelanggaran:</label>
        <input type="date" class="form-control" name="tanggal_pelanggaran" id="tanggal_pelanggaran" required>
    </div>
    <div class="form-group">
        <label for="id_siswa">Nama Siswa:</label>
        <select class="form-control" name="id_siswa" id="id_siswa" required>
            <?php foreach ($siswa_list as $siswa): ?>
                <option value="<?php echo $siswa['id_siswa']; ?>">
                    <?php echo $siswa['nama_siswa']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="detail_pelanggaran">Detail Pelanggaran:</label>
        <textarea class="form-control" name="detail_pelanggaran" id="detail_pelanggaran" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Pelanggaran</button>
</form>
