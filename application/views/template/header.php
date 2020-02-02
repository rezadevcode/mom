<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="MainMenu">
   <div class="container">
      <div class="header">
         <div class="desktop-menu">
            <ul class="nav nav-pills pull-right menu">
               <?php if($menu) {
                  foreach ($menu as $row) {
                     ?>
                     <li class="<?php echo ( ($this->uri->segment(1)=='' && $row['slug']=='home') || $this->uri->segment(1)==$row['slug'])? 'active':'' ?>"><a href="<?php echo base_url($row['slug']) ?>"><?php echo $row['name'] ?></a></li>
                     <?php
                  }
               } ?>
            </ul>
         </div>
         <a href="#" class="togglenav"><i class="glyphicon glyphicon-tasks"></i></a>
         <div class="mobile-menu">
            <ul class="nav nav-pills menu">
               <?php if($menu) {
                  foreach ($menu as $row) {
                     ?>
                     <li class="<?php echo ( ($this->uri->segment(1)=='' && $row['slug']=='home') || $this->uri->segment(1)==$row['slug'])? 'active':'' ?>"><a href="<?php echo base_url($row['slug']) ?>"><?php echo $row['name'] ?></a></li>
                     <?php
                  }
               } ?>
            </ul>
         </div>
         <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/images/'.$logo) ?>" alt="" class="logo"></a>
      </div>
   </div>
</div>