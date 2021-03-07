<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
<?php
    

    function splitname($name, $lasname){

        $name_split = '';
        $last_split = '';
        $temp_name = explode(' ', $name);
        $temp_last = explode(' ', $lasname);
        if(isset($temp_name[0])){
            $name_split = $temp_name[0];
        }
        if(isset($temp_last[0])){
            $last_split = $temp_last[0];
        }

        if(strlen($temp_last[0]) == 3){
            if(isset($temp_last[1])){
                $last_split .= ' '.$temp_last[1];
            }
        }

        if(strlen($temp_last[0]) == 2){
            if(isset($temp_last[1])){
                $last_split .= ' '.$temp_last[1];
            }
        }

        return $name_split.' '.$last_split;
    }

    function get_tipo($data){
        if ($data->descarrilado) {
            return "<span class = 'text-danger font-weight-bold'>Descarriado</span>";
        }else{
            if ($data->liderazgo) {
                return "<span class = 'text-primary font-weight-bold'>Líder</span>";
            }
        }

        return "<span class = 'text-secondary font-weight-bold'>Miembro</span>";
    }

    function formatDate($date, $type=1) {
        $date = substr($date, 0, 10);
        $day = date('d', strtotime($date));
        $dia = date('l', strtotime($date));
        $mes = date('F', strtotime($date));
        $year = date('Y', strtotime($date));
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

        if ($type == 1) {
            return "$day $nombreMes, $year";
        }else{
            return "$day de $nombreMes, $year";
        }
    }

?>


    <div style="width:18%;float: left;margin-bottom: 1rem">
        <img  src="/frontend/web/images/logo.png" style='width: 50%;margin-bottom: 0px'>
    </div>

    <div class="font-weight-bold text-dark" style="width:62%;float: left">
        <h1 class="text-secondary" style="font-weight: bold;margin-bottom:0px;padding-top: 0.4rem;font-size: 20px"><span style="font-size: 16px">IGLESIA DE DIOS DE LA PROFECIA</h1>
        <h1 class="text-secondary" style="font-weight: normal;margin-bottom:0px;margin-top: 4px;font-size: 20px"><span style="font-size: 16px">CENTRAL LA ROMANA</h1>
        <h1 class="h3 font-weight-bold" style="margin-top: 1.8rem"><strong>REPORTE DE <?= Yii::$app->request->get()['page'] == 5 ? "LÍDERES" : "USUARIOS" ?></strong></h1>
    </div>

    <div style="width:20%;float: left;margin-bottom: 1rem;text-align: right;text-align: center">
        <img  src="/frontend/web/images/logo-idp.png" style='width: 45%;margin-bottom: 0px;margin-top: -0.5rem'>
        <br>
        <br>
        <span class="font-weight-bold"><?= formatDate(date('Y-m-d')) ?></span>
        <span style="text-align: left">Total: <?= number_format(count($model)) ?></span>
    </div>
    <div class="table-responsive" style="padding-top: 2rem;width: 100%">
        <table class="table" style="border-collapse: collapse;">
            <tr style="padding-top:15px;padding-bottom: 10px;border-bottom:1px solid #ccc;margin-bottom: 10px">
                <td style="padding:4px 4px ;border-bottom: 1px solid #dddddd;font-size: 13px;font-weight:bold;width:20%">Nombre</td>
                <td style="padding:4px 4px ;border-bottom: 1px solid #dddddd;font-size: 13px;font-weight:bold;width:20%">Apellido</td>
                <td style="padding:4px 4px ;border-bottom: 1px solid #dddddd;font-size: 13px;font-weight:bold;width:18%">Grupo</td>
            </tr>
            <?php foreach ($model as $m): ?>
                    <br>
                    <?php 

                    $grupo = \frontend\models\Groups::find()->where(['lider_user_id' => $m->id])->one();
                    $span = "<span >".$grupo['name']."</span>";
                    ?>
                    <tr>
                        <td style="padding:6px 9px 6px 4px;border-bottom: 1px solid #dddddd;font-size: 12px;padding-right: 4px"><?php echo $m->first_name ?></td>
                        <td style="padding:6px 9px 6px 4px;border-bottom: 1px solid #dddddd;font-size: 12px;padding-right: 4px"><?php echo $m->last_name ?></td>

                        <td style="padding:6px 9px 6px 4px;border-bottom: 1px solid #dddddd;font-size: 12px;padding-right: 4px">
                            <?php if ($grupo): ?>
                                <span class=" font-weight-bold p-4" style="font-weight: bold;"><?= $grupo->name ?></span>
                            <?php else: ?>
                                NO ASIGNADO
                            <?php endif ?>
                        </td>
                    </tr>
                    <br>
            <?php endforeach ?>
        </table>
    </div>

    
   
    
    



</body>
</html>