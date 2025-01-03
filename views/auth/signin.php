<?php
include '../../includes/header.php';
?>

<!-- Login Form -->
<main>
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 p-4 shadow rounded bg-white">
                <form method="POST" action="">
                    <div class="text-center mb-4">
                        <img class="mb-3 img-fluid" src="https://visitaiglesia.net/wp-content/uploads/2019/04/11.jpg" alt="Logo" width="100" height="100">
                        <h1 class="h3">Please sign in</h1>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control shadow" name="email" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control shadow" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2 mb-3" type="submit">Sign in</button>
                    <p class="text-center">No account? <a href="">Click here!</a></p>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
include '../../includes/footer.php';
?>

