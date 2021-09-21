<h2>Salam... <?=$nama?> dari <?=$alamat?> </h2>
<p>Selamat Datang, di CodeIgniter 3!</p>
<p>Daftar Pendidikan:</p>
<ul>
    <?php foreach($daftarPendidikan as $arrValue) : ?>
    <li><?=$arrValue?></li>
    <?php endforeach ?>
</ul>

<!-- $nama
$alamat -->