<style>/* Slideshow container */
.who-we-are {
  box-shadow: 4px 4px 30px 6px rgba(0, 0, 0, 0.05);
}
.who-we-are-container {
  position: relative;
  background: #f1f1f1f1;
  overflow: hidden;
}

/* Slides */
.who-we-are-slides {
  display: none;
  padding: 80px;
  text-align: center
  min-height: 400px;
  transition: transform 0.5s ease-in-out;
}
.who-we-are-slides h3 {
  font-weight: 700;
  margin-bottom: 20px;
  color: #C51F2B;
}
.who-we-are-slides p {
  font-size: 14px;
}
.active-slide {
   transition: transform 0.5s ease-in-out;
    display: flex !important;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
    flex-direction: column;
}

/* next-nav & prev-navious buttons */
.prev-nav, .next-nav {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  text-decoration: none;
}

.prev-nav {
    left: 0;
}

/* Position the "next-nav button" to the right */
.next-nav {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev-nav:hover, .next-nav:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot-nav/bullet/indicator container */
.dot-nav-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dot-navs/bullets/indicators */
.dot-nav {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot-nav/circle */
.dot-nav.active, .dot-nav:hover {
  background-color: #717171;
}
</style>
</head>
<body>

<div class="who-we-are-container">

<div class="who-we-are-slides">
  <h3>Mission</h3>
  <p>To purposively link quality education, training, and research with community service in pursuing the holistic development of individuals through innovative programs and productive activities attuned to the needs of the global community.</p>
</div>

<div class="who-we-are-slides">
  <h3>Vision</h3>
  <p>A community of dynamic and proactive scholars and learners within the Asia-Pacific region upholding the high standards of excellence in education, research, and community service, towards the attainment of a better quality of life.</p>
</div>

<div class="who-we-are-slides">
  <h3>Goals</h3>
  <p>St.Dominic College of Asia aims to:
    <ol>
      <li>Prepare the students to become competent, productive and socially responsible professional.</li>
      <li>Actively promote research and the utilization of new technology for the enhancement of individual competencies.</li>
      <li>Assume leadership role in addressing the concerns of the academic community towards improving their quality of life.</li>
    </ol>
  </p>
</div>

<div class="who-we-are-slides">
  <h3>Core Values</h3>
  <p>St. Dominic College of Asia performs its various roles toward the achievement of its Vision-Mission-Goals as it anchors itself on a four-point set of core values:</p>
  <p>S - Service</p>
  <p>D - Dynamism</p>
  <p>C - Competence</p>
  <p>A - Accountability</p>
</div>

<div class="who-we-are-slides">
  <h3>Quality Policy</h3>
  <p>St. Dominic College of Asia commits to providing excellent academic and support services that exceed the expectations of all stakeholders as the College continuously develops and sustains the effectiveness of its quality management system.</p>
</div>

<div class="who-we-are-slides">
  <h3>Quality Objectives</h3>
  <p>
    <ol>
      <li>To achieve excellence in academic programs and projects guided by the College Vision - Mission, and in compliance with CHED, DepEd, and TESDA requirements as well as those standards observed by duly accredited educational institutions.</li>
      <li>To establish, implement and maintain effective and efficient quality management system.</li>
      <li>To assume leadership role in improving the quality of life of the people by engaging SDCA stakeholders in meaningful community services.</li>
      <li>To focus on its task of revolutionizing education by instilling creativity and innovation among the faculty members, students, and administrative staff working collaboratively in enhancing the culture of research in the College.</li>
      <li>To identify, nurture and enhance human, physical and financial resources for productivity and sustainability.</li>
    </ol>
</p>
</div>

<a class="prev-nav" onclick="plusSlides(-1)">❮</a>
<a class="next-nav" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-nav-container">
  <span class="dot-nav" onclick="currentSlide(1)"></span> 
  <span class="dot-nav" onclick="currentSlide(2)"></span> 
  <span class="dot-nav" onclick="currentSlide(3)"></span> 
  <span class="dot-nav" onclick="currentSlide(4)"></span>
  <span class="dot-nav" onclick="currentSlide(5)"></span> 
  <span class="dot-nav" onclick="currentSlide(6)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var $slides = $(".who-we-are-slides");
  var $dotNavs = $(".dot-nav");
  
  if (n > $slides.length) { slideIndex = 1; }
  if (n < 1) { slideIndex = $slides.length; }

  $slides.hide().removeClass("active-slide");// Hide all slides
  $dotNavs.removeClass("active"); // Remove active class from all dot navs
 

  $slides.eq(slideIndex - 1).show(); // Show the current slide
  $slides.eq(slideIndex - 1).addClass("active-slide");
  $dotNavs.eq(slideIndex - 1).addClass("active"); // Add active class to the current dot nav
}
</script>