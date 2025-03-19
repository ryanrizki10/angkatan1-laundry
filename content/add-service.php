<?php
// session_start();
// include '../koneksi.php';

if(isset($_POST['save'])){
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    $service_desc= $_POST['service_desc'];

    $insert = mysqli_query($koneksi, "INSERT INTO services (service_name, service_price, service_desc) VALUES ('$service_name', '$service_price', '$service_desc')");
    if ($insert) {
        header("location:?page=service&add=success");
    }
}

if(isset($_POST['edit'])){
    $id = $_GET['edit'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address= $_POST['customer_address'];

    $update = mysqli_query($koneksi, "UPDATE customers SET customer_name = '$customer_name', customer_phone = '$customer_phone', customer_address = '$customer_address' WHERE id = '$id'");
    if($update) {
        header("location:?page=service&update=success");
    }
}


$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM services WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);


?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?php echo isset($_GET['edit']) ? 'Edit' : 'Create New' ?>Edit Service</h3>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="mb-3">
                    <label for="">Service Name *</label>
                    <input value="<?php echo isset($_GET['edit']) ? $rowEdit['service_name'] : '' ?>" type="text" class="form-control" name="service_name" required placeholder="Enter Customer Name">
                </div>
                <div class="mb-3">
                    <label for="">Service Price *</label>
                    <input value="<?php echo isset($_GET['edit']) ? $rowEdit['service_price'] : '' ?>" type="text" class="form-control" name="service_price" required placeholder="Enter Customer Phone">
                </div>
                <div class="mb-3">
                    <label for="">Service Description </label>
                    <input value="<?php echo isset($_GET['edit']) ? $rowEdit['service_desc'] : '' ?>" type="text" class="form-control" name="service_desc" required placeholder="Enter Customer Address">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>