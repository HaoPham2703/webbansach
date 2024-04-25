<!-- Back to top button -->
<button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top" style="position: fixed;
bottom: 20px;
right: 20px;
display: none;">
    <i class="fas fa-arrow-up"></i>
</button>


<script>
    // JavaScript code for showing/hiding the back-to-top button
    window.addEventListener('scroll', function() {
        var button = document.getElementById('btn-back-to-top');
        if (window.pageYOffset > 100) {
            button.style.display = 'block';
        } else {
            button.style.display = 'none';
        }
    });
    // JavaScript code for scrolling to the top when the back-to-top button is clicked
    document.getElementById('btn-back-to-top').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Enable smooth scroll behavior
        });
    });
</script>