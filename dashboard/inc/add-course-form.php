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
    <label lass="form-label"> Course Name</label>
    <input class="form-control" type="text" id="course_name" name='course_name' required placeholder="Enter course name">
</div>

<div class="mb-3">
    <label class="form-label">Course Number</label>
    <input class="form-control" type="text" id="number" name='number' required placeholder="Enter course number">
</div>

<div class="mb-3">
    <label class="form-label">Descrption</label>
    <input class="form-control" type="text" required id="desc" name='desc' placeholder="Enter course descrption">
</div>

<div class="mb-3">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="enrolled" name='enrolled'>
        <label class="form-check-label" for="customCheck1">Enrolled</label>
    </div>
</div>

<div class="mb-3 text-center">
    <button class="btn btn-primary" type="submit" name='addCourse'>Add course</button>
</div>                </form>
            </div>
        </div>
    </div>