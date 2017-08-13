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
        First Name*: 
        <input type="text" name="firstname"/> </br>
        
        Last Name*: 
        <input type="text" name="lastname"/> </br>
      
        Church Status*: 
        <select name="status">
        
            <option value = "Regular Standing">Regular Standing</option>
            <option value = "Censored">Censored</option>
        </select> </br>
        
        Mailing Address: 
        <input type="text" name="mail"/></br>
        
        E-mail Address: 
        <input type="text" name="email"/></br>
        
        Contact No. (Home):
        <input type="text" name="homeno"/></br>
        
        Contact No. (Cell):
        <input type="text" name="cellno"/></br>
        
        Employment Status*: (Job Title - Organization)
        <input type="text" name="employment"/></br>
        
        Position in Church*: 
        <select name="position">
        
            <option value = "Member">Member</option>
            <option value = "Deacon">Deacon</option>
            <option value = "Head Deacon">Head Deacon</option>
            <option value = "Elder">Elder</option>
            <option value = "First Elder">First Elder</option>
            <option value = "Pastor">Pastor</option>
        </select> </br>
        
        Date of Birth*: (Format is yyyy-mm-dd)
        <input type="text" name="dob" /></br>
                        
        Skills (if any)</br>
        <input type="text" name="skill1" /></br>
        <input type="text" name="skill2" /></br>
        <input type="text" name="skill3" /></br>
        
        </br>
        Username*:
        <input type="text" name="username"/> </br>

        Password*:
        <input type="password" name='password'/> </br>    
        
        </h3>
        <h2><input class="option" type="submit" value='Sign Up' name='Signup'/></h2>
    </form>   
</body>
</html>