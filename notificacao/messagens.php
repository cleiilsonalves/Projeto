<?php
/**
 * Created by PhpStorm.
 * User: Cleiilson
 * Date: 22/02/2017
 * Time: 10:42
 */
?>

    <div class="row">
        <div id="msgRetorno" class="modal fade in">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                    <div class="modal-body">
                        <p><?= $_SESSION['msg']?></p>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button class="btn btn-success"  data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> OK </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dalog -->
            </div><!-- /.modal -->
        </div>

