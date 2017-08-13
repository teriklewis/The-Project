<!DOCTYPE html>

<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
        <h1>Profile

            <a href="<?= site_url('HomeController') ?>">Home</a> </h1>
        <h3>
            <?php foreach ($profile as $p): ?>

                <!--skills - if they have skill(s) list them. -->
                First Name - <?php echo $p->firstname; ?> </br>
                Last Name - <?php echo $p->lastname; ?></br>
                Church Status - <?php echo $p->status; ?></br>
                Mailing Address - <?php echo $p->mail; ?></br>
                E-mail Address - <?php echo $p->email; ?></br>
                Contact No. (Home) - <?php echo $p->homeno; ?></br>
                Contact No. (Cell) - <?php echo $p->cellno; ?></br>
                Employment Status - <?php echo $p->employment; ?></br>
                Position in Church - <?php echo $p->position; ?></br>
                Date of Birth - <?php echo $p->dob; ?></br>

                Skills - <?php
            endforeach;
            foreach ($skills as $s):
                echo $s->skill;
                echo " ";
            endforeach;
            ?>
        </h3>
    </body>
</html>