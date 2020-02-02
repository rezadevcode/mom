<div class="container-fluid top-banner">
   <div class="overlay-img"></div>
   <div class="bg-img img-responsive" style="height: 400px;background-position: center;background-size: 100%;background-attachment: fixed;background-repeat: no-repeat;background-image:url('<?php echo base_url('assets/images/contact/'.$contact[0]['image']) ?>')"></div>
   
</div>
<div class="container">
   <div class="row">
      <div class="col-md-24 WrapTitle">
         <div class="IconTitle"><img src="<?php echo base_url('assets/images/icon-contact.png') ?>" alt=""></div>
         <div class="MainTitle">
            <h1><span>Contact</span>Us</h1>
         </div>
         <div class="clearfix"></div>
      </div>
      <div class="col-md-24 Gmap">
		<!--<img src="<?php echo base_url('assets/images/contact/'.$contact[0]['map']) ?>" alt="" class="img-responsive">-->
		<?php echo $contact[0]['map'] ?>
	  </div>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="col-md-16 contactform col-md-push-8">
         <div class="row">
            <div class="col-md-24">
               <?php echo ($this->session->flashdata('error'))? $this->session->flashdata('error'):'' ?>
               <?php echo ($this->session->flashdata('success'))? $this->session->flashdata('success'):'' ?>
            </div>
         </div>
         <div class="row">
            <form action="<?php echo base_url('contact/submit') ?>" method="post" accept-charset="utf-8">
               <div class="form-group col-md-12"><input type="text" name="name" class="form-control" placeholder="Name"></div>
               <div class="form-group col-md-12"><input type="email" name="email" class="form-control" placeholder="Email"></div>
               <div class="form-group col-md-12"><input type="text" name="subject" class="form-control" placeholder="Subject"></div>
               <div class="form-group col-md-12"><input type="text" name="phone" class="form-control" placeholder="Telp"></div>
               <div class="form-group col-md-24"><textarea name="comment" class="form-control" cols="30" rows="10" placeholder="Comment"></textarea></div>
               <div class="form-group col-md-24"><button type="submit" class="btn btn-default">Send</button></div>
            </form>
         </div>
      </div>
      <div class="col-md-8 col-md-pull-16">
         <div class="row">
            <div class="col-md-24 WrapTitle">
               <div class="MainTitle">
                  <h1><span>Our</span>Office</h1>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="col-md-24">
               <div class="contact-address"><?php echo $contact[0]['address'] ?></div>
            </div>
            <div class="col-md-24 WrapTitle">
               <div class="MainTitle">
                  <h1><span>Company</span>Profile</h1>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="col-md-24">
               <div class="contact-compro"><a href="<?php echo base_url('assets/images/contact/'.$contact[0]['pdf']) ?>"><img src="<?php echo base_url('assets/images/download-icon.jpg') ?>" alt="" class="img-responsive"></a></div>
            </div>
         </div>
      </div>
   </div>
</div>