<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Data Mahasiswa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Default CI CSS -->
    <link href="<?php echo base_url('assets/css/defaultStyle.css') ?>" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div id="container">
        <h1>Tambah Data Mahasiswa</h1>
        <div id="body">
            <!-- form tambah mahasiswa -->
            <?php if ($this->session->userdata('user') == NULL) {
                redirect('mhs/vMhs'); ?>
            <?php
            } else {
                //echo form_open('mhs/submit');
                echo form_open_multipart('mhs/do_upload');
                echo "<pre>";
                $nim = array(
                    'name'  => 'nim',
                    'id'  => 'nim',
                    'value'  => '1811502754',
                    'maxlength'  => '10',
                    'size'  => '10',
                    'style'  => 'color: blue'
                );
                echo "NIM	: " . form_input($nim) . "<br />";
                $nama = array(
                    'name'  => 'nama',
                    'id'  => 'nama',
                    'value'  => 'Arya',
                    'maxlength'  => '50',
                    'size'  => '30',
                    'style'  => 'color: blue'
                );
                echo "Nama	: " . form_input($nama) . "<br />";
                $alamat = array(
                    'name'  => 'alamat',
                    'id'  => 'alamat',
                    'value'  => 'Jl. Sabar 1',
                    'rows'  => '5',
                    'cols'  => '30',
                    'style'  => 'color: blue'
                );
                echo "Alamat	: " . form_textarea($alamat) . "<br />";
                // upload
                $foto = array(
                    'name'  => 'foto',
                    'id'  => 'foto',
                );
                echo "Foto	: " . form_upload($foto) . "<br /><br />";
                //echo "<input type='file' id='var[3]' name='var[3]' size='20'/><br/><br/>";
                echo "<a href='" . base_url() . "mhs/vMhs'>Kembali</a> "; //tambahan
                echo form_submit('submit', 'Simpan');
                echo "</pre>";
                echo form_close();

                if (isset($submitted)) {
                    echo "Data berhasil disimpan. ";
                    echo "<a href='" . base_url() . "mhs/vMhs'>Kembali</a>";
                } else
                    echo $error;
            } ?>
        </div>
        <!-- footer -->
        <p class="footer">Muhammad Arya Java (1811502754) - PEMROGRAMAN WEB 2 (AE)</p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>