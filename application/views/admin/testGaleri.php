<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="<?= base_url() ?>admin/uploadGaleri" method="post" enctype="multipart/form-data">
      <input type="text" name="dataText" value="" placeholder="input nama ..">
      <input type="file" name="dataGambar" value="">
      <br>
      <br>
      <button type="submit" name="button">Kirim</button>
    </form>
  </body>
</html>
