<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../includes/admin_header.php'; ?>
<title>Plan Details</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<?php

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0; 

if ($id > 0) {
    $sql = "SELECT * FROM `fraternal_benefits` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $details = mysqli_fetch_assoc($result);
    } else {
        echo "No record found.";
        exit;
    }
} else {
    echo "Invalid ID.";
    exit;
}
?>


<!-- Offcanvas Plan Update -->
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
    aria-labelledby="staticBackdropLabel" style="width: 100vw; height: 100vh; max-width: 100vw;">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <div class="container mt-5">
                <h2>Update Plan</h2>
                <hr>
                <form onSubmit="e.preventDefault(); updatePlan();" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- ID (Hidden) -->
                        <input type="hidden" id="id" name="id">

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
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                <label for="name">Name</label>
                            </div>
                        </div>

                        <!-- ABOUT (TextArea) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" id="about" name="about" placeholder="Enter About" rows="10" cols="50" required></textarea>
                                <label for="about">About</label>
                            </div>
                        </div>

                        <!-- BENEFITS (TextArea) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" id="benefits" name="benefits" rows="4" cols="50" placeholder="Enter Benefits" required></textarea>
                                <label for="benefits">Benefits</label>
                            </div>
                        </div>

                        <!-- CONTRIBUTION PERIOD -->
                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="contribution_period" name="contribution_period" placeholder="Enter Contribution Period" required>
                                <label for="contribution_period">Contribution Period</label>
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
<!-- End Offcanvas Plan Update -->

<!-- Page Content -->
<div class="container-fluid my-4">
    <div class="card shadow-lg border-0 h-100">
        <div class="row g-0 h-100">
            <!-- Image Section -->
            <div class="col-md-4 d-flex align-items-center">
                <?php if (!empty($details['image'])): ?>
                <img src="<?php echo BASE_URL . 'uploads/' . $details['image']; ?>" alt="Plan Image"
                    class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                <?php else: ?>
                <img src="path_to_default_image.jpg" alt="No Image Available"
                    class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                <?php endif; ?>
            </div>
            <!-- Details Section -->
            <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-center h-100">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title fs-1"><?php echo $details['name']; ?></h3>
                        <div class="dropstart">
                            <i class="fa-solid fa-ellipsis-vertical fa-2xl" data-bs-toggle="dropdown"
                                aria-expanded="false" style="cursor: pointer;"></i>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#"
                                        onClick="deletePlan(<?php echo $details['id']; ?>)">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </li>
                                <li>
                                    <!-- Update Plan Link -->
                                    <!-- <a class="dropdown-item" href="#" onclick="loadPlanDetails(
                                        '<?php echo $details['id']; ?>',
                                        '<?php echo $details['name']; ?>',
                                        '<?php echo $details['type']; ?>',
                                        '<?php echo $details['contribution_period']; ?>',
                                        '<?php echo $details['about']; ?>',
                                        '<?php echo $details['benefits']; ?>'
                                    )" class="btn btn-primary flex-grow-1" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                        <i class="fas fa-edit"></i> Update
                                    </a> -->
                                    <a class="dropdown-item" onclick="loadPlan('<?php echo $details['id']; ?>', '<?php echo $details['name']; ?>', '<?php echo $details['type']; ?>','<?php echo $details['contribution_period']; ?>','<?php echo $details['about']?>', '<?php echo $details['about']?>')" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop"><i class="fas fa-edit"></i> Update</a>
                                </li>
                                <!-- <li class="dropdown-item">
                                    <i class="fas fa-camera"></i> Change photo
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <p class="card-text fs-3 text-success"><strong><?php echo $details['type']; ?></strong></p>
                    <hr class="border border-dark border-3 opacity-75">
                    <p class="card-text fs-5"><strong>Contribution Period:</strong> <br>
                        <?php echo $details['contribution_period']; ?></p>
                    <p class="card-text fs-5"><strong>About:</strong> <br> <?php echo $details['about']; ?></p>
                    <p class="card-text fs-5"><strong>Benefits:</strong> <?php echo $details['benefits']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- /#page-content-wrapper -->

<script>
    const BASE_URL = "<?php echo BASE_URL; ?>";
    function loadPlan (id, name, type, contribution_period, about, benefits) {
        console.log(id, name, type, contribution_period, about, benefits);
        document.getElementById('id').value = id;
        document.getElementById('name').value = name;
        document.getElementById('type').value = type;
        document.getElementById('contribution_period').value = contribution_period;
        document.getElementById('about').value = about;
        document.getElementById('benefits').value = benefits;
    }


console.log(BASE_URL);
function deletePlan(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`${BASE_URL}api/planApiController.php?id=${id}`)
                .then(response => {
                    if (response.data.success) {
                        Swal.fire('Success', response.data.message, 'success').then(() => {
                            window.location.href = 'fraternal_benefits.php';
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
    });

}

function updatePlan() {
    const formData = new FormData();
    formData.append('id', document.getElementById('id').value);
    formData.append('type', document.getElementById('type').value);
    formData.append('name', document.getElementById('name').value);
    formData.append('about', document.getElementById('about').value);
    formData.append('benefits', document.getElementById('benefits').value);
    formData.append('contribution_period', document.getElementById('contribution_period').value);
    const imageInput = document.getElementById('image'); 
    if (imageInput && imageInput.files[0]) {
        formData.append('image', imageInput.files[0]);
    }

    axios.put(`${BASE_URL}api/planApiController.php?id=${formData.get('id')}`, formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
        },
    })
        .then(response => {
            if (response.data.success) {
                Swal.fire('Success', response.data.message, 'success').then(() => {
                    location.reload();
                });
            } else {
                Swal.fire('Error', response.data.message, 'error');
            }
        })
        .catch(error => {
            Swal.fire('Error', error.response?.data?.message || 'An error occurred', 'error');
        });
}

</script>



<?php include '../../includes/admin_footer.php'; ?>