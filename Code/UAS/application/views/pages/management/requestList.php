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
                    <th class='table-text'> Requester </th>
                    <th class='table-text'> Requested Facility </th>
                    <th class='table-text'> Date </th>
                    <th class='table-text'> Start Time </th>
                    <th class='table-text'> End Time </th>
                    <th class='table-text'> Operation </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($data as $n => $row){
                        $id = $row['id'];
                        echo "<tr>";
                            echo "<td class='table-text'>" .$row['id'] ."</td>";
                            echo "<td class='table-text'>" .$row['requesterName'] ."</td>";
                            echo "<td class='table-text'>" .$row['facilityName'] ."</td>";
                            echo "<td class='table-text'>" .$row['date'] ."</td>";
                            echo "<td class='table-text'>" .$row['startTime'] ."</td>";
                            echo "<td class='table-text'>" .$row['endTime'] ."</td>";
                            echo "<td>";
                                echo "<a href='".site_url("Management/approveRequest/$id")."'
                                        style='margin-right:10px;color:rgb(255,215,0);'>";
                                    echo "<button class='btn btn-outline-secondary table-text'>";
                                        echo "APPROVE";
                                    echo "</button>";
                                echo "</a>";
                                echo "<a href='".site_url("Management/rejectRequest/$id")."'
                                        style='margin-right:10px;color:rgb(255,215,0);'>";
                                    echo "<button class='btn btn-outline-secondary table-text'>";
                                        echo "REJECT";
                                    echo "</button>";
                                echo "</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <td class='table-text'> # </td>
                <td class='table-text'> Requester </td>
                <td class='table-text'> Requested Facility </td>
                <td class='table-text'> Date </td>
                <td class='table-text'> Start Time </td>
                <td class='table-text'> End Time </td>
                <td class='table-text'> Operation </td>
            </tfoot>
        </table>
        <?= $footer ?>
    </body>
</html>