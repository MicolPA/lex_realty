<style>
    .table th, .table td{
        border:none !important;
    }

</style>
<div class="container">
    <div class="container">
        <div class="row mt-5 pt-5 m-auto" style="max-width: 800px">
            <div class="bg-darkblue w-100">
                <p class="title-light text-white text-center p-2 m-0">TASA HIPOTECARIA</p>
            </div>

            <div class="accordion w-100 bg-white" id="accordionExample">
                <?php foreach ($dataProvider->query->all() as $m): ?>
                  <div class="card">
                    <div class="card-header bg-white" id="headingOne<?= $m->id ?>">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?= $m->id ?>" aria-expanded="true" aria-controls="collapseOne<?= $m->id ?>">
                          <div class="row">
                                <div class="col-md-6">
                                    <p class="m-0"><img src="/frontend/web/<?= $m->photo_url ?>" width="150px"></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-3">TASA FIJA</p>
                                </div>
                                <div class="col-md-2">
                                    <i class="fas fa-chevron-down fa-lg mt-4 text-darkblue font-weight-lighter"></i>
                                </div>
                          </div>
                        </button>
                      </h2>
                    </div>

                    <div id="collapseOne<?= $m->id ?>" class="collapse" aria-labelledby="headingOne<?= $m->id ?>" data-parent="#accordionExample">
                      <div class="card-body bg-lightgray">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8 text-darkblue">
                                <div class="row pl-5 pr-5 pb-2">
                                    <div class="col-md-6">
                                        <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-1"><?= $m->tipo ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-1"><?= $m->duracion ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-1"><?= $m->tasa ?></p>
                                    </div>
                                </div>
                                <?php if ($m->tasa_2): ?>
                                    <div class="row pl-5 pr-5 border-top pb-2">
                                            <div class="col-md-6">
                                                <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-1"><?= $m->tipo_2 ?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-1"><?= $m->duracion_2 ?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-1"><?= $m->tasa_2 ?></p>
                                            </div>
                                        </div>
                                <?php endif ?>
                                <?php if ($m->tasa_3): ?>
                                    <div class="row pl-5 pr-5 border-top pb-2">
                                        <div class="col-md-6">
                                            <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-1"><?= $m->tipo_3 ?></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-1"><?= $m->duracion_3 ?></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="m-0 pt-2 font-weight-bold-2 text-darkblue font-14 mt-1"><?= $m->tasa_3 ?></p>
                                        </div>
                                    </div>
                                <?php endif ?>

                            </div>

                        </div>
                        <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <a href="/frontend/web/tasas-hipotecarias/contactar-oficial?id=<?= $m->id ?>" class="btn btn-gray text-white rounded-3 btn-block btn-sm">CONTACTAR OFICIAL</a>
                                    </div>
                                </div>
                      </div>
                    </div>
                  </div>
                  
                <?php endforeach ?>
            </div> 
                
        </div>
    </div>
</div>  