<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Farmers
                <a href="farmers-create.php" class="btn btn-primary float-end">Add Farmer</a>
            </h4>
        </div>
        <div class="card-body">
            
            <?php alertMessage(); ?>

            <?php
            $farmers = getAll('farmers');
            if(!$farmers){
                echo "<h4>{$farmers}</h4>";
                return false;
            }

            if(mysqli_num_rows($farmers) > 0)
            {
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Bank Account</th>
                            <th>Product</th>
                            <th>Frequency</th>
                            <th>Delivery</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($farmers as $farmeritem) : ?>
                        <tr>
                            <td><?= $farmeritem['id'] ?></td>
                            <td><?= $farmeritem['name'] ?></td>
                            <td><?= $farmeritem['email'] ?></td>
                            <td><?= $farmeritem['phone'] ?></td>
                            <td><?= $farmeritem['account'] ?></td>
                            <td><?= $farmeritem['product'] ?></td>
                            <td><?= $farmeritem['frequency'] ?></td>
                            <td><?= $farmeritem['delivery'] ?></td>
                            <td>
                                <?php  
                                    if($farmeritem['status'] == 1){
                                        echo '<span class="badge bg-danger">Hidden</span>';
                                    }else{
                                        echo '<span class="badge bg-primary">Visible</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="farmers-edit.php?id=<?= $farmeritem['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a 
                                    href="farmers-delete.php?id=<?= $farmeritem['id']; ?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this data?')"
                                >
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php
            }
            else
            {
                ?>
                    <h4 class="mb-0">No Record found</h4>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
