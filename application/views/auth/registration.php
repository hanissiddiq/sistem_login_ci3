<!-- Template Sb Admin 2 -->
<div class="container">
    <div class="col-lg-7 mx-auto">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftarkan Akun !</h1>
                            </div>
                            <?php echo $this->session->flashdata('message'); ?>
                            <!-- <form class="user"> -->
                            <form class="user" action="<?= base_url('Con_Auth/registration'); ?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control form-control-user" name="name" value="<?= set_value('name'); ?>" id="exampleFirstName"
                                            placeholder="Nama Lengkap Anda ....">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                        placeholder="Email Anda ..." value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger" style="color:red;">', '</small>'); ?>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password1" id="exampleInputPassword" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger" style="color:red;">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">

                                        <input type="password" class="form-control form-control-user" name="password2" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit">Daftar Akun</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('Con_Auth'); ?>">Sudah punya akun? Silakan Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>