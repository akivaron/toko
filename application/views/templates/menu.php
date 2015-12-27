<?php $infouser=datauser();?>
    <div id="wrapper">
        <!-- Navigation -->
        <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index.html" class="navbar-brand"> 
                 <b>JVM</b>
                </a>

              <ul class="nav navbar-nav search-nav">
                <li>
                   <div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Type anywhere to <b>Search</b> </label>
                    </div>
                  </div>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav" style="padding-right:20px;">
                  <li class="user-name">
                    <span>
                        <?php
                            $UserName = $this->session->userdata("logged_in");
                            echo $UserName["username"];
                        ;?>
                    </span>
                  </li>
                  <li class="dropdown avatar-dropdown">
                   <img src="<?php echo base_url();?>asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a href="<?php echo base_url();?>index.php/gudang/profile"><span class="fa fa-user"></span> My Profile</a></li>
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                        <li><a href="#"><span class="fa fa-cogs"></span></a></li>
                        <li><a href="#"><span class="fa fa-lock"></span></a></li>
                        <li><a href="<?php echo base_url();?>index.php/gudang/logout"><span class="fa fa-power-off "></span></a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                    <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <?php
                        if (count($menu)===0)
                        {
                            ?>
                                <li><a href="#" >menu tak tersedia</a></li>
                            <?php
                        }else
                        {
                            ?>
                                <?php foreach ($menu as $row)://$row->title;?>
                            <?php
                                $url=$this->uri->segment(3);
                                if($url==$row['idmenu'] && $this->uri->segment(2)==='page'){
                                $classs='class="active ripple"';
                        }else
                        {
                            $classs='class="ripple"';
                        }
                    ?>
                    
                    <?php if (submenu($row['idmenu'])):?>
                        <li class="ripple">
                        <a class="tree-toggle nav-header" href="javascript:;">
                            <i class="<?php echo $row['icon'];?>"></i>&nbsp
                            <?php echo ucwords($row['menu']);?>
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                        </a>
                        <ul id="<?php echo('m'.$row['idmenu']);?>" class="nav nav-list tree">
                            <?php $submenu=submenu($row['idmenu']);
                                $jml=count($submenu);
                            ?>
                            <?php for ($m=0; $m < $jml; $m++) {?>
                                <li>
                                    <a href="<?php echo site_url('gudang/slug/'.$row['idmenu'].'/4/'.$submenu[$m]);?>"><?php echo namemenu($submenu[$m]);?></a>
                                </li>
                            <?php  }?>
                            </ul>
                    </li>
                <?php else:?>
                    <li <?php echo $classs;?>>
                        <a href="<?php echo site_url('gudang/slug/'.$row['idmenu'].'/4/'.getmngsinglem($row['idmenu']));?>"><i class="<?php echo $row['icon'];?>"></i>&nbsp 
                        <?php echo ucwords($row['menu']);?></a>
                    </li>
                <?php endif;?>
                    <?php endforeach;?>
                    <?php }?>
                    <!--<li class="active">
                        <a href=""><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>-->
                </ul>
            </div>
        </div>
        <!-- end: Left Menu -->
        <div id="content">
            <div class="col-md-12" style="padding:40px;">

