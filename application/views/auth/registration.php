<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
<?php echo $this->session->flashdata('message'); ?>
    <form action="<?= base_url('index.php/Con_Auth/registration'); ?>" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?= set_value('name'); ?>">

        <?= form_error('name', '<small class="text-danger" style="color:red;">', '</small>'); ?>

        <br>
        <label for="email">E-mail</label>
        <input type="email" name="email" value="<?= set_value('email'); ?>">
        <?= form_error('email', '<small class="text-danger" style="color:red;">', '</small>'); ?>

        <br>
        <label for="password">Password</label>
        <input type="password" name="password1">
        <?= form_error('password1', '<small class="text-danger" style="color:red;">', '</small>'); ?>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password2">
        <br>
        <button type="submit">REGISTER</button>
        <p>You Have Account ? <a href="<?= base_url('index.php/Con_Auth'); ?>">Klik Here to LOGIN</a> </p>
    </form>
</body>

</html>