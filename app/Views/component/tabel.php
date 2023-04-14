<table class="table table-striped">
  <thead>
    <tr>
      <th style="width: 10px">No</th>
      <?php foreach ($tabel as $thead) :?>
      <th><?= str_replace('fk_','',$thead)?></th>
      <?php endforeach;?>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($data as $key => $value) :
    ?>
      <tr>
        <td><?= $i++ ?></td>
        <?php foreach ($tabel as $tbody) :?>
        <td><?= $value[$tbody] ?></td>
        <?php endforeach;?>
        <td>
          <button type="button" class="btn btn-warning btn-sm" onclick="edit(<?= $value[$pk] ?>)">
            <i class="fas fa-edit"></i>
          </button>
          <button type="button" class="btn btn-danger btn-sm" onclick="deletes(<?= $value[$pk] ?>)">
            <i class="fas fa-trash"></i>
          </button>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>