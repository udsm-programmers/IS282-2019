<section class="footer-section">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    echo "<p>
                            Copyright &copy; 
                            <span id=\"dYear\"></span> - Online Library Management System (<b>LIBSYS</b>) | <a href=\"#\" target=\"_blank\" > Designed by : GordonNchy.</a>
                        </p>
                        "
                ?>  
            </div>
        </div>
<script>
    let date = new Date();
    let dYear = document.querySelector('#dYear');
    dYear.innerText = date.getFullYear();
</script>
</section>