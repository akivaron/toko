<?php
if (isset($_GET['d'])) {
    $idne=htmlspecialchars($_GET['d']);
    $rtrime=rtrim($idne);
    if (empty($rtrime)) {
        unset($_GET['d']);
        redirect(site_url('gudang/slug/4/4/5'),'refresh');   
    }else{
        $this->db->where('id',$rtrime);
        $this->db->update('user',array('acc'=>'0'));
        redirect(site_url('gudang/slug/4/4/5'),'refresh');   
    }
}
if (isset($_GET['e'])) {
    $idne=htmlspecialchars($_GET['e']);
    $rtrime=rtrim($idne);
    if (empty($rtrime)) {
        unset($_GET['e']);
        redirect(site_url('gudang/slug/4/4/5'),'refresh');   
    }else{
        $this->db->where('id',$rtrime);
        $this->db->update('user',array('acc'=>'1'));
        redirect(site_url('gudang/slug/4/4/5'),'refresh');   
    }
}
$cekcab=cekurlid('jabatan','kdcapab');
$cekur=cekurlid('user','id');
if ((isset($_GET['kdc'])) && (in_array($_GET['kdc'], $cekcab)) && (isset($_GET['idue'])) && (in_array($_GET['idue'], $cekur))) {
    $c=htmlspecialchars($_GET['kdc']);
    $u=htmlspecialchars($_GET['idue']);
    $trc=rtrim($c);$tru=rtrim($u);
    if ((empty($trc)) || (empty($tru))) {
        redirect(site_url('gudang/slug/4/4/5?n=0'),'refresh');
    }else{
        $this->db->where('id',$tru);
        $qupc=$this->db->update('user',array('kdcapab'=>$trc));
        if ($qupc) {
            redirect(site_url('gudang/slug/4/4/5'),'refresh');
        }
    }
}
?>

<script>

$(document).ready(function() {
    /*$(document).ready(function() {
        $('#example').DataTable();     
    });*/
// Setup - add a text input to each footer cell
$('#example tfoot th').each( function () {
    var title = $('#example thead th').eq( $(this).index() ).text();
    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
} );
 
// DataTable
var table = $('#example').DataTable();
 
// Apply the filter
table.columns().eq( 0 ).each( function ( colIdx ) {
    $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
        table
            .column( colIdx )
            .search( this.value )
            .draw();
    } );
} );
    
});
</script>
<div class="panel">
    <div class="panel-body">
        <div class="page-header">
        <?php echo $this->pagination->create_links();?>
    </div>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    <?php if (count($kolom) > 0): ?>
                            <?php
                            switch ($namatbl) {
                                case 'user': ?>
                                  <th>
                                        switch
                                    </th>
                                    <th>
                                        role
                                    </th>
                                <?php    break;
                                case 'quotation': ?>
                                    <th >Approval</th>
                                    <th>Aksi</th>
                                    <th>
                                       preview 
                                    </th>
                                <?php    break;
                                case 'invoice': ?>
                                    <th>Approval</th>
                                    <th>Aksi</th>
                                    <th>
                                       preview 
                                    </th>
                                <?php    break;
                                case 'antrian': ?>
                                    <th>Aksi</th>
                                    <?php if (is_mimin() || is_admin()) : ?>
                                    <th>Tindakan</th>
                                    
                                    <?php endif; ?>
                                <?php    break;
                                case 'request': ?>
                                    <th>Aksi</th>
                                    <th>status</th>
                                <?php    break;
                                case 'brosur': ?>

                                    <th>preview</th>
                                <?php    break;
                                case 'barang': ?>
                                    <th>Aksi</th>
                                    <th>brosur</th>
                                    <th>posting</th>
                                <?php    break;
                                default: ?>
                                    <th >Aksi</th>
                                <?php    break;
                            }
                            ?>
                        <?php foreach ($kolom as $valkolom) { ?>
                        <th>
                            <?php switch ($valkolom) {
                                
                                case 'idcus':
                                    echo('customer');
                                    break;
                                case 'iduser':
                                    echo('username');
                                    break;
                                default:
                                    echo($valkolom);
                                    break;
                            }
                            ?>
                        </th>
                        <?php } ?>
                    <?php else:?>
                        <th>tidak ada hasil</th>
                    <?php endif;?>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <?php if (count($kolom) > 0): ?>
                    <?php
                            switch ($namatbl) {
                                case 'user': ?>
                                    <th>
                                        switch
                                    </th>
                                    <th>
                                        role
                                    </th>
                                <?php    break;
                                case 'quotation': ?>
                                    <?php if (is_admin()): ?>
                                        <th >Approval</th>
                                    <?php endif; ?>
                                    <th>Aksi</th>
                                    <th>
                                       preview 
                                    </th>
                                <?php    break;
                                case 'invoice': ?>
                                    <?php if (is_admin()): ?>
                                        <th>Approval</th>
                                    <?php endif; ?>
                                    <th>Aksi</th>
                                    <th>
                                       preview 
                                    </th>
                                <?php    break;
                                case 'antrian': ?>
                                    <th>Aksi</th>
                                    <?php if (is_mimin() || is_admin()) : ?>
                                    <th>Tindakan</th>
                                    
                                    <?php endif; ?>
                                <?php    break;
                                case 'request': ?>
                                    <th>Aksi</th>
                                    <th>status</th>
                                <?php    break;
                                case 'brosur': ?>
                                    
                                    <th>preview</th>
                                <?php    break;
                                case 'barang': ?>
                                    <th>Aksi</th>
                                    <th>brosur</th>
                                    <th>posting</th>
                                <?php 
                                break;
                                default: ?>
                                    <th >Aksi</th>
                                <?php    break;
                            }
                            ?>
                        <?php foreach ($kolom as $valkolom) { ?>
                            <th>
                            <?php switch ($valkolom) {
                                case 'idcus':
                                    echo('customer');
                                    break;
                                case 'iduser':
                                    echo('username');
                                    break;
                                default:
                                    echo($valkolom);
                                    break;
                            }
                            ?>
                        </th>
                        <?php } ?>
                    <?php else:?>
                        <th>tidak ada hasil</th>
                    <?php endif;?>
                    </tr>
                </tfoot>
                <tbody>
        <?php if ((count($data) > 0) && (count($kolom) > 0)) : ?>
        <?php foreach ($data as $valdata) { //'gudang/reqbrosur/'?>
        <tr>
            <?php
                            switch ($namatbl) {
                                case 'user': ?>
                                    <th>
                                        <?php 
                                        $acc=rtrim($valdata['acc']);
                                        if($acc==='1'): ?> 
                                        <a href="<?php echo(current_url().'?d='.$valdata[$fkolm]);?>" class="btn btn-sm btn-danger">disable</a>
                                        <?php else: ?>
                                        <a href="<?php echo(current_url().'?e='.$valdata[$fkolm]);?>" class="btn btn-sm btn-success">enable</a>
                                        <?php endif; ?>
                                    </th>
                                    <th>
                                        <div class="btn-group" role="group" aria-label="...">
                                        <?php if ((isset($_GET['r'])) && (in_array($_GET['r'], $cekur)) && ($_GET['r']===$valdata[$fkolm])) { ?>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Role
                                                <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                <?php $jbtn=getkdcab();?>
                                                <?php if ($jbtn): ?>
                                                    <?php foreach ($jbtn as $valjbtn) {?>
        <li><a href="<?php echo current_url().'?kdc='.$valjbtn['kdcapab'].'&idue='.$valdata[$fkolm];?>"><?php echo($valjbtn['jabatan']);?>
        </a></li>
                                                    <?php } ?>
                                                <?php else: ?>
                                                    <li><a href="#">Null</a></li>
                                                <?php endif;?>
                                                </ul>
                                                </div>
                                        <?php }else{ ?>
        <button type="button" class="btn btn-sm btn-default"><?php echo(returncab($valdata['kdcapab']));?></button>
        <a href="<?php echo(current_url().'?r='.$valdata[$fkolm]);?>" class="btn btn-sm btn-default">edit</a>
                                        <?php } ?>
                                                
                                                </div>
                                        </th>
                                <?php    break;
                                case 'quotation': ?>
                                    
                                    <td>
                                    <?php if (getacc($valdata[$fkolm],$mng)) { ?>
                                        <?php if (ceksent($valdata[$fkolm],$mng)) { ?>
                                            ok
                                        <?php }else{ ?>
                                            <a href="<?php echo site_url('gudang/setemail/'.$valdata[$fkolm].'/'.$mng);?>" class="btn btn-success">send email</a>
                                        <?php }?>
                                    <?php }else{ ?>
                                        <?php if (is_admin()): ?>
                                        <div class="btn-group" role="group"  >
                                        <a href="<?php echo(site_url('gudang/setacc/'.$mng.'/'.$valdata[$fkolm]));?>"  class="btn btn-sm btn-success" role="group">Acc</a>
                                        <a href="<?php echo(site_url('gudang/rejectedsend/'.$valdata[$fkolm].'/'.$mng));?>"  class="btn btn-sm btn-danger" role="group">decline</a>
                                        </div>
                                        <?php else: ?>
                                            pending
                                        <?php endif; ?>
                                    <?php }?>
                                    </td>
                                    <td >
                                    <div class="btn-group" role="group"  >
                                        <?php
                                        $cektemp=gettemp_data($valdata[$fkolm],$namatbl);
                                        if ($cektemp): ?> 
                                            <span class="<?php echo($cektemp['klas']);?>" data-toggle="tooltip" data-placement="top" title="<?php echo($cektemp['toolstip']);?>"></span >
                                            <?php
                                            if (is_admin()) { ?>
                                                <a href="<?php echo(site_url('gudang/deltempdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-success" role="group">Acc</a>
                                                <a href="<?php echo(site_url('gudang/deltdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-danger" role="group">Reject</a>
                                            <?php } ?>
                                        <?php else : ?>
                                        <a href="<?php echo(site_url('gudang/edit/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">edit</a>
                                        <a href="<?php echo(site_url('gudang/delete/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">delete</a>
                                       <?php
                                        if (($valdata['acc']==='1')) {
                                            $cekinc=cekurlid('invoice','kdinv');
                                            $kdiin=cekurlid('invoice','id');
                                            if ($cekinc){
                                                $cekq = array_map(function($val) { return $val=substr($val, 14); }, $cekinc);
                                                if (($kin=array_search($valdata[$fkolm], $cekq))!==false) { ?>
                                                         <a href="<?php echo(site_url('gudang/createpdf/6/'.$kdiin[$kin].'/'.$valdata['iduser']));?>"  class="btn btn-sm btn-success" role="group">view invoice</a>
                                                            <?php }else{ ?>
                                                        <a href="<?php echo(site_url('gudang/createinv/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-success" role="group">create invoice</a>
                                                            <?php } ?>
                                            <?php }else{ ?>
                                                <a href="<?php echo(site_url('gudang/createinv/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-success" role="group">create invoice</a>
                                            <?php }
                                        } ?>
                                        <?php endif;?>
                                        </div>
                                    </td>
                                    <td>
                                       <a href="<?php echo(site_url('gudang/createpdf/'.$mng.'/'.$valdata[$fkolm].'/'.$valdata['iduser']));?>"  class="btn btn-sm btn-primary" role="group">preview</a>
                                    </td>
                                <?php    break;
                                case 'invoice': ?>
                                    <td>
                                    <?php if (getacc($valdata[$fkolm],$mng)) { ?>
                                        <?php if (ceksent($valdata[$fkolm],$mng)) { ?>
                                            ok
                                        <?php }else{ ?>
                                            <a href="<?php echo site_url('gudang/setemail/'.$valdata[$fkolm].'/'.$mng);?>" class="btn btn-success">send email</a>
                                        <?php }?>

                                    <?php }else{ ?>
                                        <?php if (is_admin()): ?>
                                        <div class="btn-group" role="group"  >
                                        <a href="<?php echo(site_url('gudang/setacc/'.$mng.'/'.$valdata[$fkolm]));?>"  class="btn btn-sm btn-success" role="group">Acc</a>
                                        <a href="<?php echo(site_url('gudang/rejectedsend/'.$valdata[$fkolm].'/'.$mng));?>"  class="btn btn-sm btn-danger" role="group">decline</a>
                                        </div>
                                        <?php else: ?>
                                            pending
                                        <?php endif; ?>
                                    <?php }?>
                                    </td>
                                    <td >
                                    <div class="btn-group" role="group"  >
                                        <?php
                                        $cektemp=gettemp_data($valdata[$fkolm],$namatbl);
                                        if ($cektemp): ?> 
                                            <span class="<?php echo($cektemp['klas']);?>" data-toggle="tooltip" data-placement="top" title="<?php echo($cektemp['toolstip']);?>"></span >
                                            <?php
                                            if (is_admin()) { ?>
                                                <a href="<?php echo(site_url('gudang/deltempdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-success" role="group">Acc</a>
                                                <a href="<?php echo(site_url('gudang/deltdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-danger" role="group">Reject</a>
                                            <?php } ?>
                                        <?php else : ?>
                                        <a href="<?php echo(site_url('gudang/edit/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">edit</a>
                                        <a href="<?php echo(site_url('gudang/delete/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">delete</a>
                                        <?php endif;?>
                                        </div>
                                    </td>
                                    <td>
                                       <a href="<?php echo(site_url('gudang/createpdf/'.$mng.'/'.$valdata[$fkolm].'/'.$valdata['iduser']));?>"  class="btn btn-sm btn-primary" role="group">preview</a>
                                    </td>
                                <?php    break;
                                case 'antrian': ?>
                                    <td >
                                    <div class="btn-group" role="group"  >
                                        <?php
                                        $cektemp=gettemp_data($valdata[$fkolm],$namatbl);
                                        if ($cektemp): ?> 
                                            <span class="<?php echo($cektemp['klas']);?>" data-toggle="tooltip" data-placement="top" title="<?php echo($cektemp['toolstip']);?>"></span >
                                            <?php
                                            if (is_admin()) { ?>
                                                <a href="<?php echo(site_url('gudang/deltempdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-success" role="group">Acc</a>
                                                <a href="<?php echo(site_url('gudang/deltdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-danger" role="group">Reject</a>
                                            <?php } ?>
                                        <?php else : ?>
                                        
                                        <a href="<?php echo(site_url('gudang/delete/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">delete</a>
                                        <?php endif;?>
                                        </div>
                                    <td>
                                    <?php
                                    $statuss=rtrim($valdata['status']);
                                    if ((empty($statuss)) || (strlen($statuss)===0) ):?>
                                        <?php if (is_admin()) { ?>
                                            <?php if (udahnyari($valdata['idreq'])) {
                                                $hrgbuy=array();
                                                $datanyarie=udahnyari($valdata['idreq']);
                                                foreach ($datanyarie as $valnya) {
                                                    $hrgbuy[]=$valnya['hrg_beli'];
                                                }
                                                if (in_array(0, $hrgbuy)) { ?>
                                                    belum ada harga beli
                                                <?php }else{ ?>
                                                    <a href="<?php echo(site_url('gudang/sethrgj/'.$valdata['idreq']));?>"  class="btn btn-sm btn-success" role="group">set price</a>
                                                <?php } ?>
                                            <?php }else{ ?>
                                            <a href="<?php echo(site_url('gudang/slug/17/1/16?req='.$valdata['idreq']));?>"  class="btn btn-sm btn-primary" role="group">search</a>
                                            <?php }?>
                                        <?php }
                                        if (is_mimin()) { ?>
                                    <a href="<?php echo(site_url('gudang/slug/17/1/16?req='.$valdata['idreq']));?>"  class="btn btn-sm btn-primary" role="group">search</a>        
                                        <?php }
                                        ?>
                                    <?php    else: ?>
                                        <a href="<?php $kdbr=getkdbreq($valdata['idreq']);echo(current_url().'/a?id='.$kdbr.'&tbl=3');?>" class="btn btn-sm btn-danger" >prev barang</a>
                                    <?php endif; ?>
                                    </td>
                                <?php    break;
                                case 'request': ?>
                                    <td >
                                    <div class="btn-group" role="group"  >
                                        <?php
                                        $cektemp=gettemp_data($valdata[$fkolm],$namatbl);
                                        if ($cektemp): ?> 
                                            <span class="<?php echo($cektemp['klas']);?>" data-toggle="tooltip" data-placement="top" title="<?php echo($cektemp['toolstip']);?>"></span >
                                            <?php
                                            if (is_admin()) { ?>
                                                <a href="<?php echo(site_url('gudang/deltempdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-success" role="group">Acc</a>
                                                <a href="<?php echo(site_url('gudang/deltdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-danger" role="group">Reject</a>
                                            <?php } ?>
                                        <?php else : ?>
                                        <a href="<?php echo(site_url('gudang/edit/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">edit</a>
                                        <a href="<?php echo(site_url('gudang/delete/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">delete</a>
                                        <?php endif;?>
                                        </div>
                                    </td>
                                    <td>
        <?php 
              $larikc=udahnyari($valdata[$fkolm]);
              if ($larikc) {
                $stantri=getstatusantri($valdata[$fkolm]);
                foreach ($larikc as $valc) {
                    $linkb=$valc['linkbeli'];
                    $hrgb=$valc['hrg_beli'];
                }
                if (($hrgb==='0') && (strlen($linkb)===0)) {
                  echo('process');
                }else if ((strlen($linkb) > 0)  && ($hrgb==='0')) {
                  echo('Waiting');
                }else if (($stantri) && (strlen($stantri) > 0)) {
                  echo($stantri);
                }else{
                  echo('Waiting Approval');
                }
              }else{
                echo('pending');
              }
            ?>
                                    </td>
                                <?php    break;
                                case 'brosur': ?>
                                   <td>
                                   <?php 
                                   $rtrimimg=rtrim($valdata['idimg']);
                                   if ((empty($rtrimimg)) && (strlen($rtrimimg)===0)) {
                                        $siuser=datauser();
                                       if ($siuser['jabatan']==='designer') { ?>
                                        <a href="<?php echo(site_url('gudang/edit/'.$valdata[$fkolm].'/20/'.$fkolm))?>" class="btn btn-sm btn-primary">upload</a>
                                        <?php if ($valdata['status']==='op'): ?>
                                            <span class="glyphicon glyphicon-time"></span>
                                        <?php else :?>
                                            <a href="<?php echo(site_url('gudang/onprocsess/'.$valdata[$fkolm]))?>" class="btn btn-sm btn-warning">on proccess</a>
                                        <?php endif;?>
                                      <?php 
                                        }else{ ?>
                                            <a href="<?php echo(site_url('gudang/reqbrosur/'.$valdata['kdbarang']));?>"  class="btn btn-sm btn-primary" role="group">request</a>
                                        <?php 
                                        }
                                   }else{ ?>
                                        <a href="<?php echo(current_url().'/a?img='.$valdata['idimg'].'&tbl=20');?>" class="btn btn-sm btn-primary">preview</a>
                                   <?php } ?>
                                   </td>
                                <?php    break;
                                case 'settings': ?>
                                <td>
                                <?php if ((isset($_GET['f'])) && ($_GET['f']===$valdata[$fkolm])):?>
                                    <a href="<?php echo(site_url('gudang/slug/15/4/14'));?>" class="btn btn-sm btn-primary">cancel</a>
                                <?php else:?>  
                                <?php if (cekoptbyid($valdata[$fkolm])) { ?>
                                    <a href="<?php echo(current_url().'?ef='.$valdata[$fkolm]);?>" class="btn btn-sm btn-success">Edit</a>
                                <?php }else{ ?>
                                    <a href="<?php echo(current_url().'?f='.$valdata[$fkolm]);?>" class="btn btn-sm btn-primary">Set value</a>
                                <?php }?>  
                                <?php endif;?>    
                                </td>
                                <?php     break;
                                case 'barang': ?>
                                    <td>
                                        <div class="btn-group" role="group"  >
                                        <?php
                                        $cektemp=gettemp_data($valdata[$fkolm],$namatbl);
                                        if ($cektemp): ?> 
                                            <span class="<?php echo($cektemp['klas']);?>" data-toggle="tooltip" data-placement="top" title="<?php echo($cektemp['toolstip']);?>"></span >
                                            <?php
                                            if (is_admin()) { ?>
                                                <a href="<?php echo(site_url('gudang/deltempdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-success" role="group">Acc</a>
                                                <a href="<?php echo(site_url('gudang/deltdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-danger" role="group">Reject</a>
                                            <?php } ?>
                                        <?php else : ?>
                                        <a href="<?php echo(site_url('gudang/edit/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">edit</a>
                                        <a href="<?php echo(site_url('gudang/delete/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">delete</a>
                                        <?php endif;?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if (cekbrosur($valdata[$fkolm])) : 
                                    $cekbrosur=cekbrosur($valdata[$fkolm]);
                                    foreach ($cekbrosur as $valbro) {
                                                switch ($valbro['status']) {
                                                    case 'p':
                                                        echo 'pending';
                                                        break;
                                                    case 'op':
                                                        echo 'On process';
                                                        break;
                                                    default:
                                                        echo anchor(current_url().'/wew?id='.$valbro['id'].'&tbl=20', 'available', array('class' => 'btn btn-sm btn-success'));
                                                        break;
                                                }
                                    }
                                    ?>
                                    <?php else: ?>
                                        <a href="<?php echo(site_url('gudang/reqbrosur/'.$valdata[$fkolm]));?>"  class="btn btn-sm btn-primary" role="group">request</a>
                                    <?php endif;?>
                                    </td>
                                    <td>
                                    <?php
                                    if (cekposting($valdata[$fkolm])) {
                                        $cekbrg=cekposting($valdata[$fkolm]);
                                        ?>
                                        <a href="<?php echo(current_url().'/wew?id='.$cekbrg.'&tbl=17')?>" class="btn btn-sm btn-success" >posted</a>
                                    <?php }else{ ?>
                                        <a href="<?php echo(site_url('gudang/profile?tab=5&isi2='.$valdata[$fkolm]))?>" class="btn btn-sm btn-primary">post</a>
                                    <?php } ?>
                                    </td>
                                <?php   break;
                                default: ?>
                                    <td >
                                    <div class="btn-group" role="group"  >
                                        <?php
                                        $cektemp=gettemp_data($valdata[$fkolm],$namatbl);
                                        if ($cektemp): ?> 
                                            <span class="<?php echo($cektemp['klas']);?>" data-toggle="tooltip" data-placement="top" title="<?php echo($cektemp['toolstip']);?>"></span >
                                            <?php
                                            if (is_admin()) { ?>
                                                <a href="<?php echo(site_url('gudang/deltempdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-success" role="group">Acc</a>
                                                <a href="<?php echo(site_url('gudang/deltdata/'.$valdata[$fkolm].'/'.$namatbl));?>"  class="btn btn-sm btn-danger" role="group">Reject</a>
                                            <?php } ?>
                                        <?php else : ?>
                                         <?php if ($mng!=='4') { ?>
                                             <a href="<?php echo(site_url('gudang/edit/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">edit</a>
                                         <?php }?>   
                                        <a href="<?php echo(site_url('gudang/delete/'.$valdata[$fkolm].'/'.$mng.'/'.$fkolm));?>"  class="btn btn-sm btn-primary" role="group">delete</a>
                                        <?php endif;?>
                                        </div>
                                    </td>
                                <?php  break;
                            }
                            ?>
            <?php foreach ($kolom as $valkol) { ?>
                <?php if ($valkol==='status' && $namatbl==='antrian'): ?>
                    <td>
                    <?php 
                    $statsnya=rtrim($valdata[$valkol]);
                    if ((empty($statsnya)) || (strlen($statsnya)===0) ) {
                        if (udahnyari($valdata['idreq'])) {
                            $datanyari=udahnyari($valdata['idreq']);
                            foreach ($datanyari as $valnyari) {
                                if ((strlen($valnyari['linkbeli']) > 0) && ($valnyari['hrg_beli']==='0')) { ?>
                                    <a href="<?php echo(current_url().'/a?id='.$valnyari['id'].'&tbl=16');?>" class="btn btn-xs btn-primary">details</a><strong>waiting</strong><br>
                                    <?php }else if ((strlen($valnyari['linkbeli'])===0) && (strlen($valnyari['hrg_beli']) > 0) && ($valnyari['hrg_beli']!=='0')) { ?>
                                    <a href="<?php echo(current_url().'/a?id='.$valnyari['id'].'&tbl=16');?>" class="btn btn-xs btn-primary">details</a><strong>undefined</strong><br>
                                    <?php }else if ((strlen($valnyari['linkbeli']) > 0) && (strlen($valnyari['hrg_beli']) > 0) && ($valnyari['hrg_beli']!=='0')) { ?>
                                    <a href="<?php echo(current_url().'/a?id='.$valnyari['id'].'&tbl=16');?>" class="btn btn-xs btn-primary">details</a><strong>waiting Approval</strong><br>
                                    <?php }else{ ?>
                                        <a href="<?php echo(current_url().'/a?id='.$valnyari['id'].'&tbl=16');?>" class="btn btn-xs btn-primary">details</a><strong>process</strong><br>
                                <?php }
                                }       
                            }else{
                                echo('pending');
                            }
                    }else{
                        echo($valdata[$valkol]);
                    }
                    ?>
                    </td>
                <?php else: ?>
                    
                    <td>
                            <?php switch ($valkol) {
                                case 'acc':
                                    switch ($valdata[$valkol]) {
                                        case '1':
                                            echo('accepted');
                                            break;
                                        case '0':
                                            echo('rejected');
                                            break;
                                        default:
                                            echo('pending');
                                            break;
                                    }
                                    break;
                                case 'idcus':
                                    echo(getnamacus($valdata[$valkol]));
                                    break;
                                case 'from':
                                    echo(getuname($valdata[$valkol]));
                                    break;
                                case 'iduser':
                                    echo(getuname($valdata[$valkol]));
                                    break;
                                case 'idreq':
                                    echo(anchor(current_url().'/a?id='.$valdata[$valkol].'&tbl=15',getdescprod($valdata[$valkol])));
                                    break;
                                case 'status':
                                    $urlm=$this->uri->segment(5);
                                    if ($urlm==='20') {
                                        switch ($valdata[$valkol]) {
                                            case 'p':
                                                echo('pending');
                                                break;
                                            case 'op':
                                                echo('on proccess');
                                                break;
                                            case 's':
                                                echo('success');
                                                break;
                                            default:
                                                echo('undefined');
                                                break;
                                        }
                                    }
                                    break;
                                case 'setting':
                                    if ((isset($_GET['f'])) && ($_GET['f']===$valdata[$fkolm])) { ?>
                                    <form class="form-inline" action="<?php echo(site_url('gudang/setopt'))?>" method="post">
                                        <div class="input-group">
                                        <input type="hidden" name="idset" value="<?php echo($valdata[$fkolm]);?>" />
                                        <?php if ($valdata[$valkol]==='email') { ?>
                                            <input type="email" name="val" class="form-control" />
                                        <?php }else{?>
                                            <input type="text" name="val" class="form-control" />
                                        <?php }?>
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit">simpan</button>
                                        </span>
                                        </div>
                                    </form>
                                        
                                    <?php }else{
                                        if (cekoptbyid($valdata[$fkolm])) {
                                            if ((isset($_GET['ef'])) && ($_GET['ef']===$valdata[$fkolm])) { ?>
                                        <form class="form-inline" action="<?php echo(site_url('gudang/updtopt'))?>" method="post">
                                        <div class="input-group">
                                        <input type="hidden" name="idset" value="<?php echo($valdata[$fkolm]);?>" />
                                        <?php if ($valdata[$valkol]==='email') { ?>
                                            <input type="email" name="val" class="form-control" value="<?php echo(cekoptbyid($valdata[$fkolm]));?>" />
                                        <?php }else{?>
                                            <input type="text" name="val" class="form-control" value="<?php echo(cekoptbyid($valdata[$fkolm]));?>" />
                                        <?php }?>
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit">simpan</button>
                                        </span>
                                        </div>
                                    </form>
                                            <?php }else{ ?>
                                                <strong><?php echo(cekoptbyid($valdata[$fkolm]));?></strong>
                                             <?php } 
                                         }else{
                                            echo($valdata[$valkol]);
                                        }
                                        
                                    }
                                    break;
                                case 'catatan':
                                    if (strlen($valdata[$valkol]) > 15) {
                                        echo(substr($valdata[$valkol],0,16).'. . .');
                                    }else{
                                        echo($valdata[$valkol]);
                                    }
                                    break;
                                case 'kdbarang':
                                    echo(anchor(current_url().'?id='.$valdata[$valkol].'&tbl=3',getDescription($valdata[$valkol])));
                                    break;
                                default:
                                    echo($valdata[$valkol]);
                                    break;
                            }
                            ?>
                    </td>
                <?php endif; ?>
            <?php } ?>
        </tr>
        <?php } ?>
        <?php else: ?>
                <tr>
                        <td>tidak ada hasil</td>
                </tr>
        <?php endif;?>     
                </tbody>
            </table>
    </div>
    </div>
</div>