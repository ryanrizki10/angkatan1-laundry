<?php

$queryCustomer = mysqli_query($koneksi, "SELECT * FROM customers ORDER BY id DESC");
$rowCustomer = mysqli_fetch_all($queryCustomer, MYSQLI_ASSOC);

?>




<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Customer</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rowCustomer as $row): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['customer_name'] ?></td>
                                <td><?php echo $row['customer_phone'] ?></td>
                                <td><?php echo $row['customer_address'] ?></td>
                                <td>
                                    <a href="?page-add-customer&edit=<?php echo $row['id']?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="" onclick="return confirm('Are you sure??')" class="btn btn-danger btn-sm"></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>