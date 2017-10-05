<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>

        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 0 15px 0 15px;
            }

            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }
        </style>
    </head>
    <body>

        <div id="container">
            <h1><a href="<?= site_url('HomeController') ?>">Home</a>
                <?php if ($level > 0): ?><a href="<?= site_url('ProfileController') ?>">Profile</a><?php endif; ?>
                <a href="<?= site_url('HomeController/About') ?>">About</a>
                <?php if ($level == 0): ?><a href="<?= site_url('LoginController') ?>">Login</a> <?php endif; ?>
                <?php if ($level > 0): ?><a href="<?= site_url('LoginController/Logout') ?>">Logout</a> <?php endif; ?>
            </h1>

            <div id="body">
                <img style =" margin-left: 500px;"width = "20%" src="<?php echo base_url(); ?>/theme/assets/welcome.gif" alt="welcome">
                <?php if ($level > 0): ?><h1><marquee behavior="scroll" direction="left">Hi <?php echo $email; echo " level "; echo $level;?>.</marquee></h1><?php endif; ?>

                <h1> <a href="<?= site_url('SignupController') ?>">Sign Up</a> </h1>
                
                
                <h1> Search by: <?php echo form_open('HomeController/Search') ?>
                    <select class="option" name="filter">
                        <option value ="firstname">First Name</option>
                        <option value ="lastname">Last Name</option>
                        <option value ="skill">Skill</option>
                        <option value ="position">Position</option>
                    </select>
                     <input type="text" name="value"/>
                     <input class="option" type="submit" value='Search' name='search'/>
                </h1> 
                

                <table>
                    <caption>Members</caption>
                    <tr>
                        <th>Church</th>
                        <th>District</th>
                        <th>Country</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Church Status</th> 
                        <th>Mailing Address</th> 
                        <th>Email</th> 
                        <th>Contact No.(home)</th> 
                        <th>Contact No.(cell)</th> 
                        <th>Employment Status</th>
                        <th>Position in Church</th> 
                        <th>Date of Birth</th> 
                        <th>Skills</th>
                    </tr>
                    <tbody></tbody>

                    <?php foreach ($members as $m): ?>
                        <tr>
                            <!--skills - if they have skill(s) list them. -->
                            <td><?php echo $m->church; ?></td>
                            <td><?php echo $m->district; ?></td>
                            <td><?php echo $m->country; ?></td>
                            <td><?php echo $m->firstname; ?></td>
                            <td><?php echo $m->lastname; ?></td>
                            <td><?php echo $m->status; ?></td>
                            <td><?php echo $m->mail; ?></td>
                            <td><?php echo $m->email; ?></td>
                            <td><?php echo $m->homeno; ?></td>
                            <td><?php echo $m->cellno; ?></td>
                            <td><?php echo $m->employment; ?></td>
                            <td><?php echo $m->position; ?></td>
                            <td><?php echo $m->dob; ?></td>

                            <td><?php
                                foreach ($skills as $s):
                                    if ($s->id == $m->id):
                                        echo " • ";
                                        echo $s->skill;

                                    endif;
                                endforeach;
                                ?></td>


                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            </div>

    </body>
</html>