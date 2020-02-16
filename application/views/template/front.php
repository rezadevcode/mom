<!doctype html>
<html class="no-js">
   <?php $this->load->view('template/head') ?>
   <body>
   <!--[if IE]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 
        <div id="wrapper">
            <?php $this->load->view('template/header') ?>
            <?php $this->load->view($load_view) ?>
            <?php $this->load->view('template/footer') ?>
        </div>

        <!-- Modal login -->
        <div class="modal fade" id="loginPopUp" tabindex="-1" role="dialog" aria-labelledby="loginPopUp" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content p-3">
                <div class="modal-header align-items-center flex-column border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Sign In Mothers on Mission</h5>
                    <p class="mb-0">Anda belum punya akun? <a data-toggle="modal" data-dismiss="modal" data-target="#registPopUp" class="cursor-pointer text-orange">Daftar disini</a></p class="mb-0">
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="post" class="formPopup" action="<?php echo base_url('signin') ?>">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Alamat email">
                        </div>
                        <div class="form-group mb-4">
                            <input id="password-field" type="password" class="form-control" name="password" value="" placeholder="Pasword">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="notif-success" style="text-align: center"></div>
                        <div class="notif-error" style="text-align: center;margin-top: -10px;margin-bottom: 10px;"></div>
                        <div class="form-group">
                            <!-- <a href="#" class="btn btn-submit text-uppercase d-block rounded bg-orange text-white">login</a> -->
                            <button class="btn btn-submit text-uppercase d-block rounded bg-orange text-white" style="width: 100%">login</button>
                            <!-- <a href="#" class="btn btn-submit text-uppercase d-block rounded bg-orange text-white mt-3"><i class="fab fa-google"></i> login via google </a> -->
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

            <!-- Modal regist -->
        <div class="modal fade" id="registPopUp" tabindex="-1" role="dialog" aria-labelledby="registPopUp" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content p-0">
                    <div class="modal-header align-items-center flex-column border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Join Mothers on Mission</h5>
                        <p class="mb-0">Anda sudah pernah daftar sebelumnya? <a data-toggle="modal"  data-dismiss="modal" data-target="#loginPopUp" class="cursor-pointer text-orange">Login disini</a data-toggle="modal"></p class="mb-0">
                    </div>
                    <div class="modal-body p-0">
                        <div class="" id="formRegist">
                            <nav>
                                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">As MoMFreelancer</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">As MoMInfluencer</a>
                                    <a class="nav-item nav-link" id="nav-preneur-tab" data-toggle="tab" href="#nav-preneur" role="tab" aria-controls="nav-preneur" aria-selected="false">As MoMpreneur</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">As MoMCommunity</a>
                                </div>
                            </nav>
                            <div class="tab-content px-5" id="nav-tabContent">
                                <div class="tab-pane fade show active pt-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form enctype="multipart/form-data" method="post" class="formPopup" action="<?php echo base_url('signup') ?>">
                                        <!-- hidden -->
                                        <input type="hidden" value="MoM_Freelancer" name="type">
                                        <!-- end -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" placeholder="Handphone" name="handphone">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Alamat email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <select name="community" id="option1" class="form-control">
                                                <option value="" selected hidden>Kategori Komunitas</option>
                                                <option value="Project Manager">Project Manager</option>
                                                <option value="Social Media">Social Media</option>
                                                <option value="Website Admin">Website Admin</option>
                                                <option value="Strategist">Strategist</option>
                                                <option value="Designer">Designer</option>
                                                <option value="Community Coordinator">Community Coordinator</option>
                                                <option value="komunitas_lain">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none other-1">
                                            <input type="text" class="form-control" placeholder="Komunitas Lainnya" name="community_other">
                                        </div>
                                        <div class="form-group custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Upload Foto</label>
                                            <p class="small text-muted font-italic">Max. Upload 2mb</p>
                                        </div>
                                        <div class="form-group custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="resume">
                                            <label class="custom-file-label" for="customFile">Submit CV</label>
                                            <p class="small text-muted font-italic">Max. Upload 2mb</p>
                                        </div>
                                        <div class="form-group mt-2 mb-1">
                                            <input type="text" class="form-control" placeholder="Link Portfolio" name="portfolio">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Ratecard" name="ratecard">
                                            <p class="small text-muted font-italic mb-0">Kosongkan bila ingin mengikuti ratecard MoM</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="passconf">
                                        </div>
                                        <div class="notif-success" style="text-align: center"></div>
                                        <div class="notif-error" style="text-align: center;margin-top: -10px;margin-bottom: 10px;"></div>
                                        <div class="form-group">
                                            <button class="btn text-uppercase bg-orange text-white w-100">submit</button>
                                        </div>  
                                    </form>                  
                                </div>
                                <div class="tab-pane fade pt-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <form enctype="multipart/form-data" method="post" class="formPopup" action="<?php echo base_url('signup') ?>">
                                        <!-- hidden -->
                                        <input type="hidden" value="MoM_Influencer" name="type">
                                        <!-- end -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" placeholder="Handphone" name="handphone">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Alamat email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Akun Instagram" name="ig_account">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Akun Facebook" name="fb_account">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Akun Twitter" name="twitter">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group">
                                            <select name="community" id="option2" class="form-control">
                                                <option value="" selected hidden>Kategori Komunitas</option>
                                                <option value="Parenting">Parenting</option>
                                                <option value="Beauty">Beauty</option>
                                                <option value="Lifestyle">Lifestyle</option>
                                                <option value="Traveling">Traveling</option>
                                                <option value="Kuliner">Kuliner</option>
                                                <option value="komunitas_lain2">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none other-2">
                                            <input type="text" class="form-control" placeholder="Komunitas Lainnya" name="community_other">
                                        </div>
                                        <div class="form-group custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Upload Foto</label>
                                            <p class="small text-muted font-italic">Max. Upload 2mb</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Ratecard" name="ratecard">
                                            <p class="small text-muted font-italic mb-0">Kosongkan bila ingin mengikuti ratecard MoM</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="passconf">
                                        </div>
                                        <div class="notif-success" style="text-align: center"></div>
                                        <div class="notif-error" style="text-align: center;margin-top: -10px;margin-bottom: 10px;"></div>
                                        <div class="form-group">
                                            <button class="btn text-uppercase bg-orange text-white w-100">submit</button>
                                        </div>  
                                    </form>
                                </div>
                                <div class="tab-pane fade pt-3" id="nav-preneur" role="tabpanel" aria-labelledby="nav-preneur">
                                    <form enctype="multipart/form-data" method="post" class="formPopup" action="<?php echo base_url('signup') ?>">
                                        <!-- hidden -->
                                        <input type="hidden" value="MoM_Preneur" name="type">
                                        <!-- end -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" placeholder="Handphone" name="handphone">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Alamat email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Akun Instagram Usaha" name="ig_account">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Akun Facebook Usaha" name="fb_account">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Akun Twitter Usaha" name="twitter">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group mt-2 mb-1">
                                            <input type="text" class="form-control" placeholder="Link Blog Usaha">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group">
                                            <select name="community" id="option3" class="form-control">
                                                <option value="" selected hidden>Kategori Komunitas</option>
                                                <option value="Parenting">Parenting</option>
                                                <option value="Beauty">Beauty</option>
                                                <option value="Lifestyle">Lifestyle</option>
                                                <option value="Traveling">Traveling</option>
                                                <option value="Kuliner">Kuliner</option>
                                                <option value="komunitas_lain3">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none other-3">
                                            <input type="text" class="form-control" placeholder="Komunitas Lainnya" name="community_other">
                                        </div>
                                        <div class="form-group custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Upload Foto</label>
                                            <p class="small text-muted font-italic">Max. Upload 2mb</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Ratecard" name="ratecard">
                                            <p class="small text-muted font-italic mb-0">Kosongkan bila ingin mengikuti ratecard MoM</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="passconf">
                                        </div>
                                        <div class="notif-success" style="text-align: center"></div>
                                        <div class="notif-error" style="text-align: center;margin-top: -10px;margin-bottom: 10px;"></div>
                                        <div class="form-group">
                                            <button class="btn text-uppercase bg-orange text-white w-100">submit</button>
                                        </div>  
                                    </form>
                                </div>
                                <div class="tab-pane fade pt-3" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <form enctype="multipart/form-data" method="post" class="formPopup" action="<?php echo base_url('signup') ?>">
                                        <!-- hidden -->
                                        <input type="hidden" value="MoM_Community" name="type">
                                        <!-- end -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama Admin / Founder" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" placeholder="Handphone" name="handphone">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Alamat email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Akun Instagram" name="ig_account">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Akun Facebook" name="fb_account">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Akun Twitter" name="twitter">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group mt-2 mb-1">
                                            <input type="text" class="form-control" placeholder="Link Blog / Website Komunitas">
                                            <p class="small text-muted font-italic mb-0">(jika ada)</p>
                                        </div>
                                        <div class="form-group">
                                            <select name="community" id="option3" class="form-control">
                                                <option value="" selected hidden>Kategori Komunitas</option>
                                                <option value="Parenting">Parenting</option>
                                                <option value="Beauty">Beauty</option>
                                                <option value="Lifestyle">Lifestyle</option>
                                                <option value="Traveling">Traveling</option>
                                                <option value="Sport">Sport</option>
                                                <option value="Kuliner">Kuliner</option>
                                                <option value="komunitas_lain3">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-none other-3">
                                            <input type="text" class="form-control" placeholder="Komunitas Lainnya" name="community_other">
                                        </div>
                                        <div class="form-group custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Upload Foto Komunitas</label>
                                            <p class="small text-muted font-italic">Max. Upload 2mb</p>
                                        </div>  
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="passconf">
                                        </div>
                                        <div class="notif-success" style="text-align: center"></div>
                                        <div class="notif-error" style="text-align: center;margin-top: -10px;margin-bottom: 10px;"></div>
                                        <div class="form-group">
                                            <button class="btn text-uppercase bg-orange text-white w-100">submit</button>
                                        </div>  
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='https://www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
    <script src="<?php echo base_url('assets/scripts/vendor.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/main.js') ?>"></script>
    <script type='text/javascript'>
        /* attach a submit handler to the form */
        $(".formPopup").submit(function(event) {

            /* stop form from submitting normally */
            event.preventDefault();

            /* get the action attribute from the <form action=""> element */
            var $form = $( this ),
                url = $form.attr( 'action' );

            /* Send the data using post with element id name and name2*/
            // var posting = $.post( url,
            //                 new FormData(this),
            //                 processData: false,
            //                 contentType: false
            //                 );

            // /* Alerts the results */
            // posting.done(function( data ) {
            //     console.log($data);
            // });
            $form.find('.notif-error').html('');

            jQuery.ajax({
                url: url,
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST', // For jQuery < 1.9
                success: function(data){
                    console.log(data['status']);
                    if (data['status'] == 'ok') {
                        $form[0].reset(); //reseting form
                        var base_url = window.location.origin;
                        var html_ = `<h4 class="badge badge-success" style="padding: 10px 30px;">${data['msg']}</h4>`;
                        setTimeout(function() { 
                            $form.find('.notif-success').html(html_);
                        }, 100)
                        setTimeout(function() { 
                            window.location.replace(base_url);
                        }, 1500)
                    }else{
                        var html_ = data['msg'];
                        setTimeout(function() { 
                            $form.find('.notif-error').html(html_);
                        }, 500)
                    }
                }
            });
        });
    </script>
  </body>
</html>