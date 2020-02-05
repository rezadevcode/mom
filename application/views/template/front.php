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
                        <div class="form-group">
                            <input id="password-field" type="password" class="form-control" name="password" value="" placeholder="Pasword">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <!-- <a href="#" class="btn btn-submit text-uppercase d-block rounded bg-orange text-white">login</a> -->
                            <button class="btn btn-submit text-uppercase d-block rounded bg-orange text-white">login</button>
                            <!-- <a href="#" class="btn btn-submit text-uppercase d-block rounded bg-orange text-white mt-3"><i class="fab fa-google"></i> login via google </a> -->
                        </div>
                        <div class="notif-success" style="text-align: center;margin: 10px">
                            <!-- <span class="badge badge-success">success</span> -->
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
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">As Freelancer</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">As Influencer</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">As Community</a>
                                </div>
                            </nav>
                            <div class="tab-content px-5" id="nav-tabContent">
                                <div class="tab-pane fade show active pt-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form enctype="multipart/form-data" method="post" class="formPopup" action="<?php echo base_url('signup') ?>">
                                        <!-- hidden -->
                                        <input type="hidden" value="freelancer" name="type">
                                        <!-- end -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Alamat email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <select name="community" id="" class="form-control">
                                                <option value="" selected hidden>Kategori Komunitas</option>
                                                <option value="Community Marketing">Community Marketing</option>
                                                <option value="Community Management">Community Management</option>
                                                <option value="Community Building">Community Building</option>
                                                <option value="Talent Management">Talent Management</option>
                                                <option value="Training Center">Training Center</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="passconf">
                                        </div>
                                        <div class="form-group custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="notif-success" style="text-align: center;margin: 10px">
                                            <!-- <span class="badge badge-success">success</span> -->
                                        </div>
                                        <div class="form-group">
                                            <button class="btn text-uppercase bg-orange text-white w-100">submit</button>
                                        </div>  
                                    </form>                  
                                </div>
                                <div class="tab-pane fade pt-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <form enctype="multipart/form-data" method="post" class="formPopup" action="<?php echo base_url('signup') ?>">
                                        <!-- hidden -->
                                        <input type="hidden" value="influencer" name="type">
                                        <!-- end -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama" name="name">
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
                                            <select name="community" id="" class="form-control">
                                                <option value="" selected hidden>Kategori Komunitas</option>
                                                <option value="Community Marketing">Community Marketing</option>
                                                <option value="Community Management">Community Management</option>
                                                <option value="Community Building">Community Building</option>
                                                <option value="Talent Management">Talent Management</option>
                                                <option value="Training Center">Training Center</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="passconf">
                                        </div>
                                        <div class="form-group custom-file mb-5">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="notif-success" style="text-align: center;margin: 10px">
                                            <!-- <span class="badge badge-success">success</span> -->
                                        </div>
                                        <div class="form-group">
                                            <button class="btn text-uppercase bg-orange text-white w-100">submit</button>
                                        </div>  
                                    </form>
                                </div>
                                <div class="tab-pane fade pt-3" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <form enctype="multipart/form-data" method="post" class="formPopup" action="<?php echo base_url('signup') ?>">
                                        <!-- hidden -->
                                        <input type="hidden" value="community" name="type">
                                        <!-- end -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama" name="name">
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
                                            <select name="community" id="" class="form-control">
                                                <option value="" selected hidden>Kategori Komunitas</option>
                                                <option value="Community Marketing">Community Marketing</option>
                                                <option value="Community Management">Community Management</option>
                                                <option value="Community Building">Community Building</option>
                                                <option value="Talent Management">Talent Management</option>
                                                <option value="Training Center">Training Center</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="passconf">
                                        </div>
                                        <div class="form-group custom-file mb-5">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="notif-success" style="text-align: center;margin: 10px">
                                            <!-- <span class="badge badge-success">success</span> -->
                                        </div>
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
                        var base_url = window.location.origin;
                        var html_ = '<span class="badge badge-success">success</span>';
                        setTimeout(function() { 
                            $('.notif-success').html(html_);
                        }, 800)
                        setTimeout(function() { 
                            window.location.replace(base_url);
                        }, 2000)
                    }else{
                        var html_ = data['msg'];
                        setTimeout(function() { 
                            $('.notif-success').html(html_);
                        }, 800)
                    }
                }
            });
        });
    </script>
  </body>
</html>