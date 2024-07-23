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
                    <th class='table-text'> Nama </th>
                    <th class='table-text'> Email </th>
                    <th class='table-text'> Role </th>
                    <th class='table-text'> Operation </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($data as $n => $row){
                        $id = $row['id'];
                        $n = $n+1;
                        echo "<tr>";
                            echo "<td class='table-text'>" .$n."</td>";
                            echo "<td class='table-text'>" .$row['name'] ."</td>";
                            echo "<td class='table-text'>" .$row['email'] ."</td>";
                            echo "<td class='table-text'>" .$row['role'] ."</td>";
                            echo "<td>";
                                echo "<a href='".site_url("Admin/showEditUser/$id")."'
                                        style='margin-right:10px;color:rgb(255,215,0);'>";
                                    echo "<button class='btn btn-outline-secondary table-text'>";
                                        echo "EDIT";
                                    echo "</button>";
                                echo "</a>";

                                echo "<a href='".site_url("Admin/deleteUser/$id")."'
                                        style='margin-right:10px;color:rgb(255,215,0);'>";
                                    echo "<button class='btn btn-outline-secondary table-text'>";
                                        echo "DELETE";
                                    echo "</button>";
                                echo "</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <td class='table-text'> # </td>
                <td class='table-text'> Nama </td>
                <td class='table-text'> Email </td>
                <td class='table-text'> Role </td>
                <td class='table-text'> Operation </td>
            </tfoot>
        </table>
        <?= $footer ?>
    </body>
    <?= $modal ?>

    <?php if(isset($_SESSION['invalidAdd'])){ ?>
        <script type="text/javascript">
            var myModal = new bootstrap.Modal(document.getElementById('adminuseradd'), {
                keyboard: false,
                focus: false
            })
            myModal.show()
        </script>
        <?php $this->session->unset_userdata('invalidAdd');
    } ?>
</html>