
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

<div class="col-xl-4 col-md-12">
<img src="<?= base_url() ?>assets/images/galeri/11.jpg" alt="" width="150">
<h6 class="text-center mt-2" style="font-weight:bold;">
<a href="#" class="btn btn-mini btn-mat btn-danger">hapus</a>
</h6>
</div>

<div class="col-xl-4 col-md-12">
<img src="<?= base_url() ?>assets/images/galeri/19.jpg" alt="" width="150">
<h6 class="text-center mt-2" style="font-weight:bold;">
<a href="#" class="btn btn-mini btn-mat btn-danger">hapus</a>
</h6>
</div>

<div class="col-xl-4 col-md-12">
<img src="<?= base_url() ?>assets/images/galeri/20.jpg" alt="" width="150">
<h6 class="text-center mt-2" style="font-weight:bold;">
<a href="#" class="btn btn-mini btn-mat btn-danger">hapus</a>
</h6>
</div>




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
      <input type="file" name="dataGambar" value="" class="form-control">
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
