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
                    <th class='table-text'> Image </th>
                    <th class='table-text'> Name </th>
                    <th class='table-text'> Operation </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($data as $n => $row){
                        $n = $n+1;
                        $id = $row['id'];
                        echo "<tr>";
                            echo "<td class='table-text'> $n </td>";
                            echo "<td><img class='img-fluid' width='300' height='160' src='" . base_url('assets/facility/'.$row['image']) ."'></td>";
                            echo "<td class='table-text'>" .$row['name'] ."</td>";
                            echo "<td>";
                                echo "<a href='".site_url("Facility/showEditFacility/$id")."'
                                        style='margin-right:10px;color:rgb(255,215,0);'>";
                                    echo "<button class='btn btn-outline-secondary table-text'>";
                                        echo "EDIT";
                                    echo "</button>";
                                echo "</a>";

                                echo "<a href='".site_url("Facility/deleteFacility/$id")."'
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
                <td class='table-text'> Image </td>
                <td class='table-text'> Name </td>
                <td class='table-text'> Operation </td>
            </tfoot>
        </table>
        <?= $footer ?>
    </body>
    <?= $modal ?>

    <?php if(isset($_SESSION['invalidAdd'])){ ?>
        <script type="text/javascript">
            var myModal = new bootstrap.Modal(document.getElementById('adminfacilityadd'), {
                keyboard: false,
                focus: false
            })
            myModal.show()
        </script>
        <?php $this->session->unset_userdata('invalidAdd');
    } ?>
</html>