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
        include 'header.php';
        include 'config.php';

        $scooter = "SELECT * FROM scooter";
        $scooter1 = $conn->query($scooter);

        $tot = "SELECT MODEL_NAME, total_amount, scooter_id
        FROM
        (
            SELECT c.MODEL_NAME, IFNULL(b.total_amount, 0) as total_amount, c.scooter_id,
            ROW_NUMBER() OVER (ORDER BY c.scooter_id) as row_num
            FROM scooter c
            LEFT JOIN (SELECT MODEL_NAME, SUM(TOTAL_AMOUNT) as total_amount
                        FROM billing_details
                        GROUP BY MODEL_NAME) b
            ON b.MODEL_NAME = c.MODEL_NAME
        ) sub
        WHERE row_num >= 1
        ORDER BY row_num
        ";
        $totconn = $conn -> query($tot);
        
        ?>
        <div class="cal" style="margin-top: 100px;">
            <table class="invc">
                <tr>
                    <td>
                        <h3>SKUTER ID</h3>
                    </td>
                    <td>
                        <h3>REG BROJ</h3>
                    </td>
                    <td>
                        <h3>NAZIV MODELA</h3>
                    </td>
                    <td>
                        <h3>BREND</h3>
                    </td>
                    <td>
                        <h3>GODINA PROIZVODNJE</h3>
                    </td>
                    <td>
                        <h3>DOMET</h3>
                    </td>
                    <td>
                        <h3>KATEGORIJA</h3>
                    </td>
                    <td>
                        <h3>CIJENA PO DANU</h3>
                    </td>
                    <td>
                        <h3>DOSTUPNOST</h3>
                    </td>
                    <td>
                        <h3>OPIS</h3>
                    </td>
                    <td>
                        <h3>SLIKA</h3>
                    </td>
                    <td>
                        <h3>UKUPAN IZNOS</h3>
                    </td>
                </tr>

                <?php
                while ($scooterw1 = $scooter1->fetch_assoc() and $totop = $totconn->fetch_assoc()) { ?>

                    <tr>
                        <td><?php echo $scooterw1['scooter_id'] ?></td>
                        <td><?php echo $scooterw1['REGISTRATION_NUMBER'] ?></td>
                        <td><?php echo $scooterw1['MODEL_NAME'] ?></td>
                        <td><?php echo $scooterw1['MAKE'] ?></td>
                        <td><?php echo $scooterw1['MODEL_YEAR'] ?></td>
                        <td><?php echo $scooterw1['SCOOTER_RANGE'] ?></td>
                        <td><?php echo $scooterw1['SCOOTER_CATEGORY_NAME'] ?></td>
                        <td><?php echo $scooterw1['COST_PER_DAY'] ?></td>
                        <td><?php echo $scooterw1['AVAILABILITY_FLAG'] ?></td>
                        <td><?php echo $scooterw1['SCOOTER_DESCRIPTION'] ?></td>
                        <td><?php echo $scooterw1['image'] ?></td>
                        <td><?php echo $totop['total_amount'] ?></td>
                    </tr>

                <?php }
                ?>
            </table>
        </div>
        <form method="post">
            <table class="inv">
                <tr>
                    <label style="font-family:'Quicksand'; color: #ededed; font-size: 20px; " for="delete">Unesite ID skutera koji želite izbrisati: </label>
                    <br>
                    <input type="text" id="delete" placeholder="Skuter ID#" name="delete_id" style="margin-right: 10px;">
                    <input type="submit" name='delete' value="IZBRIŠI">
                </tr><br>
                <tr>
                    <input type="submit" name='add' value="DODAJ NOVI SKUTER">
                </tr>
            </table>
        </form>

        <?php

        if (isset($_POST['delete'])) {
            $delete_id = $_POST['delete_id'];

            $del = "DELETE FROM scooter WHERE scooter_id = '$delete_id'";
            $del1 = $conn->query($del);
        }
        if (isset($_POST['add'])) {
            $cat = "SELECT * FROM scooter_category";
            $cat1 = $conn->query($cat);
        ?>
            <div class="wrapper" style="display: flex; margin-top: 50px;">
                <form method="post" onsubmit="func()" style="margin: 0 auto;">
                    <table>
                        <tr>
                            <td class="tds">SKUTER ID:</td>
                            <td><input type="test" name="SKUTER_ID" required></td>
                        </tr>
                        <tr>
                            <td class="tds">REG BROJ:</td>
                            <td><input type="text" name="REGNUM" required></td>
                        </tr>
                        <tr>
                            <td class="tds">NAZIV MODELA:</td>
                            <td><input type="text" name="MNAME" required></td>
                        </tr>
                        <tr>
                            <td class="tds">BREND:</td>
                            <td><input type="text" name="MAKE" required></td>
                        </tr>
                        <tr>
                            <td class="tds">GODINA PROZIVODNJE:</td>
                            <td><input type="text" name="MYEAR" required></td>
                        </tr>
                        <tr>
                            <td class="tds">DOMET:</td>
                            <td><input type="text" name="CRANGE" required></td>
                        </tr>
                        <tr>
                            <td class="tds">KATEGORIJA:</td>
                            <td>
                                <select name="CATEGORY" required>
                                    <option> Izaberi kategoriju skutera </option>
                                    <?php
                                    while ($catw1 = $cat1->fetch_assoc()) { ?>
                                        <option style="color: #171717;"><?php echo $catw1['CATEGORY_NAME'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="tds">CJENA PO DANU:</td>
                            <td><input type="text" name="CPD" required></td>
                        </tr>
                        <tr>
                            <td class="tds">DOSTUPNOST:</td>
                            <td><input type="text" name="AVAILFLAG" required></td>
                        </tr>
                        <tr>
                            <td class="tds">OPIS:</td>
                            <td><input type="textarea" name="SKUTERDESC" required></td>
                        </tr>
                        <tr>
                            <td class="tds">SLIKA:</td>
                            <td><input type="text" name="IMAGE" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;">
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

        $scooterid = $_POST['SCOOTER_ID'];
        $regnum = $_POST['REGNUM'];
        $modelname = $_POST['MNAME'];
        $make = $_POST['MAKE'];
        $modelyear = $_POST['MYEAR'];
        $range = $_POST['CRANGE'];
        $category = $_POST['CATEGORY'];
        $cpd = $_POST['CPD'];
        $flag = $_POST['AVAILFLAG'];
        $scooterdesc = $_POST['SCOOTERDESC'];
        $image = $_POST['IMAGE'];

        $add = "INSERT INTO scooter VALUES ('$scooterid','$regnum','$modelname','$make','$modelyear','$range','$category','$cpd','$flag','$scooterdesc','$image')";
        $add1 = $conn->query($add);
        ?>
    }
</script>

</html>