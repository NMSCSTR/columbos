<?php include '../../includes/admin_header.php'; ?>
<title>Fraternal Benifits</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<!-- Page Content -->
<!-- Offcanvas -->
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
    aria-labelledby="staticBackdropLabel" style="width: 100vw; height: 100vh; max-width: 100vw;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <div class="container mt-5">
                <h2>Create New Plan</h2>
                <hr>
                <form onSubmit="event.preventDefault(); addPlan();" action="" method="POST"
                    enctype="multipart/form-data">
                    <div class="row">
                        <!-- TYPE -->
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="type" name="type" required>
                                    <option value="Savings Plan">Savings Plan</option>
                                    <option value="Investment Plan">Investment Plan</option>
                                    <option value="Retirement Plan">Retirement Plan</option>
                                    <option value="Educational Plan">Educational Plan</option>
                                    <option value="Protection Plan">Protection Plan</option>
                                    <option value="Term Plan">Term Plan</option>
                                </select>
                                <label for="type">Type</label>
                            </div>
                        </div>

                        <!-- NAME -->
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                    required>
                                <label for="name">Name</label>
                            </div>
                        </div>

                        <!-- ABOUT (TextArea) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" id="about" name="about" placeholder="Enter About" rows="10" cols="50"
                                    required></textarea>
                                <label for="about">About</label>
                            </div>
                        </div>

                        <!-- BENEFITS (TextArea) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" id="benefits" name="benefits" rows="4" cols="50"
                                    placeholder="Enter Benefits" required></textarea>
                                <label for="benefits">Benefits</label>
                            </div>
                        </div>

                        <!-- CONTRIBUTION PERIOD -->
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="contribution_period"
                                    name="contribution_period" placeholder="Enter Contribution Period" required>
                                <label for="contribution_period">Contribution Period</label>
                            </div>
                        </div>

                        <!-- IMAGE -->
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="file" class="form-control" id="image" name="image" required>
                                <label for="image">Image</label>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Offcanvas -->
<div class="container-fluid">
    <div class="d-flex justify-content-start">
        <button class="btn btn-success mb-3 shadow" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <i class="fas fa-plus"></i> Add Plan
        </button>
    </div>
    <div class="card p-3 shadow">
        <div class="table-responsive">
            <table id="example" class="table table-bordered display responsive nowrap caption-top"
                style="width:100%">
                <caption><i class="fas fa-list"></i> List of Plan</caption>
                <hr class="border border-primary border-3 opacity-75">
                <thead class="table-dark">
                    <tr>
                        <th>TYPE</th>
                        <th>NAME</th>
                        <th>CONTRIBUTION PERIOD</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $fetch_plan = mysqli_query($conn, "SELECT * FROM fraternal_benefits");
                        while ($plan = mysqli_fetch_assoc($fetch_plan)) { ?>
                    <tr>
                        <td><?php echo $plan['type'] ?></td>
                        <td><?php echo $plan['name'] ?></td>
                        <td><?php echo $plan['contribution_period'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-success btn-sm" onClick = "redirectToPlanDetails(<?php echo $plan['id']?>)"><i class="fas fa-info-circle"></i> More Details</a>
                        </td>
                    </tr>
                    <?php } ?>
                <tfoot>
                    <tr>
                        <th>TYPE</th>
                        <th>NAME</th>
                        <th>CONTRIBUTION PERIOD</th>
                        <th>ACTIONS</th>
                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /#page-content-wrapper -->

<script>
    function redirectToPlanDetails(id) {
        window.location.href = `plan_details.php?id=${id}`;
    }
</script>
<script>
function addPlan() {
    const BASE_URL = "<?php echo BASE_URL; ?>";
    const formData = new FormData();

    // Collect data from the form
    formData.append('type', document.getElementById('type').value);
    formData.append('name', document.getElementById('name').value);
    formData.append('about', document.getElementById('about').value);
    formData.append('benefits', document.getElementById('benefits').value);
    formData.append('contribution_period', document.getElementById('contribution_period').value);
    formData.append('image', document.getElementById('image').files[0]);

    // Send request using axios
    axios.post(`${BASE_URL}api/planApiController.php?action=addPlan`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data' // Correct header for FormData
            }
        })
        .then(response => {
            if (response.data.success) {
                Swal.fire('Success', response.data.message, 'success').then(() => {
                    location.reload();
                });
            } else {
                console.log(response.data);
                Swal.fire('Error', response.data.message, 'error');
            }
        })
        .catch(error => {
            console.log(error);
            Swal.fire('Error', 'An error occurred', 'error');
        });
}
</script>



<?php include '../../includes/admin_footer.php'; ?>