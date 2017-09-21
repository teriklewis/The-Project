<!DOCTYPE html>

<html>
    <head>
        <title>Sign Up</title>
    </head>

    <body>
        <h1>Sign Up</h1>
        <h4>Fields with * are required</h4>
        
        <?php echo validation_errors(); ?> 
        
        <?php echo form_open('SignupController/Signup') ?>

        <h3>
        Church*: 
        <input type="text" name="church" /> </br>
        
        District*:
        <input type="text" name="district" /> </br>
        
        Country*:
        <input type="text" name="country" /> </br>
        
        First Name*: 
        <input type="text" name="firstname"/> </br>
        
        Last Name*: 
        <input type="text" name="lastname"/> </br>
        
        Mailing Address: 
        <input type="text" name="mail"/></br>
        
        Contact No. (Home):
        <input type="text" name="homeno"/></br>
        
        Contact No. (Cell):
        <input type="text" name="cellno"/></br>
        
        Employment Status*: (Job Title - Organization)
        <input type="text" name="employment"/></br>
        
        Date of Birth*: (Format is yyyy-mm-dd)
        <input type="text" name="dob" /></br>
                        
        Skills (if any)</br>
        <input type="text" name="skill1" /></br>
        <input type="text" name="skill2" /></br>
        <input type="text" name="skill3" /></br>
        
        </br>
        E-mail*:
        <input type="text" name="email"/> </br>

        Password*:
        <input type="password" name='password'/> </br>    
        
        </h3>
        <h2><input class="option" type="submit" value='Sign Up' name='Signup'/></h2>
    </form>   
</body>
</html>