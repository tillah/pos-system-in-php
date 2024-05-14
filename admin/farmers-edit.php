<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Edit Farmer
                <a href="farmers.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <form action="code.php" method="POST">

                <?php
                    $paramValue = checkParamId('id');
                    if(!is_numeric($paramValue)){
                        echo '<h5>'.$paramValue.'</h5>';
                        return false;
                    }

                    $farmers = getById('farmers', $paramValue);
                    if($farmers)
                    {
                        ?>
                        
                        <input type="hidden" name="farmerId" value="<?= $farmers['data']['id']; ?>" />

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Name *</label>
                                <input type="text" name="name" required value="<?= $farmers['data']['name']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Email Id</label>
                                <input type="email" name="email" value="<?= $farmers['data']['email']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Phone </label>
                                <input type="number" name="phone" value="<?= $farmers['data']['phone']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Bank Account </label>
                                <input type="number" name="account" value="<?= $farmers['data']['account']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Product </label>
                                <input type="text" name="product" value="<?= $farmers['data']['product']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Supply Frequency </label>
                                <input type="text" name="frequency" value="<?= $farmers['data']['frequency']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Delivery Type </label>
                                <input type="boolean" name="delivery" value="<?= $farmers['data']['delivery']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label>Status (UnChecked=Visible, Checked=Hidden)</label>
                                <br/>
                                <input type="checkbox" name="status" <?= $farmers['data']['status'] == true ? 'checked':''; ?> style="width:30px;height:30px";>
                            </div>
                            <div class="col-md-6 mb-3 text-end">
                                <br/>
                                <button type="submit" name="updateFarmer" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <?php
                    }
                
                    else
                    {
                        echo '<h5>'.$farmers['message'].'</h5>';
                        return false;
                    }
                ?>

               
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
