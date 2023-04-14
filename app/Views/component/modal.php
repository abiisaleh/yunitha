<!-- modal -->
<div class="modal fade" id="modal-addData">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="form-add">
        <?= csrf_field(); ?>
        <?php foreach ($tabel as $key => $value) :?>
        <?php if (strpos($value,'fk_') !== false) :?>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><?= str_replace('fk_','',$value)?></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="<?=$value?>">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                            </select>
                        </div>
                      </div>
        <?php else:?>
        <div class="form-group row">
          <label for="input<?= $value?>" class="col-sm-4 col-form-label"><?= $value?></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="input<?= $value?>" placeholder="-" name="<?= $value?>">
          </div>
        </div>
        <?php endif;?>
        <?php endforeach;?>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btn-save">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->