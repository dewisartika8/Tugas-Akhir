<!--
<form action="<?=base_url()?>myqrcode/upload_slot_parkir" method="POST"  enctype="multipart/form-data">
  <label for="img">Pilih gambar:</label>
  <input type="file" id="file" name="file" accept="image/*">
  <input type="submit">
</form>
-->

<form action="<?=base_url()?>myqrcode/submit_slot_parkir" method="POST">
  <label for="img">Slot Parkir:</label>
  <input type="text" id="slot_parkir" name="slot_parkir" />
  <input type="submit">
</form>