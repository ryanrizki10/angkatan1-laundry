<?php


$queryService = mysqli_query($koneksi, "SELECT * FROM services ORDER BY id DESC");
$rowService = mysqli_fetch_all($queryService, MYSQLI_ASSOC);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = mysqli_query ($koneksi,"DELETE FROM services WHERE id = '$id'");
    header("location:?page=service&notif=success");
}

?>



<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Service</h3>
            </div>
            <div class="card-body">
                <div align="left" class="mb-3 mt-3">
                    <a href="?page=add-service" class="btn btn-primary">Create New Service</a>
                </div>
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
                        foreach ($rowService as $row): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['service_name'] ?></td>
                                <td><?php echo $row['service_price'] ?></td>
                                <td><?php echo $row['service_desc'] ?></td>
                                <td>
                                    <a href="?page=add-service&edit=<?php echo $row['id']?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=service&delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure??')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>