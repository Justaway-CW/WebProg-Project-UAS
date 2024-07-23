<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UAS</title>
        <?= $bootstrap ?>
    </head>
    <body>
        <?= $navbar ?>

        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class='table-text'> # </th>
                    <th class='table-text'> Requested Facility </th>
                    <th class='table-text'> Date </th>
                    <th class='table-text'> Start Time </th>
                    <th class='table-text'> End Time </th>
                    <th class='table-text'> Status </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($dataR as $n => $row){
                        $id = $row['id'];
                        echo "<tr>";
                            echo "<td class='table-text'>" . $n + 1 ."</td>";
                            echo "<td class='table-text'>" .$dataF[$row['facilityID']]['name'] ."</td>";
                            echo "<td class='table-text'>" .$row['date'] ."</td>";
                            echo "<td class='table-text'>" .$row['startTime'] ."</td>";
                            echo "<td class='table-text'>" .$row['endTime'] ."</td>";
                            echo "<td class='table-text'>" .$row['status'] ."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <td class='table-text'> # </td>
                <td class='table-text'> Requested Facility </td>
                <td class='table-text'> Date </td>
                <td class='table-text'> Start Time </td>
                <td class='table-text'> End Time </td>
                <td class='table-text'> Status </td>
            </tfoot>
        </table>
        <?= $footer ?>
    </body>

    <?= $modal ?>

    <?php if(isset($_SESSION['validBook'])){ ?>
        <script type="text/javascript">
            var myModal = new bootstrap.Modal(document.getElementById('book'), {
                keyboard: false,
                focus: false
            })
            myModal.show()
        </script>
        <?php $this->session->unset_userdata('validBook');
    } ?>
</html>