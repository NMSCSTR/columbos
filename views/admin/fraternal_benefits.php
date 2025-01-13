<?php include '../../includes/admin_header.php'; ?>
<title>Fraternal Benifits</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<!-- Page Content -->

<div class="container-fluid">
    <div class="d-flex justify-content-start">
        <button class="btn btn-success mb-3 shadow" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <i class="fas fa-plus"></i> Add Savings Plan
        </button>
    </div>
    <div class="card p-3 shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <div class="card shadow">
                        <img src="<?php echo BASE_URL ?>resources/plans/1.GemPlan.png" class="card-img-top image-fluid"
                            height="800" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Gem plans</h5>
                            <p class="card-text">The KC Gem Savings Series Plans are
                                endowment participating benefit
                                certificate plans that provide cash
                                benefits and level life insurance
                                protection benefits.
                            </p>
                            <a href="#" class="btn btn-primary">More details</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card shadow">
                        <img src="<?php echo BASE_URL ?>resources/plans/2.DiamondPlan.png"
                            class="card-img-top image-fluid" height="800" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Diamond plans</h5>
                            <p class="card-text">The Guaranteed Insurance Offer (GIO)
                                Avenger provides the assured a
                                guaranteed family benefit protection
                                before the contract's maturity date and a
                                guaranteed lump sum payouts, if living
                                are paid on specified date on or before
                                the maturity date

                            </p>
                            <a href="#" class="btn btn-primary">More details</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card shadow">
                        <img src="<?php echo BASE_URL ?>resources/plans/3.GioAvenger.png"
                            class="card-img-top image-fluid" height="800" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Geo Avenger</h5>
                            <p class="card-text">The Guaranteed Insurance Offer (GIO)
                                Crusader provides the assured a
                                guaranteed death benefit protection
                                before the contract's maturity date and a
                                guaranteed lump sum, if living, is paid on
                                the maturity date

                            </p>
                            <a href="#" class="btn btn-primary">More details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /#page-content-wrapper -->


<?php include '../../includes/admin_footer.php'; ?>