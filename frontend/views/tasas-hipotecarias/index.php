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

            <table class="table">
                <thead>
                    <tr style="background: white">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataProvider->query->all() as $m): ?>
                        <tr>
                            <th scope="row bg-white text-center" style="background: white">
                                <p class="text-center m-0"><img src="/frontend/web/<?= $m->photo_url ?>" width="150px"></p>
                            </th>
                            <td class="text-white text-center bg-white">
                                <p class="text-center m-0 pt-2 text-darkblue font-weight-bold-2"><?= str_replace('%', '', $m->tasa) ?>%</p>
                            </td>
                            <td class=" bg-white">
                                <p class="text-center m-0 pt-2 font-weight-bold-2"><?= $m->duracion ?></p>
                            </td>
                            <td class="bg-white pt-4">
                                <a href="/frontend/web/tasas-hipotecarias/contactar-oficial?id=<?= $m->id ?>" class="btn btn-gray text-white rounded-3 btn-block btn-sm">CONTACTAR OFICIAL</a>
                            </td>
                        </tr>  
                    <?php endforeach ?>
                
                </tbody>
                <tfoot>
                    <tr style="background: white">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>  