<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Daftar Mahasiswa</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Default CI CSS -->
	<link href="<?php echo base_url('assets/css/defaultStyle.css') ?>" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<div id="page-top">
		<h1>Daftar Mahasiswa</h1>
		<div id="content-wrapper">
			<div class="container" style="max-width: inherit;">
				Selamat Datang <?php echo $this->session->userdata('user'); //cek session
								?>
				<br />
				<?php if ($this->session->userdata('user') == NULL) { ?>
					<a href="" data-toggle="modal" data-target="#loginModal">Login</a>
				<?php } else { ?>
					<a href="" data-toggle="modal" data-target="#loginModal">Logout</a>
				<?php } ?>
				
				<!-- Tabel Mahasiswa -->
				<?php
				echo anchor('mhs/aMhs/', 'Tambah ', 'title="Tambah Data Mahasiswa"'); // dipindah
				// echo anchor('mhs/upFoto/', ' Upload Foto', 'title="Upload Foto"'); // tambahan
				// echo anchor('mhs/fValid/', 'Form Validasi ', 'title="Form Validasi"'); // tambahan
				echo "<div class='table-responsive'>";
				// if($mhs){
				echo "<table class='table table-bordered'>";
				echo "<tr>
							<th>No.</th>
							<th>NIM</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Foto</th>
							<th>Aksi</th>
						</tr>";
				$no = $page + 1; // hapus $page utk reset ke 1 pd hal berikutnya
				foreach ($results as $d) {
					echo "<tr>
							<td>$no.</td>
							<td>$d[0]</td>
							<td>$d[1]</td>
							<td>$d[2]</td>
							<td><img src='" . base_url('assets/fotoMhs/') . "$d[3]' width='auto' height='90'/>
							</td>
							<td>" .
						anchor('mhs/dMhs/' . $d[0], 'Hapus', 'title="Hapus Data Mahasiswa"') . " | " .
						anchor('mhs/uMhs/' . $d[0], 'Ubah', 'title="Ubah Data Mahasiswa"') . "
							</td>
						</tr>";
					$no++;
				}
				echo "</table>";
				// Pagination
				echo "<center>Halaman : " . $links . "<br /></center>";
				// }
				echo "<br/></div>";
				?>
			</div>
		</div>
		<!-- footer -->
		<p class="footer">Muhammad Arya Java (1811502754) - PEMROGRAMAN WEB 2 (AE)</p>
	</div>
	<!-- Login Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="loginModal">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php if ($this->session->userdata('user') == NULL) { ?>
					<form action="<?php echo base_url('mhs/login') ?>" method="POST">
						<div class="modal-body">
							<div class="form-group">
								<div class="form-label-group">
									<label for="user">Username</label>
									<input type="text" id="user" class="form-control" name="user" placeholder="Username" required="required" autofocus="autofocus">
								</div>
							</div>
							<div class="form-group">
								<div class="form-label-group">
									<label for="pswd">Password</label>
									<input type="password" id="pswd" class="form-control" name="pswd" placeholder="Password" required="required">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary btn-block text-uppercase" value="Login">
							<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				<?php } else { ?>
					<form action="<?php echo base_url('mhs/logout') ?>">
						<div class="modal-body">
							Login sebagai : <?php echo $this->session->userdata('user'); ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary btn-block text-uppercase" value="Logout">
							<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		var login = '<?php echo $this->session->userdata("user"); ?>';
		if (login == 0) {
			$(document).ready(function() {
				$("#loginModal").modal('show');
			});
		};
	</script>
</body>

</html>
