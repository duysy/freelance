<script type="text/javascript">
    document.title = "Trang chủ";
</script>
<div class="col-md-7" id="slide-image">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" >
                <div class="hidden_img">
                    <img src="<?php echo $data['linkanh'][0][2] ?>" class="d-block w-100">
                </div>

            </div>
            <div class="carousel-item">
                <div class="hidden_img">
                    <img src="<?php echo $data['linkanh'][1][2] ?>" class="d-block w-100">
                </div>
            </div>
            <div class="carousel-item">
                <div class="hidden_img">
                    <img src="<?php echo $data['linkanh'][2][2] ?>" class="d-block w-100">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>