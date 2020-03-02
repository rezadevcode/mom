<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=$title.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<html>
    <head>
        <style>
            table, td {border:1em solid black}
            table {border-collapse:collapse}
        </style>
    </head>
    <body>
        <table width="900">
            <thead >
                <tr>
                    <th align="center" border="1">     
                        Join As
                    </th>
                    <th align="center" border="1">                     
                        Name
                    </th>
                    <th align="center" border="1">                     
                        Handphone
                    </th>
                    <th align="center" border="1">     
                    Email
                    </th>
                    <th align="center" border="1">     
                    Instagram Account
                    </th>
                    <th align="center" border="1">     
                    Facebook Account
                    </th>
                    <th align="center" border="1">     
                    Twitter Account
                    </th>
                    <th align="center" border="1">     
                    Category
                    </th>
                    <th align="center" border="1">                     
                    Portfolio
                    </th>
                    <th align="center" border="1">     
                    Ratecard
                    </th>
                    <th align="center" border="1">     
                    Website
                    </th>
                    <th align="center" border="1">     
                    CV
                    </th>
                    <th align="center" border="1">     
                        Status
                    </th>
                    <th align="center" border="1">     
                        Join Date
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                // echo '<pre>';
                // print_r($results);exit;
                if ($results) {
                    foreach ($results as $row) {
                        ?>

                        <tr>
                            <td class="text-left"><?php echo $row['member_type'] ?></td>
                            <td class="text-left"><?php echo $row['name'] ?></td>
                            <td class="text-left"><?php echo $row['handphone'] ?></td>
                            <td class="text-left"><?php echo $row['email'] ?></td>
                            <td class="text-left"><?php echo $row['ig_account'] ?></td>
                            <td class="text-left"><?php echo $row['fb_account'] ?></td>
                            <td class="text-left"><?php echo $row['twitter_account'] ?></td>
                            <td class="text-left"><?php echo $row['comunity'] ?></td>
                            <td class="text-left"><a href="<?php echo $row['portfolio'] ?>"><?php echo $row['portfolio'] ?></a></td>
                            <td class="text-left"><?php echo $row['ratecard'] ?></td>
                            <td class="text-left"><?php echo $row['website'] ?></td>
                            <?php
                                if(isset($row['resume'])){
                                    echo '<td class="text-left"><a href="'.base_url('assets/cv/'.$row['resume']).'">'.$row['resume'].'</a></td>';
                                }else{
                                    echo '<td class="text-left"></td>';
                                }
                            ?>
                            
                            <td class="text-left"><?php echo $row['status'] == 1 ? 'enabled' : 'disabled' ?></td>
                            <td class="text-left"><?php echo $row['added'] ?></td>
                        </tr>

                        <?php
                    }
                } else {
                    echo '<tr>';
                    echo '<td class="text-center" colspan="14">No Results!</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </body>
</html>