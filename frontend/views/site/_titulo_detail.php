<!-- Modal -->
<div class="modal bg-darkblue fade" id="<?= $id ?>" tabindex="-1" aria-labelledby="slideModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg bg-darkblue">
    <div class="modal-content bg-darkblue border-0">
      <div class="modal-head bg-darkblue pb-2">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body p-0 bg-white rounded">
        <div class="row">
          <div class="col-md-5">
            <div>
              <img src="/frontend/web/<?= $foto ?>" class="d-block w-100" style='height: auto;'>
            </div>
          </div>
          <div class="col-md-7">
            <div class="pt-5">
              <h2 class="mb-4"><?= $titulo ?></h2>
              <p>
                <?= $descripcion ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>