<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Hyper
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-md-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>
<!-- content-page -->

</div> <!-- end wrapper-->
</div>
<!-- END Container -->
<!-- bundle -->
<script src="../assets/js/vendor.min.js"></script>
<script src="../assets/js/app.min.js"></script>

<!-- third party js -->
<script src="../assets/js/vendor/apexcharts.min.js"></script>
<script src="../assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<script src="../assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="../assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="../assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="../assets/js/vendor/responsive.bootstrap5.min.js"></script>
<script src="../assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="../assets/js/vendor/buttons.bootstrap5.min.js"></script>
<script src="../assets/js/vendor/buttons.html5.min.js"></script>
<script src="../assets/js/vendor/buttons.flash.min.js"></script>
<script src="../assets/js/vendor/buttons.print.min.js"></script>
<script src="../assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="../assets/js/vendor/dataTables.select.min.js"></script>
<script src="../assets/js/pages/demo.dashboard.js"></script>
<script src="../assets/js/pages/demo.datatable-init.js"></script>


<script src="../assets/js/charts.js"></script>

<!-- end demo js-->
<script>
    var user = document.getElementById('viewUser')
    user.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-id')
        var name = button.getAttribute('data-bs-name')
        var username = button.getAttribute('data-bs-username')
        var dob = button.getAttribute('data-bs-dob')
        var age = button.getAttribute('data-bs-age')
        var phone = button.getAttribute('data-bs-phone')
        var gender = button.getAttribute('data-bs-gender')
        var modal = $(this)
        modal.find('.name').text(name)
        modal.find('.username').text(username)
        modal.find('.phone').text(phone)
        modal.find('.dob').text(dob)
        modal.find('.id').text(id)
        modal.find('.age').text(age)
        modal.find('.gender').text(gender)
    })
</script>
<script>
    var course = document.getElementById('viewCourse')
    course.addEventListener('show.bs.modal', function(event) {
        var but = event.relatedTarget
        var desc = but.getAttribute('data-bs-desc')
        var mo = $(this)
        mo.find('.desc').text(desc)
    })
</script>
</body>

</html>