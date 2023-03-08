<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Scoot</title>
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">
    <meta name="description" content="La casa free real state fully responsive html5/css3 home page website template" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <style>
        .tds {
            color: #ededed;
            font-family: 'Quicksand';
        }
    </style>
</head>

<body>

    <section class="">
        <?php
        include 'config.php';
        include 'header.php';

        $scooter = "SELECT * FROM scooter_category";
        $scooter1 = $conn->query($scooter);
        ?>
        <div class="cal">
            <table class="invc">
                <tr>
                    <td>
                        <h3>KATEGORIJA SKUTERA</h3>
                    </td>
                    <td>
                        <h3>KAPACITET</h3>
                    </td>
                    <td>
                        <h3>BROJ MJESTA</h3>
                    </td>
                </tr>

                <?php
                while ($scooterw1 = $scooter1->fetch_assoc()) {
                ?>

                    <tr>
                        <td><?php echo $scooterw1['CATEGORY_NAME'] ?></td>
                        <td><?php echo $scooterw1['NO_OF_LUGGAGE'] ?></td>
                        <td><?php echo $scooterw1['NO_OF_PERSON'] ?></td>
                    </tr>

                <?php }
                $cat = "SELECT * FROM scooter_category";
                $cat1 = $conn->query($cat);
                ?>
            </table>
        </div>
        <form method="post">
            <table class="inv">
                <tr>
                    <p style="height:30px;color: #ededed; font-family: 'Quicksand'; margin-top: 10px; font-size: 20px;">ODABERITE KATEGORIJU SKUTERA KOJU ĆETE BRISATI:</p>
                </tr>

                <tr>
                <tr>
                    <select name="CATEGORY_DEL" required style="margin-right: 10px;">
                        <option> Odaberite kategoriju skutera </option>
                        <?php
                        while ($catw1 = $cat1->fetch_assoc()) { ?>
                            <option style="color: #171717;"><?php echo $catw1['CATEGORY_NAME'] ?></option>
                        <?php }
                        ?>
                    </select>
                    <input type="submit" name='cat_delete' value="OBRIŠI">
                </tr>
                </tr><br>
                <tr>
                    <input type="submit" name='add' value="DODAJTE NOVU KATEGORIJU SKUTERA">
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['cat_delete'])) {
            $delete_id = $_POST['CATEGORY_DEL'];

            $del = "DELETE FROM scooter_category WHERE CATEGORY_NAME = '$delete_id'";
            $del1 = $conn->query($del);
        }
        if (isset($_POST['add'])) {

        ?>
            <div class="wrapper" style="display: flex; margin-top: 50px;">
                <form method="post" onsubmit="func()" style="margin: 0 auto;">
                    <table>
                        <tr>
                            <td class="tds">KATEGORIJA:</td>
                            <td><input type="test" name="CAT_NAME" required></td>
                        </tr>
                        <tr>
                            <td class="tds">KAPACITET:</td>
                            <td><input type="text" name="LUGGAGE" required></td>
                        </tr>
                        <tr>
                            <td class="tds">BROJ MJESTA</td>
                            <td><input type="text" name="SEAT" required></td>
                        </tr>
                        <tr>
                            <!-- <td class="tds"><input type="submit" name="save" value="SUBMIT"></td> -->
                            <td colspan="2" style="text-align:center">
                                <input class="but" type="submit" name="save" value="POTVRDI" style="width: 100px; color: #ededed; background: #49c5b6;">
                            </td>
                        </tr>
                    </table>
                </form>
            </div><?php
                }
                    ?>

    </section><!--  end search section  -->

    <?php
    // include 'footer.php';
    ?><!--  end footer  -->

</body>
<script>
    function func() {
        <?php

        $catname = $_POST['CAT_NAME'];
        $luggage = $_POST['LUGGAGE'];
        $seat = $_POST['SEAT'];

        if ($luggage != 0 or $seat != 0) {
            $add = "INSERT INTO scooter_category VALUES ('$catname','$luggage','$seat')";
            $add1 = $conn->query($add);
        }
        ?>
    }
</script>

</html>