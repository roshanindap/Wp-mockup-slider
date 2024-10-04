<?php
if (!empty($id)) {
    $grid_project = new WP_Query(array(
        'order' => 'ASC',
		//'orderby'  => 'meta_value',
		//'meta_key'  => 'testimonial_order_no',
        'p' => $id,
        'post_type' => 'project',
        'post_status' => null,
        'posts_per_page' => 1));
} else {
    $grid_project = new WP_Query(array(
        'order' => 'ASC',
		//'orderby'  => 'meta_value',
		//'meta_key'  => 'testimonial_order_no',
        'post_type' => 'project',
        'post_status' => null,
        'nopaging' => 1,
        'posts_per_page' => -10));
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.css">



<div class="mockups">




<div class="css-mb with-glare">
  <div class="mb-display-position">
    <div class="mb-display">
      <div class="mb-screen-position">
        <div class="mb-screen">
           <section id="mockup-slider" class="owl-carousel">

<?php
if(count (array($grid_project->have_posts())) > 0){
$i = 1;


while ($grid_project->have_posts()) {
	$grid_project->the_post();
	$theimage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
	$imageUrl = $theimage[0];
	$custom = get_post_custom(get_the_ID());

?>



  <div class="project-img"><img src="<?php echo $imageUrl; ?>" alt="" /></div>


	  
	  


<?php $i++;
        \wp_reset_postdata();   
}
}?>
  </section>
        </div>
      </div>
    </div>
  </div>
  <div class="mb-body"></div>
  <div class="mb-bottom-cover"></div>
</div>

<!-- <div class="controls">
  <a href="javascript:void(0);" class="prev">Prev</a>
  <a href="javascript:void(0);" class="next">Next</a>
</div> -->

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

<script> 
jQuery(document).ready(function($){
 
  var mockupSlider = $("#mockup-slider");
  var mockupSliderTitles = $("#mockup-slider-titles");
 
  mockupSlider.owlCarousel({
      singleItem:true,
      autoPlay: true,
      navigation: false,
      pagination: false,
      mouseDrag: true,
      touchDrag: true
  });
 
  mockupSliderTitles.owlCarousel({
      singleItem:true,
      autoPlay: false,
      navigation: false,
      pagination: false,
      mouseDrag: false,
      touchDrag: false
  });
  
//   $(".next").click(function(){
//     mockupSlider.trigger('owl.next');
//     mockupSliderTitles.trigger('owl.next');
//   });
//   $(".prev").click(function(){
//     mockupSlider.trigger('owl.prev');
//     mockupSliderTitles.trigger('owl.prev');
//   });
 
});
</script>


<style>

.mockups {
  margin: 0;
  padding: 5vw;
}

.owl-carousel {
  
  a {
    background-size: cover;
    display: block;
  }
  
  .owl-controls {
    display: none;
  }
  
}

#mockup-slider-titles {
  
  h1 {
    font-family: sans-serif;
    text-align: center;
    color: #fff;
    font-size: 2.5em;
    margin-top: 0;
  }
}

.controls {
  text-align: center;
  padding: 2em;
  
  a {
    color: #fff;
    background-color: #ccc;
    text-decoration: none;
    font-family: sans-serif;
    padding: .5em 1em;
    display: inline-block;
    border: 2px solid #ccc;
    border-radius: 500px;
    transition: .2s ease-in-out all;
    
    &:hover {
      background-color: #16A085;
      color: #fff;
      border-color: #fff;
    }
    
  }
}

/* CODE BY HENRI PEETSMANN */

.css-mb {
  max-width: 1200px; /* Set the desired maximum width of the macbook */
  min-width: 50px; /* Set the desired minimum width of the macbook */
  margin: 0 auto; /* Align mockup to center */
}

.css-mb div {
  box-sizing: border-box !important; /* Just in case */
}

/* Center the display */
.css-mb .mb-display-position {
  width: 80%;
  margin: 0 auto;
}

/* The display */
.css-mb .mb-display {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 65.9442%;
  background: #373435;
  
  -webkit-border-top-left-radius:  3.5% 5.3075%;
      -moz-border-radius-topleft:  3.5% 5.3075%;
          border-top-left-radius:  3.5% 5.3075%;
  
  -webkit-border-top-right-radius: 3.5% 5.3075%;
      -moz-border-radius-toptight: 3.5% 5.3075%;
          border-top-right-radius: 3.5% 5.3075%;
}

/* Webcam */
/* Browser may not render a perfect circle */
.css-mb .mb-display:before {
  content: '';
  display: block;
  position: absolute;
  top: 3%;
  left: 50%;
  width: 1%;
  height: 1.5164%;
  margin-left: -0.5%;
  border-radius: 50%;
  background: #525252;
}

/* Glare */
/* Browser may not render the top and right offset evenly */
.css-mb .mb-display:after {
  content: '';
  display: none;
  position: absolute;
  right: 0.4%;
  top: 0.64%; 
  width: 62.5%;
  height: 100%;
  
  background: none; /* Hide the gradient on older browsers */
  background:    -moz-linear-gradient(55deg, rgba(0,0,0,0) 61%, rgba(255,255,255,0.05) 61%); /* FF3.6+ */
  background: -webkit-linear-gradient(36deg, rgba(0,0,0,0) 61%, rgba(255,255,255,0.05) 61%); /* Chrome10+ and Safari5.1+ compute the degree differently */
  background:      -o-linear-gradient(55deg, rgba(0,0,0,0) 61%, rgba(255,255,255,0.05) 61%); /* Opera 11.10+ */
  background:     -ms-linear-gradient(55deg, rgba(0,0,0,0) 61%, rgba(255,255,255,0.05) 61%); /* IE10+ */
  background:         linear-gradient(55deg, rgba(0,0,0,0) 61%, rgba(255,255,255,0.05) 61%);
  
  -webkit-border-top-right-radius: 5.3075%;
      -moz-border-radius-toptight: 5.3075%;
          border-top-right-radius: 5.3075%;
}

/* Only show glare, if the class is applied */
.css-mb.with-glare .mb-display:after { display: block; }

/* Position the screen and give make it the right size, ratio 16:10 */
.css-mb .mb-screen-position {
  position: absolute;
  top: 6.5%;
  width: 93.2%;
  left: 3.4%;
  height: 0;
  margin: 0;
  padding-bottom: 58.25%; /* Ratio */
}

/* Give parent (this element) a "height", so that child elements can use height: 100%;*/
.css-mb .mb-screen {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
  background: #fff; /* bg color if content is not big enough, or rendering is off */
}

/* Image on the screen */
.css-mb .mb-screen img {
  max-width: 100%;
  height: auto;
}

/* Iframe on the screen */
.css-mb .mb-screen iframe {
  width: 100%;
  height: 100%;
  border: 0;
}

/* Macbook body */
.css-mb .mb-body {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 2.3%;
  background: #e6e7e8;
}

/* The groove */
.css-mb .mb-body:before {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 50%;
  width: 14.0740%;
  height: 0;
  padding-bottom: 1.4814%;
  margin-left: -7.037%;
  background: #a9abae;
  
  -webkit-border-bottom-left-radius:  7.0370% 50%;
      -moz-border-radius-bottomleft:  7.0370% 50%;
          border-bottom-left-radius:  7.0370% 50%;
  
  -webkit-border-bottom-right-radius: 7.0370% 50%;
      -moz-border-radius-bottomtight: 7.0370% 50%;
          border-bottom-right-radius: 7.0370% 50%;  
}

/* Macbook bottom */
.css-mb .mb-bottom-cover {
  width: 100%;
  height: 0;
  padding-bottom: 0.7407%;
  background: #a9abae;
  
  -webkit-border-bottom-left-radius:  12% 600%;
      -moz-border-radius-bottomleft:  12% 600%;
          border-bottom-left-radius:  12% 600%;
  
  -webkit-border-bottom-right-radius: 12% 600%;
      -moz-border-radius-bottomtight: 12% 600%;
          border-bottom-right-radius: 12% 600%; 
}
</style>
