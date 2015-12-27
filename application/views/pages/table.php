  <div class="panel box-shadow-none content-header">
      <div class="panel-body">
        <div class="col-md-12">
             <?php
                  $idme=$this->uri->segment(3);
                  $idmngee=$this->uri->segment(5);
                   ?>
                  <?php if ((!empty($idme)) && (!empty($idmngee))): ?>
                        <h3 class="animated fadeInLeft">Data <?php echo(getpagename($idme,$idmngee));?></h3>
                  <?php else: ?>
                        <h3 class="animated fadeInLeft">Dashboard</h3>
                  <?php endif; ?>

              <div class="col-md-12" style="padding-top:20px;">
                <!---->
                <?php if ($this->uri->segment(5)!=='4') { ?>
                  <?php foreach ($action as $vaction) { ?>
                      <a class="btn" href="<?php echo(site_url('gudang/slug/'.$curmenu.'/'.$vaction['idact'].'/'.$idmnge));?>"><?php echo($vaction['act']);?></a>
                  <?php }?>
                <?php } ?>
              </div>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
      <?php if ((count($data) > 0) && (count($kolom) > 0)){ ?>
      <?php //include APPPATH."views/pages/table-data.php";?>
      <?php include APPPATH."views/pages/table-jq.php";?>
    <?php   }else{ ?>
        <script src="<?php echo base_url().'asset/js/table/jquery-1.11.1.min.js';?>"></script>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong> Warning ! </strong> <p>Tidak ada hasil yang ditampilkan :(</p>
        </div>
    <?php   } ?>
  </div>
  <div class="col-md-2">
    
  </div>
</div>
</div>

