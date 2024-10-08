<!-- template SB Admin 2 -->
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7 mx-auto">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang !</h1>
                                </div>
                                <?php echo $this->session->flashdata('message'); ?>
                                <form class="user" action="<?= base_url('Con_Auth'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Email Anda ..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger" style="color:red;">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">

                                        <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password Anda ...">
                                        <?= form_error('password1', '<small class="text-danger" style="color:red;">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Ingatkan Saya</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block"> Login</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Con_Auth/registration'); ?>">Buat Akun!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>