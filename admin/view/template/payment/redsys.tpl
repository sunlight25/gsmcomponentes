<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-redsys" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <img src="view/image/payment/Redsys.png" alt="" height="65" width="172"/>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-redsys" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_entorno; ?></label>
            <div class="col-sm-10">
              <select name="redsys_entorno">
                <?php if ($redsys_entorno == 'Real') { ?>
                <option value="Real" selected="selected"><?php echo $text_real; ?></option>
                <?php } else { ?>
                <option value="Real"><?php echo $text_real; ?></option>
                <?php } ?>
                <?php if ($redsys_entorno == 'Sis-d') { ?>
                <option value="Sis-d" selected="selected"><?php echo $text_sisd; ?></option>
                <?php } else { ?>
                <option value="Sis-d"><?php echo $text_sisd; ?></option>
                <?php } ?>
                <?php if ($redsys_entorno == 'Sis-i') { ?>
                <option value="Sis-i" selected="selected"><?php echo $text_sisi; ?></option>
                <?php } else { ?>
                <option value="Sis-i"><?php echo $text_sisi; ?></option>
                <?php } ?>
				<?php if ($redsys_entorno == 'Sis-t') { ?>
                <option value="Sis-t" selected="selected"><?php echo $text_sist; ?></option>
                <?php } else { ?>
                <option value="Sis-t"><?php echo $text_sist; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
		  
		  <div class="form-group required">
            <label class="col-sm-2 control-label"><?php echo $entry_nombre; ?></label>
            <div class="col-sm-10">
              <input type="text" name="redsys_nombre" value="<?php echo $redsys_nombre; ?>" class="form-control" />
            </div>
          </div>
		  
		  <div class="form-group required">
            <label class="col-sm-2 control-label"><?php echo $entry_fuc; ?></label>
            <div class="col-sm-10">
              <input type="text" name="redsys_fuc" value="<?php echo $redsys_fuc; ?>" class="form-control" />
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_tipopago; ?></label>
            <div class="col-sm-10">
			  <select name="redsys_tipopago">
                <?php if ($redsys_tipopago == ' ') { ?>
                <option value=" " selected="selected">Todos</option>
                <?php } else { ?>
                <option value=" ">Todos</option>
                <?php } ?>
                <?php if ($redsys_tipopago == 'C') { ?>
                <option value="C" selected="selected">Solo tarjeta</option>
                <?php } else { ?>
                <option value="C">Solo tarjeta</option>
                <?php } ?>
				<?php if ($redsys_tipopago == 'T') { ?>
                <option value="T" selected="selected">Tarjeta y Iupay</option>
                <?php } else { ?>
                <option value="T">Tarjeta y Iupay</option>
                <?php } ?>
              </select>
            </div>
          </div>
		  
		  <div class="form-group required">
            <label class="col-sm-2 control-label" ><?php echo $entry_clave; ?></label>
            <div class="col-sm-10">
              <input type="text" name="redsys_clave" value="<?php echo $redsys_clave; ?>" class="form-control" />
            </div>
          </div>
		  
		  <div class="form-group required">
            <label class="col-sm-2 control-label" ><?php echo $entry_term; ?></label>
            <div class="col-sm-10">
              <input type="text" name="redsys_term" value="<?php echo $redsys_term; ?>" class="form-control" />
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_firma; ?></label>
            <div class="col-sm-10">
			  <select name="redsys_firma">
                <?php if ($redsys_firma == 'Ampliada') { ?>
                <option value="Ampliada" selected="selected">Ampliada</option>
                <?php } else { ?>
                <option value="Ampliada">Ampliada</option>
                <?php } ?>
                <?php if ($redsys_firma == 'Completa') { ?>
                <option value="Completa" selected="selected">Completa</option>
                <?php } else { ?>
                <option value="Completa">Completa</option>
                <?php } ?>
              </select>
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_moneda; ?></label>
            <div class="col-sm-10">
			  <select name="redsys_moneda">
                <?php if ($redsys_moneda == 'EURO') { ?>
                <option value="EURO" selected="selected">EURO</option>
                <?php } else { ?>
                <option value="EURO">EURO</option>
                <?php } ?>
                <?php if ($redsys_moneda == 'DOLAR') { ?>
                <option value="DOLAR" selected="selected">DOLAR</option>
                <?php } else { ?>
                <option value="DOLAR">DOLAR</option>
                <?php } ?>
              </select>
            </div>
          </div>
		  
		  <div class="form-group required">
            <label class="col-sm-2 control-label" ><?php echo $entry_trans; ?></label>
            <div class="col-sm-10">
              <input type="text" name="redsys_trans" value="0" class="form-control" />
            </div>
          </div>
		  
		  <div class="form-group required">
            <label class="col-sm-2 control-label" ><?php echo $entry_recargo; ?></label>
            <div class="col-sm-10">
              <input type="text" name="redsys_recargo" value="00" class="form-control" />
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_notif; ?></label>
            <div class="col-sm-10">
			 <select name="redsys_notif">
                <?php if ($redsys_notif == 'Si') { ?>
                <option value="Si" selected="selected">Si</option>
                <?php } else { ?>
                <option value="Si">Si</option>
                <?php } ?>
                <?php if ($redsys_notif == 'No') { ?>
                <option value="No" selected="selected">No</option>
                <?php } else { ?>
                <option value="No">No</option>
                <?php } ?>
              </select>
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_ssl; ?></label>
            <div class="col-sm-10">
			  <select name="redsys_ssl">
                <?php if ($redsys_ssl == 'Si') { ?>
                <option value="Si" selected="selected">Si</option>
                <?php } else { ?>
                <option value="Si">Si</option>
                <?php } ?>
                <?php if ($redsys_ssl == 'No') { ?>
                <option value="No" selected="selected">No</option>
                <?php } else { ?>
                <option value="No">No</option>
                <?php } ?>
              </select>
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_error; ?></label>
            <div class="col-sm-10">
			  <select name="redsys_error">
                <?php if ($redsys_error == 'Si') { ?>
                <option value="Si" selected="selected">Si</option>
                <?php } else { ?>
                <option value="Si">Si</option>
                <?php } ?>
                <?php if ($redsys_error == 'No') { ?>
                <option value="No" selected="selected">No</option>
                <?php } else { ?>
                <option value="No">No</option>
                <?php } ?>
              </select>
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_idiomas; ?></label>
            <div class="col-sm-10">
			  <select name="redsys_idiomas">
                <?php if ($redsys_idiomas == 'Si') { ?>
                <option value="Si" selected="selected">Si</option>
                <?php } else { ?>
                <option value="Si">Si</option>
                <?php } ?>
                <?php if ($redsys_idiomas == 'No') { ?>
                <option value="No" selected="selected">No</option>
                <?php } else { ?>
                <option value="No">No</option>
                <?php } ?>
              </select>
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
			  <select name="redsys_status">
                <?php if ($redsys_status) { ?>
                <option value="1" selected="selected">Activo</option>
                <option value="0">Desactivo</option>
                <?php } else { ?>
                <option value="1">Activo</option>
                <option value="0" selected="selected">Desactivo</option>
                <?php } ?>
              </select>
            </div>
          </div>
	  
		  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
            <div class="col-sm-10">
              <input type="text" name="redsys_sort_order" value="<?php echo $redsys_sort_order; ?>" class="form-control" />
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $entry_total; ?></label>
            <div class="col-sm-10">
              <input type="text" name="redsys_total" value="<?php echo $redsys_total; ?>" class="form-control" />
            </div>
          </div>
		  
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-geo-zone"><?php echo $entry_geo_zone; ?></label>
            <div class="col-sm-10">
              <select name="redsys_geo_zone_id" id="input-geo-zone" class="form-control">
                <option value="0"><?php echo $text_all_zones; ?></option>
                <?php foreach ($geo_zones as $geo_zone) { ?>
                <?php if ($geo_zone['geo_zone_id'] == $redsys_geo_zone_id) { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?> 