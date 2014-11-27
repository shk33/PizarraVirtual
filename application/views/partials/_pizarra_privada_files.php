<div class="tab-pane fade" id="files">
	<div class="col-lg-12">
	    <div class="panel panel-default filterable">
	        <div class="panel-heading">
	            <h3 class="panel-title">
	              Archivos <span class="space"></span>
	              <button class="btn btn-info btn-filter">
	                <span class="glyphicon glyphicon-filter"></span>Filtrar Resultados
	              </button>
	            </h3>
	        </div>
	        <div class="panel-body">
	            <div class="table-responsive">
	                <table class="table table-bordered table-hover table-striped">
	                    <thead>
	                        <tr class="filters">
	                          <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
	                          <th>Descargar</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                      <?php if (isset($archivos)): ?>
	                          <?php foreach ($archivos as $archivo): ?>
	                              <tr>
	                                <?php $nombre = substr($archivo->nombre , -40)  ?>
	                                <td><?php echo $nombre ?></td>
	                                <td>
	                                    <a href='<?php echo base_url()."archivo/download/$archivo->id" ?>'>
	                                        <button class="btn btn-primary btn-md">Descargar</button>
	                                    </a>
	                                </td>
	                              </tr>
	                          <?php endforeach ?>
	                      <?php endif ?>
	                    </tbody>
	                </table>
	              </div>
	              <!-- End table responsive -->
	            </div>
	            <!-- End Panel body -->
	        </div>
	        <!-- End Panel Default -->
    </div>	
</div>

<!-- Table filters logic -->
<script src="<?php echo base_url(); ?>js/table-filter.js"></script>
