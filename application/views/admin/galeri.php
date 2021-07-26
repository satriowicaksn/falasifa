
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
<h5>Galeri Foto</h5>
<span>kelola galeri foto di halaman website</span>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="index.html"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">Galeri</a> </li>
</ul>
</div>
</div>
</div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">


<div class="col-xl-8 col-md-12">
<div class="card latest-update-card">
<div class="card-header">
<h5>Galeri Foto</h5>
</div>
<div class="card-block">
  <br>
<div class="row">


<?php foreach ($galeri as $g): ?>
  <div class="col-xl-4 col-md-12 text-center">
    <div class="img" style="object-fit: contain;">
      <img src="<?= base_url() ?>assets/file_upload/<?= $g->foto ?>" alt="" style="height: 150px; max-width: 150px; object-fit: contain;">
    </div>
  <h6 class="text-center mt-2" style="font-weight:bold;">
    <div class="alert alert-primary">
      Kategori : <?= $g->nama_kategori ?>
    </div>
    <a href="#" data-toggle="modal" data-target="#modal_kategori<?= $g->id_galeri ?>" class="btn btn-mini btn-mat btn-warning mb-2" style="font-weight:bold;">ubah kategori</a>
  <a href="#" data-toggle="modal" data-target="#modal_hapus<?= $g->id_galeri ?>" class="btn btn-mini btn-mat btn-danger mb-2">hapus</a>
  </h6>
  </div>
<?php endforeach; ?>




</div>
</div>
</div>
</div>

<div class="col-xl-4 col-md-12">
<div class="card latest-update-card">
<div class="card-header">
<h5>Tambah Gambar</h5>
</div>
<div class="card-block">
  <form class="" action="<?= base_url() ?>admin/uploadGaleri" method="post" enctype="multipart/form-data">
    <!-- <div class="form-group">
      <label for="">Input text</label>
      <input type="text" name="dataText" value="" class="form-control">
    </div> -->
    <div class="form-group">
      <label for="">Input Gambar</label>
      <input type="file" name="dataGambar" required value="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Pilih Kategori</label>
      <select class="form-control" name="kategori" required style="border: 1px solid;">
        <option value=""> -- Pilih -- </option>
        <?php foreach ($kategori as $k): ?>
          <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
        <?php endforeach; ?>
      </select>
    </div>


    <button type="submit" name="button" class="btn btn-primary btn-sm btn-mat btn-block">Tambah Gambar</button>
  </form>
</div>
</div>
</div>



</div>

</div>
</div>
</div>
</div>
</div>


<?php foreach ($galeri as $g): ?>
<div class="modal fade" id="modal_hapus<?= $g->id_galeri ?>" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Hapus Galeri</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form class="" action="<?= base_url() ?>admin/hapus_galeri" method="post">

<h6 class="text-center">Anda akan menghapus Foto ini ? <br>
  <hr>
<img src="<?= base_url() ?>assets/file_upload/<?= $g->foto ?>" alt="" width="300">
</h6>
<input type="hidden" name="id_galeri" value="<?= $g->id_galeri ?>">

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-danger waves-effect waves-light ">Yes, Delete</button>
</form>
</div>
</div>
</div>
</div>
<?php endforeach; ?>

<?php foreach ($galeri as $g): ?>
<div class="modal fade" id="modal_kategori<?= $g->id_galeri ?>" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Kategori</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form class="" action="<?= base_url() ?>admin/update_kategori_foto" method="post">

<input type="hidden" name="id_galeri" value="<?= $g->id_galeri ?>">
<div class="form-group">
  <label for="">Pilih Kategori</label>
  <select class="form-control" name="kategori" required style="border: 1px solid;">
    <option value="<?= $g->id_kategori ?>"><?= $g->nama_kategori ?></option>
    <?php foreach ($kategori as $k): ?>
      <?php if ($k->id_kategori != $g->id_kategori): ?>
        <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
      <?php endif; ?>
    <?php endforeach; ?>
  </select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
</form>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
