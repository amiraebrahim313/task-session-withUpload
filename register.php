<?php
require 'session.php' ;
require 'function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- this page for enter the data in form if it is enterd corrctly  then go to the page of sunbmit to store data in session -->
    <style>
        .error {
            display: inline-block;
            font-weight: bold;
            color: red;
        }
    </style>
</head>

<body>
    <form method="POST" action="submit.php" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="User Name" />

        <?php if (form_error('name')) { ?>
            <div class="error"><?php echo form_error('name'); ?></div>
        <?php } ?>

        <br/>
        <input type="email" name="email" placeholder="email">

        <?php if (form_error('email')) { ?>
            <div class="error"><?php echo form_error('email'); ?></div>
        <?php } ?>

        <br/>
        <input type="password" name="password" placeholder="password" />

        <?php if (form_error('password')) { ?>
            <div class="error"><?php echo form_error('password'); ?></div>
        <?php } ?>

        <br/>
        <input type="password" name="confirm_password" placeholder="Confirm Password">

        <?php if (form_error('confirm_password')) { ?>
            <div class="error"><?php echo form_error('confirm_password'); ?></div>
        <?php } ?>

        <br />

        <button>Create Account</button>
        <!-- cookie -->
        <input type="checkbox" name="checkbox">
        <label>remeber me</label>
<!-- uploud image -->
    <input type="file" name="file" >
    <button type="submit"  name="submit">UPLOUD</button>
    </form>
</body>

</html>
</head>
<body>

    