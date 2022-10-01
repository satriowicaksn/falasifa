
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
<h5>Data User</h5>
<span>kelola user administrasi</span>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="index.html"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">Data User</a> </li>
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


<div class="col-xl-12 col-md-12">
<div class="card latest-update-card">
<div class="card-header">
<h5>Data User</h5>
<br>
<h6 class="text-right">
<button type="button" data-toggle="modal" data-target="#modal_tambah" class="btn btn-md btn-map btn-primary" name="button">Tambah Data</button>
</h6>
</div>
<div class="card-block">
  <div class="table-responsive mt-2">
  <table class="table table-bordered table-hover m-b-0">
  <thead>
  <tr>
  <th>Nama User</th>
  <th>Username</th>
  <th>Created At</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>

  <?php foreach ($user as $u): ?>
  <tr>
  <td><?= $u->name ?></td>
  <td><?= $u->username ?></td>
  <td><?= date('d/m/Y H:i', strtotime($u->created_at))?></td>
  <td>
    <a href="#" data-toggle="modal" data-target="#modal_update<?= $u->id_user ?>" class="btn btn-sm btn-mat btn-info">Edit</a>
    <a href="#" data-toggle="modal" data-target="#modal_hapus<?= $u->id_user ?>" class="btn btn-sm btn-mat btn-danger">Hapus</a>
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

</div>
</div>
</div>
</div>
</div>

<!-- START MODAL tAMBAH -->
<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Tambah User Baru</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form class="" action="<?= base_url() ?>admin/tambah_user" method="post">

<div class="form-group">
<label>Name</label>
<input type="text" name="name" required class="form-control" value="">
</div>

<div class="form-group">
<label>Username</label>
<input type="text" name="username" required class="form-control" value="">
</div>

<div class="form-group">
  <label>Password</label>
  <input type="password" name="password" required class="form-control" value="">
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
</form>
</div>
</div>
</div>
</div>
<!-- END MODAL tAMBAH -->



<!-- START MODAL UPDATE -->
<?php foreach ($user as $u): ?>
  <div class="modal fade" id="modal_update<?= $u->id_user ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title">Update data user</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <form class="" action="<?= base_url() ?>admin/update_user" method="post">

  <div class="form-group">
  <label>Name</label>
  <input type="text" name="name" required class="form-control" value="<?= $u->name ?>">
  </div>

  <div class="form-group">
  <label>Username</label>
  <input type="text" name="username" required class="form-control" value="<?= $u->username ?>">
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" required class="form-control" value="<?= $u->password ?>">
  </div>

  <input type="hidden" name="id_user" value="<?= $u->id_user ?>">

  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
  </form>
  </div>
  </div>
  </div>
  </div>
<?php endforeach; ?>
<!-- END MODAL UPDATE -->


<!-- START MODAL HAPUS -->
<?php foreach ($user as $u): ?>
  <div class="modal fade" id="modal_hapus<?= $u->id_user ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title">Hapus User</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <form class="" action="<?= base_url() ?>admin/hapus_user" method="post">

  <h6>Anda akan menghapus User <u><?= $u->name ?></u>?</h6>
  <input type="hidden" name="id_user" value="<?= $u->id_user ?>">

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
<!-- END MODAL HAPUS -->
