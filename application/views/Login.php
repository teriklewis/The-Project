<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        
        <h1>Login</h1>
        <?php echo validation_errors(); ?> 
        <?php echo form_open('LoginController/checkLogin') ?>
        
        <h3>Email</h3> 
        <input class="option" type="text" name="email"/>

        <h3>Password</h3> 
        <input class="option" type="password" name='password'/>

        <input type="hidden" name="form" value="Login"/>

        <h2><input class="option" type="submit" value='Log in' name='Login'/></h2>
    </form> 
</body>
</html>
