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
            <form action="" method="post">
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
                                <option value="<?php echo $manager['id']; ?>"><?php echo $manager['firstname'] . ' ' . $manager['lastname'] ; ?></option>
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
                                <option value="<?php echo $counselor['id']; ?>"><?php echo $counselor['firstname'] . ' ' . $counselor['lastname'] ; ?></option>
                            <?php } ?>
                     
                    </select>
                    <label for="fraternal_counselor_id">Fraternal Counselor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="date_established" name="date_established"
                        placeholder="Date Established">
                    <label for="date_established">Date Established</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- End of Add council Offcanvas -->

<div class="container-fluid">
    <div class="d-flex justify-content-start">
        <button class="btn btn-success mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
            aria-controls="staticBackdrop">
            <i class="fas fa-plus"></i> Add Council
        </button>
    </div>
    <table id="example" class="table table-sm display responsive nowrap caption-top" style="width:100%">
        <caption>List of councils</caption>
        <thead>
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
                while ($user = mysqli_fetch_assoc($fetch_councils)) {
            ?>
            <tr>
                <td><?php echo $user['council_number'] ?></td>
                <td><?php echo $user['council_name'] ?></td>
                <td><?php echo $user['unit_manager_id'] ?></td>
                <td><?php echo $user['fraternal_counselor_id'] ?></td>
                <td><?php echo $user['date_established'] ?></td>
                <td>
                    <button onclick="deleteUser(<?php echo $user['id']; ?>)" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /#page-content-wrapper -->

<script>
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
            axios.post(`${BASE_URL}/api/authApiController.php?action=deleteUser`, {
                    id: userId
                })
                .then(response => {
                    if (response.data.success) {
                        Swal.fire('Deleted!', response.data.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', response.data.message, 'error');
                    }
                })
                .catch(() => Swal.fire('Error', 'An unexpected error occurred.', 'error'));
        }
    });
}
</script>





<?php include '../../includes/admin_footer.php'; ?>