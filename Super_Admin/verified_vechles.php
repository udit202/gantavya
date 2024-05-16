<?php
require 'db.php';
$sql = "SELECT * FROM `wp_vehicles` Where `is_verified`=1";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
echo $num;
$no = 1;
?>
<table id="Vechles_verified" class="display" style="padding:20px">
    <thead>
        <tr>
            <th>
                NO.
            </th>
            <th>

                vehicle_number
            </th>
            <th>
                vehicle_owner
            </th>
            <th>
                vehicle_type
            </th>
            <th>
                seats_count
            </th>
            <th>
                seats_available
            </th>
            <th>
                Front
            </th>
            <th>
                back
            </th>
            <th>
                is_verified
            </th>

        </tr>
    </thead>
    <tbody>
<?php
if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $obj = json_decode($row['rc_data']);
        $front = $obj->rc_front_view->uploaded_url;
    $back =$obj->rc_back_view->uploaded_url;
    // echo $front;
    // echo '<br>';
    // echo $back;
    echo "<tr>
    <td>".$no."</td>
    <td>".
        $row['vehicle_number']	."
    </td>
    <td>".
        $row['vehicle_owner']	."
    </td>
    <td>".
        $row['vehicle_type']	."
    </td>
    <td>".
        $row['seats_count']	."
    </td>
    <td>".
        $row['seats_available']."
    </td>
    <td>
    <a href=".$front." class='btn btn-outline-danger'>
    front </a>
    </td>
    <td>
    <a href=".$back." class='btn btn-outline-danger'>
    back </a>
    </td>
    <td>".
        $row['is_verified']	."
        
    </td>
</tr>"
    ;
    $no++;

    // $obj2= json_decode($obj->rc_front_view);
    // echo var_dump($obj2);

    // echo '<br>';

  }
}
?>
</tbody>
</table>