<div id="add-course-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">Course info</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <!-- Form -->
                <form action="crud/add.php" method="post" class="mt-4">

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name='courseName' placeholder="Course name" required>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" name='subject' placeholder="Course subject" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label">Course number</label>
                            <input type="text" class="form-control" name='courseNumber' placeholder="Course number" data-toggle="input-mask" data-mask-format="0000" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrption</label>
                        <textarea class="form-control" placeholder="Enter course descrption" name="desc" style="height: 100px;" maxlength="225" data-toggle="maxlength" data-threshold="150" required></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Available seats</label>
                            <input type="text" class="form-control" name='avaliable' required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Credit hours</label>
                            <select name='credit' class="form-select" required>
                                <option selected disabled hidden style='display: none' value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label class="form-label">Campus</label>
                            <select name='campus' class="form-select" required>
                                <option selected disabled hidden style='display: none' value=""></option>
                                <option value="Main Campus">Main campus</option>
                                <option value="online">Online</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary rounded-pill" type="submit" name='addCourse'>Add course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>