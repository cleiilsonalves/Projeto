<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 26/10/2017
 * Time: 10:20
 */

?>
<script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />





<div class="panel panel-default">
    <div class="panel-heading">
        <h4> Resultado da Importação</h4>
        <h5 class="text-right text-success" id = "idSucesso">Salvo com Suceeso:<?=$sucesso?></h5>
        <h5 class="text-right text-danger" id = "idFalha">Com Falha:<?=$falha?></h5>
    </div>
    <div class="panel-body">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                <th>#</th>
                <th>Nome</th>
                <th>Documento</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            $sucesso = 0;
            $falha   = 0;
            foreach ($DadosRetorno as $d){
                if($d['STATUS']== 'Salvo com Sucesso!') {
                    $sucesso++;
                    $clase ="success";
                } else{
                    $falha++;
                    $clase ="danger";
                }
                ?>

                <tr class="text-<?=$clase ?>">
                    <td><?= $i ?></td>
                    <td><?= $d['NOME'] ?></td>
                    <td><?= $d['DOC'] ?></td>
                    <td><?= $d['STATUS'] ?></td>
                </tr>
                <?php

                $i++;
            }
            if($i > 1){ ?>
                <script>
                    jQuery(function($) {
                        $('#idSucesso').html('Salvo com Suceeso: '+'<?= $sucesso?>');
                        $('#idFalha').html('Com Falha: '+'<?= $falha?>');
                    });

                </script>


                <?php
            }

            ?>
            </tbody>
        </table>
    </div>
</div>

<script>

   var data = [

    ]

    $(document).ready(function () {
        $('#example').DataTable({
            "processing": true,
            "info": true,
            "stateSave": true,
            data: data,
            "columns": [
                { "data": "#" },
                { "data": "Nome" },
                { "data": "Doc" },
                { "data": "Status" },
            ]
        });
    });



</script>