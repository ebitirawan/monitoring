<div class="row">
    <div class="col-md-6">
        <h2>Form Tambah Siswa</h2>
        <form method="post" action="<?php echo site_url('tambah_siswa/tambahData'); ?>">
            <label for="nisn">NISN:</label><br>
            <input type="text" id="nisn" name="nisn" required class="form-control" style="width: 300px;"><br>

            <label for="nama_siswa">Nama Siswa:</label><br>
            <input type="text" id="nama_siswa" name="nama_siswa" required class="form-control" style="width: 300px;"><br>

            <label for="tanggal_lahir">Tanggal Lahir:</label><br>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="form-control" style="width: 300px;"><br>

            <label for="jenis_kelamin">Jenis Kelamin:</label><br>
            <select id="jenis_kelamin" name="jenis_kelamin" required  class="form-control" style="width: 300px;">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select><br>

            <label for="id_orang_tua">Nama Orang Tua:</label><br>
			<div class="input-group"> <!-- Menggunakan input-group dari Bootstrap untuk menyatukan elemen -->
				<select id="id_orang_tua" name="id_orang_tua" required class="form-control"> <!-- Menambahkan style="width: 300px;" -->
					<?php foreach($parents as $parent): ?>
						<option value="<?php echo $parent->id_orang_tua; ?>"><?php echo $parent->nama_orang_tua; ?></option>
					<?php endforeach; ?>
				</select>
				<!-- <div class="input-group-append">
					<button onclick="tampilkanFormTambahOrangTua()" class="btn btn-primary" type="button">
						<i class="fas fa-user-plus"></i> 
					</button>
				</div> -->
			</div>

			<label for="id_wali_kelas">Nama Wali:</label><br>
			<div class="input-group"> <!-- Menggunakan input-group dari Bootstrap untuk menyatukan elemen -->
				<select id="id_wali_kelas" name="id_wali_kelas" required class="form-control"> <!-- Menambahkan style="width: 300px;" -->
					<?php foreach($gurus as $guru): ?>
						<option value="<?php echo $guru->id_wali_kelas; ?>"><?php echo $guru->nama_guru; ?></option>
					<?php endforeach; ?>
				</select>
				<!-- <div class="input-group-append"> 
					<button onclick="tampilkanFormTambahOrangTua()" class="btn btn-primary" type="button">
						<i class="fas fa-user-plus"></i> 
					</button>
				</div> -->
			</div>

			<!--  -->
<!-- Script untuk menampilkan form tambah orang tua saat tombol tambah diklik -->
<script>
function tampilkanFormTambahOrangTua() {
    // Menampilkan popup atau modal
    // Anda dapat menggunakan library atau framework seperti Bootstrap Modal atau Lightbox,
    // atau menulis tampilan kustom dengan CSS dan JavaScript.
    // Berikut adalah contoh sederhana menggunakan JavaScript untuk menampilkan popup:
    var popup = document.createElement('div');
    popup.classList.add('popup');

    // Form tambah orang tua
    popup.innerHTML = 
        <div class="popup-content">
            <span class="close" onclick="tutupFormTambahOrangTua()">&times;</span>
            <h2>Form Tambah Orang Tua</h2>
            <form method="post" action="<?php echo site_url('tambah_orang_tua/tambahData'); ?>">
                <label for="id_orang_tua">ID Orang Tua:</label><br>
                <input type="text" id="id_orang_tua" name="id_orang_tua" required><br>

                <label for="nama_orang_tua">Nama Orang Tua:</label><br>
                <input type="text" id="nama_orang_tua" name="nama_orang_tua" required><br>

                <label for="nomor_wa">Nomor WhatsApp:</label><br>
                <input type="text" id="nomor_wa" name="nomor_wa" required><br>

                <input type="submit" value="Tambah Orang Tua">
            </form>
        </div>
    };

 
    document.body.appendChild(popup);
 

function tutupFormTambahOrangTua() {
    var popup = document.querySelector('.popup');
    popup.remove();
}
</script>
            <label for="alamat">Alamat:</label><br>
            <textarea id="alamat" name="alamat" required class="form-control" style="width: 300px;"></textarea><br>

            <!-- Anda juga perlu menyertakan input fields untuk id_guru, id_orang_tua, dan id_kelas -->
            <!-- Contoh: -->
            

            <input type="submit" value="Tambah">
        </form>
    </div>
</div>
