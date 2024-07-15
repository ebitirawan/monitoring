<?php $level = $this->session->userdata('level'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="mb-3">
                        <button onclick="tambah()" class="btn btn-primary">Tambah Siswa</button>
                    </div>
                    <table class="table table-striped" id="table-1">
                        <thead>                                 
                            <tr>
                                <th class="text-center">No</th>
                                <th>NISN</th>
                                <th>NAMA SISWA</th>
                                <th>TANGGAL LAHIR</th>
                                <th>JENIS KELAMIN</th>
                                <th>ALAMAT</th>
                                <th>NAMA ORANG TUA</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>    
                            <?php $no = 1;
                            foreach ($Siswa as $d) : ?>                          
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $d->NISN;?></td>
                                <td><?php echo $d->nama_siswa;?></td>
                                <td><?php echo $d->tanggal_lahir;?></td>
                                <td><?php echo $d->jenis_kelamin;?></td>
                                <td><?php echo $d->alamat;?></td>
                                <td><?php echo $d->nama_orang_tua;?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button onclick="editData('<?php echo $d->id_siswa; ?>', '<?php echo $d->nama_siswa; ?>', '<?php echo $d->NISN; ?> ','<?php echo $d->tanggal_lahir; ?>','<?php echo $d->jenis_kelamin; ?>','<?php echo $d->alamat; ?>','<?php echo $d->id_orang_tua; ?>')" class="btn btn-info">EDIT</button> 
                                        <button onclick="deleteData('<?php echo $d->id_siswa; ?>')" class="btn btn-danger">DELETE</button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="updateForm" style="display: none;">
    <h2>Form Edit Data Siswa</h2>
    <form method="post" action="<?php echo base_url('tambah_siswa/updateData'); ?>">
        <input type="hidden" name="id_siswa" id="id_siswa" value="">
        <label for="nisn">NISN:</label><br>
        <input type="text" id="nisn" name="nisn" value="" required><br>

        <label for="nama_siswa">Nama Siswa:</label><br>
        <input type="text" id="nama_siswa" name="nama_siswa" value="" required><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label><br>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="" required><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select><br>
        <label for="nama_orang_tua">Nama Orang Tua:</label><br>
        <select id="nama_orang_tua" name="nama_orang_tua" required>
            <?php foreach($parents as $parent): ?>
                <option value="<?php echo $parent->id_orang_tua;?>"><?php echo $parent->nama_orang_tua;?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat" required></textarea><br>

        <input type="submit" value="Simpan Perubahan">
    </form>
</div>

<script>
    function tambah() {
        window.location.href = "<?php echo site_url('Tambah_siswa'); ?>";
    }

    function editData(id_siswa, nama_siswa, nisn, tanggal_lahir, jenis_kelamin, alamat, id_orang_tua) {
        console.log(id_orang_tua);
        document.getElementById('updateForm').style.display = 'block';
        document.getElementById('id_siswa').value = id_siswa;
        document.getElementById('nama_siswa').value = nama_siswa;
        document.getElementById('nisn').value = nisn;
        document.getElementById('tanggal_lahir').value = tanggal_lahir;
        document.getElementById('jenis_kelamin').value = jenis_kelamin;
        document.getElementById('alamat').value = alamat;
        document.getElementById('nama_orang_tua').value = id_orang_tua;
    }

    function deleteData(id_siswa) {
        if (confirm('Apakah Anda yakin ingin menghapus data siswa ini?')) {
            window.location.href = "<?php echo site_url('Tambah_siswa/deleteData/'); ?>" + id_siswa;
        }
    }
</script>
