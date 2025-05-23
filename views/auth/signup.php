<?php
include '../../includes/header.php';
?>

<!-- Register -->
<main class="mt-4">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 p-4  rounded bg-white">
                <form onSubmit="event.preventDefault(); registerUser();" method="POST" action="">
                    <div class="mb-4">
                        <img class="mb-3 img-fluid" src="https://visitaiglesia.net/wp-content/uploads/2019/04/11.jpg"
                            alt="Logo" width="100" height="100">
                        <h1 class="h3">Register</h1>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow" name="firstname" id="firstname"
                            placeholder="First Name" value="">
                        <label for="firstname">First Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow" name="lastname" id="lastname"
                            placeholder="Last Name" value="">
                        <label for="lastname">Last Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow" name="kcfapicode" id="kcfapicode"
                            placeholder="KCFAPI Code" value="">
                        <label for="kcfapicode">KCFAPI Code</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control shadow" name="email" id="email"
                            placeholder="name@example.com" value="">
                        <label for="email">Email Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow" name="phone_number" id="phone_number"
                            placeholder="Phone Number" value="">
                        <label for="phone_number">Phone Number</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select shadow" name="role" id="role">
                            <option value="" disabled>Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="unit-manager">Unit Manager</option>
                            <option value="fraternal-counselor">Fraternal Counselor</option>
                            <option value="family-member">Family Member</option>
                        </select>
                        <label for="role">Role</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control shadow" name="password" id="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control shadow" name="password_confirmation"
                            id="password_confirmation" placeholder="Confirm Password">
                        <label for="password_confirmation">Confirm Password</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2 mb-3" type="submit">Register</button>
                    <p class="text-center">Already have an account? <a href="<?php echo BASE_URL; ?>views/auth/signin.php">Sign in</a></p>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    const BASE_URL = "<?php echo BASE_URL; ?>"; 
    function registerUser() {
        const data = {
            firstname: document.getElementById('firstname').value,
            lastname: document.getElementById('lastname').value,
            kcfapicode: document.getElementById('kcfapicode').value,
            email: document.getElementById('email').value,
            phone_number: document.getElementById('phone_number').value,
            role: document.getElementById('role').value,
            password: document.getElementById('password').value,
            password_confirmation: document.getElementById('password_confirmation').value,
        };

        axios.post(`${BASE_URL}/api/authApiController.php?action=register`, data)
        .then(response => {
            if (response.data.success) {
                console.log(response.data);
                Swal.fire('Success', response.data.message, 'success')
                .then(() => {
                    setTimeout(() => {
                        window.location.href = `${BASE_URL}/views/auth/signin.php`; 
                    }, 1000);
                });
            } else {
                console.log(response.data);
                Swal.fire('Error', response.data.message, 'error');
            }
        })
        .catch(error => {
            console.error(error);
            console.log(response.data);
            const errorMessage = error.response ? error.response.data.message : 'An unexpected error occurred!';
            Swal.fire('Error', errorMessage, 'error');
        });
    }
    
</script>

<?php
include '../../includes/footer.php';
?>
