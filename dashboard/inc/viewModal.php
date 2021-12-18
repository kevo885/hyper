<!-- View user info -->
<div id="viewUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">View user info</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-4 col-xl-10 ">
                        <div class="text-center">

                            <button class="btn btn-lg btn-white rounded-circle border-light">
                                <span class="fas fa-user"></span></button>
                            <h4 class="mb-0 mt-2 name"></h4>
                            <p class="text-muted font-14"></p>
                            <div class="text-start mt-3">
                                <h4 class="font-13 text-uppercase">About</h4>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <p class="text-muted mb-2 font-13"><strong>ID :</strong> <span class="id"></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Username :</strong> <span class="username"></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong> <span class="phone"></span></p>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <p class="text-muted mb-2 font-13"><strong>Birthday :</strong> <span class="dob"></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Age :</strong> <span class="age"></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Gender :</strong> <span class="gender"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View course-->
    <div id="viewCourse" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">View course</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-xl-10 ">
                            <div class="text-center">
                                <div class="text-start mt-3">
                                    <h4 class="font-13">Course descrption</h4>
                                    <p class='desc'></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>