<?php
    include './../config.php';  
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>THÔNG TIN SỐ LƯỢNG HÀNG HÓA THEO SIZE</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Size</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $sql = "SELECT * FROM size WHERE MSHH='$id'";
                            $query = mysqli_query($conn, $sql);
                            $count_soLuong=0;

                            while($rows= mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["MaSize"] ?></td>
                                <td><?php echo $rows["SoLuongHang"] ?></td>
                                <?php $count_soLuong++ ?>
                            </tr>
                        <?php } ?>
                    </tr>
                </thead>
            </table>
            <p><b><?php echo 'Số lượng size: '. $count_soLuong ?></b></p>
        </div>
    </div>
</div>