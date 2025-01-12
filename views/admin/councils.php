<?php include '../../includes/admin_header.php'; ?>
<title>List of Councils</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<!-- Page Content -->

<!-- Add council Offcanvas -->
<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
    aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">Add Council</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <form onSubmit="event.preventDefault() ; addCouncil();" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="council_number" name="council_number"
                        placeholder="Council Number">
                    <label for="council_number">Council Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="council_name" name="council_name"
                        placeholder="Council Name">
                    <label for="council_name">Council Name</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" id="unit_manager_id" name="unit_manager_id">
                        <option value="">Select Unit Manager</option>
                        <?php
                            $fetch_unit_managers = mysqli_query($conn, "SELECT * FROM users WHERE role = 'unit-manager'");
                            while ($manager = mysqli_fetch_assoc($fetch_unit_managers)) { ?>
                        <option value="<?php echo $manager['id']; ?>">
                            <?php echo $manager['firstname'] . ' ' . $manager['lastname'] ; ?></option>
                        <?php } ?>
                    </select>
                    <label for="unit_manager_id">Unit Manager</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" id="fraternal_counselor_id" name="fraternal_counselor_id">
                        <option value="">Select Fraternal Counselor</option>
                        <?php
                            $fetch_counselors = mysqli_query($conn, "SELECT * FROM users WHERE role = 'fraternal-counselor'");
                            while ($counselor = mysqli_fetch_assoc($fetch_counselors)) { ?>
                        <option value="<?php echo $counselor['id']; ?>">
                            <?php echo $counselor['firstname'] . ' ' . $counselor['lastname'] ; ?></option>
                        <?php } ?>

                    </select>
                    <label for="fraternal_counselor_id">Fraternal Counselor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="date_established" name="date_established"
                        placeholder="Date and Time Established">
                    <label for="date_established">Date and Time Established</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- End of Add council Offcanvas -->

<!-- Modal For Update Council -->
<div class="modal fade" id="updateCouncilModal" tabindex="-1" aria-labelledby="updateCouncilModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCouncilModalLabel">Update Council</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onSubmit="event.preventDefault(); updateCouncil();" method="post">
                    <input type="text" id="council_id" name="council_id">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="update_council_number" name="council_number"
                            placeholder="Council Number">
                        <label for="update_council_number">Council Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="update_council_name" name="council_name"
                            placeholder="Council Name">
                        <label for="update_council_name">Council Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="update_unit_manager_id" name="unit_manager_id">
                            <option value="">Select Unit Manager</option>
                            <?php
                                $fetch_unit_managers = mysqli_query($conn, "SELECT * FROM users WHERE role = 'unit-manager'");
                                while ($manager = mysqli_fetch_assoc($fetch_unit_managers)) { ?>
                            <option value="<?php echo $manager['id']; ?>">
                                <?php echo $manager['firstname'] . ' ' . $manager['lastname'] ; ?></option>
                            <?php } ?>
                        </select>
                        <label for="update_unit_manager_id">Unit Manager</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="update_fraternal_counselor_id" name="fraternal_counselor_id">
                            <option value="">Select Fraternal Counselor</option>
                            <?php
                                $fetch_counselors = mysqli_query($conn, "SELECT * FROM users WHERE role = 'fraternal-counselor'");
                                while ($counselor = mysqli_fetch_assoc($fetch_counselors)) { ?>
                            <option value="<?php echo $counselor['id']; ?>">
                                <?php echo $counselor['firstname'] . ' ' . $counselor['lastname'] ; ?></option>
                            <?php } ?>
                        </select>
                        <label for="update_fraternal_counselor_id">Fraternal Counselor</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="update_date_established" name="date_established"
                            placeholder="Date and Time Established">
                        <label for="update_date_established">Date and Time Established</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- EndModal For Update Council -->

<div class="container-fluid">
    <div class="d-flex justify-content-start">
        <button class="btn btn-success mb-3 shadow" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <i class="fas fa-plus"></i> Add Council
        </button>
    </div>
    <div class="card p-3">
        <table id="example" class="table table-sm display responsive nowrap caption-top" style="width:100%">
            <caption><i class="fas fa-list"></i> List of councils</caption>
            <thead class="table-dark">
                <tr>
                    <th>COUNCIL NUMBER</th>
                    <th>COUNCIL NAME</th>
                    <th>UNIT MANAGER</th>
                    <th>FRATERNAL COUNSELOR</th>
                    <th>DATE ESTABLISHED</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $fetch_councils = mysqli_query($conn, "SELECT * FROM council");
                    while ($council = mysqli_fetch_assoc($fetch_councils)) {
                ?>
                <tr>
                    <td><?php echo $council['council_number'] ?></td>
                    <td><?php echo $council['council_name'] ?></td>
                    <td><?php echo $council['unit_manager_id'] ?></td>
                    <td><?php echo $council['fraternal_counselor_id'] ?></td>
                    <td><?php echo $council['date_established'] ?></td>
                    <td>
                        <button onclick="deleteCouncil(<?php echo $council['council_id']; ?>)"
                            class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                        <button
                            onclick="loadCouncilData(<?php echo $council['council_id']; ?>, '<?php echo $council['council_number']; ?>', '<?php echo $council['council_name']; ?>', '<?php echo $council['unit_manager_id']; ?>', '<?php echo $council['fraternal_counselor_id']; ?>', '<?php echo $council['date_established']; ?>')"
                            class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateCouncilModal">
                            <i class="fas fa-edit"></i> Update
                        </button>
                    </td>
                </tr>
                <?php } ?>
            <tfoot>
                <tr>
                    <th>COUNCIL NUMBER</th>
                    <th>COUNCIL NAME</th>
                    <th>UNIT MANAGER</th>
                    <th>FRATERNAL COUNSELOR</th>
                    <th>DATE ESTABLISHED</th>
                    <th>ACTIONS</th>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>

</div>
<!-- /#page-content-wrapper -->
<script>
flatpickr("#date_established", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    altInput: true,
    altFormat: "F j, Y, H:i",
    time_24hr: true
});
</script>

<script>
function loadCouncilData(councilId, councilNumber, councilName, unitManagerId, fraternalCounselorId, dateEstablished) {

    document.getElementById('council_id').value = councilId;
    document.getElementById('update_council_number').value = councilNumber;
    document.getElementById('update_council_name').value = councilName;
    document.getElementById('update_unit_manager_id').value = unitManagerId;
    document.getElementById('update_fraternal_counselor_id').value = fraternalCounselorId;
    document.getElementById('update_date_established').value = dateEstablished;
}

function updateCouncil() {
    const BASE_URL = "<?php echo BASE_URL; ?>";
    const council_id = document.getElementById('council_id').value;
    const council_number = document.getElementById('update_council_number').value;
    const council_name = document.getElementById('update_council_name').value;
    const unit_manager_id = document.getElementById('update_unit_manager_id').value;
    const fraternal_counselor_id = document.getElementById('update_fraternal_counselor_id').value;
    const date_established = document.getElementById('update_date_established').value;

    const data = {
        council_id: council_id,
        council_number: council_number,
        council_name: council_name,
        unit_manager_id: unit_manager_id,
        fraternal_counselor_id: fraternal_counselor_id,
        date_established: date_established
    };

    axios.post(`${BASE_URL}/api/councilApiController.php?action=updateCouncil`, data)
        .then(response => {
            if (response.data.success) {
                console.log(response.data);
                Swal.fire('Success', response.data.message, 'success').then(() => {
                    location.reload();
                });
            } else {
                console.log(response.data);
                Swal.fire('Error', response.data.message, 'error');
            }
        })
        .catch(() => Swal.fire('Error', 'An unexpected error occurred.', 'error'));
}

function addCouncil() {
    const BASE_URL = "<?php echo BASE_URL; ?>";
    const council_number = document.getElementById('council_number').value;
    const council_name = document.getElementById('council_name').value;
    const unit_manager_id = document.getElementById('unit_manager_id').value;
    const fraternal_counselor_id = document.getElementById('fraternal_counselor_id').value;
    const date_established = document.getElementById('date_established').value;

    const data = {
        council_number: council_number,
        council_name: council_name,
        unit_manager_id: unit_manager_id,
        fraternal_counselor_id: fraternal_counselor_id,
        date_established: date_established
    };

    axios.post(`${BASE_URL}/api/councilApiController.php?action=addCouncil`, data)
        .then(response => {
            if (response.data.success) {
                console.log(response.data);
                Swal.fire('Success', response.data.message, 'success').then(() => {
                    location.reload();
                });
            } else {
                console.log(response.data);
                Swal.fire('Error', response.data.message, 'error');
            }
        })
        .catch(() => Swal.fire('Error', 'An unexpected error occurred.', 'error'));
}

function deleteCouncil(councilId) {
    const BASE_URL = "<?php echo BASE_URL; ?>";
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(`${BASE_URL}/api/councilApiController.php?action=deleteCouncil`, {
                    councilId: councilId
                })
                .then(response => {
                    if (response.data.success) {
                        console.log(response.data);
                        Swal.fire('Deleted!', response.data.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        console.log(response.data);
                        Swal.fire('Error', response.data.message, 'error');
                    }
                })
                .catch(() => Swal.fire('Error', 'An unexpected error occurred.', 'error'));
        }
    });
}
</script>





<?php include '../../includes/admin_footer.php'; ?>