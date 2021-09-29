<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 18.05.2021
 * Time: 10:24
 */
?>

<div class="modal fade " id="settings" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo _e('Spersonalizowany PDF:', 'pa-pdf-generator') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="atr-2"><?php _e('Nagłówek / Firma:', 'pa-pdf-generator') ?></label>
                    <input name="company" type="text" class="form-control" id="atr-0" placeholder="<?php _e('Nagłówek / Firma:', 'pa-pdf-generator') ?>">
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleFormControlSelect1"><?php _e('Naliczaj marżę w:','pa-pdf-generator')?></label>
                        <select name="money" class="form-control" id="exampleFormControlSelect1">
                            <option value="fix">zl</option>
                            <option value="proc">%</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleFormControlSelect2"><?php _e('Naliczaj / pokaż marżę dla progu:','pa-pdf-generator' )?></label>
                        <select name="gen-qnt" class="form-control" id="exampleFormControlSelect2">
                            <option value="10"><?php _e('od 10 sztuk','pa-pdf-generator')?></option>
                            <option value="100"><?php _e('od 100 sztuk','pa-pdf-generator')?></option>
                            <option value="500"><?php _e('od 500 sztuk','pa-pdf-generator')?></option>
                            <option value="1000"><?php _e('od 1000 sztuk','pa-pdf-generator')?></option>
                            <option value="all"><?php _e('wszystkich - 4 progi','pa-pdf-generator')?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label><h5><?php echo _e('Type product', 'pa-pdf-generator') ?></h5></label>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="atr-1"><?php _e('Marża dla Pamięci USB', 'pa-pdf-generator') ?></label>
                        <input name="usb" type="text" class="form-control" id="atr-1" placeholder="Pageart">
                    </div>
                    <div class="form-group col-6">
                        <label for="atr-2"><?php _e('Marża dla Power Banków', 'pa-pdf-generator') ?></label>
                        <input name="odt" type="text" class="form-control" id="atr-2" placeholder="Pageart">
                    </div>
                    <div class="form-group col-6">
                        <label for="atr-3"><?php _e('Marża dla Ładowarek indukcyjnych', 'pa-pdf-generator') ?></label>
                        <input name="mouse"  type="text" class="form-control" id="atr-3" placeholder="Pageart">
                    </div>
                    <div class="form-group col-6">
                        <label for="atr-4"><?php _e('Marża dla Myszek', 'pa-pdf-generator') ?></label>
                        <input name="ram"  type="text" class="form-control" id="atr-4" placeholder="Pageart">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" aria-label="Close" class="btn btn-primary"><?php _e('Save changes', 'pa-pdf-generator')?></button>
            </div>
        </div>
    </div>
</div>