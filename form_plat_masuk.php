<!--
<form action="<?=base_url()?>myqrcode/upload_plat_masuk/<?=$id?>" method="POST"  enctype="multipart/form-data">
  <label for="img">Pilih gambar:</label>
  <input type="file" id="file" name="file" accept="image/*">
  <input type="submit">
</form>
-->

<form action="<?=base_url()?>myqrcode/submit_plat_masuk" method="POST">
  <label for="img">Nomor Plat:</label>
  <input type="text" id="plat" name="plat" />
  <input type="submit">
</form>