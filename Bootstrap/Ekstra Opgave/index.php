<?php 
    //setting the title
    $title = "Wisdom Pet Medicine"
    
    //bringing the header
    include "./php/header.php"
    
    //the main content starts now
    ?>
    <section id="mission">
      <article>
        <h1>Our Commitment <small>to you</small></h1>
        <p>Wisdom Pet Medicine strives to blend the best in traditional and <em>alternative medicine</em> in the
          <strong>diagnosis and treatment</strong> of companion animals including dogs, cats, birds, reptiles, rodents,
          and fish. We apply the wisdom garnered in the <mark>centuries old tradition</mark> of veterinary medicine, to
          find the safest treatments and&nbsp;cures.
        </p>
        <p>We strive to be your pet's medical <del>staff</del> experts from youth through the senior years. <small
            class="fs-6">We
            build preventative health care plans for each and every one of our patients, based on breed, age, and sex,
            so
            that your pet receives the most appropriate care at crucial milestones.</small> We want to give your pet a
          long and healthy life.</p>
      </article>
    </section>

    <section id="services">
      <div class="row row-cols-md-3">
        <article class="col card border-0">
          <img class="icon-imgs" src="./images/icon-exoticpets.svg" alt="exotic pet icon">
          <div class="card-body">
            <h2 class="card-title text-center">Exotic Pets</h2>
          <p>We offer specialized care for <strong>reptiles, rodents, birds</strong>, and other <em>exotic</em> pets.
          </p>
          </div>
        </article>

        <article class="col card border-0">
          <img class="icon-imgs" src="./images/icon-grooming.svg" alt="grooming icon">
          <div class="card-body">
            <h2 class="card-title text-center">Grooming</h2>
          <p>Our therapeutic grooming treatments help battle fleas, allergic dermatitis, and other challenging skin
            conditions.</p>
            </div>
        </article>

        <article class="col card border-0">
          <img class="icon-imgs" src="./images/icon-health.svg" alt="general health icon">
          <div class="card-body">
            <h2 class="card-title text-center">General Health</h2>
          <p>Wellness and senior exams, ultrasound, x-ray, and dental cleanings are just a few of our general health
            services.</p>
          </div>
        </article>
      </div>

      <div class="row row-cols-md-3">
        <article class="card border-0">
          <img class="icon-imgs" src="./images/icon-nutrition.svg" alt="nutrition icon">
          <div class="card-body">
            <h2 class="card-title text-center">Nutrition</h2>
          <p>Let our nutrition experts review your pet's diet and prescribe a custom nutrition plan for optimum health
            and
            disease prevention.</p>
          </div>
        </article>

        <article class="col card border-0">
          <img class="icon-imgs" src="./images/icon-pestcontrol.svg" alt="pest control icon">
          <div class="card-body">
            <h2 class="card-title text-center">Pest Control</h2>
          <p>We offer the latest advances in safe and effective prevention and treatment of fleas, ticks, worms, heart
            worm,
            and other parasites.</p>
            </div>
        </article>

        <article class="col card border-0">
          <img class="icon-imgs" src="./images/icon-vaccinations.svg" alt="vaccination icon">
          <div class="card-body">
            <h2 class="card-title text-center">Vaccinations</h2>
          <p>Our veterinarians are experienced in modern vaccination protocols that prevent many of the deadliest
            diseases
            in pets.</p>
            </div>
        </article>
      </div>


      <!-- <article>
        <p>This paragraph and the following can be deleted after seing how the different bootstrap styled headlines
          look:
        </p>
        <h3>Headline 3</h3>
        <h4>Headline 4</h4>
        <h5>Headline 5</h5>
        <h6>Headline 6</h6>
      </article> -->
    </section>

    <section>
      <article>
        <h2>Testimonials</h2>

        <blockquote>
          When Samantha, our Siamese cat, began sleeping all the time and urinating excessively, we brought her to see
          the
          specialists at Wisdom. Now, two years later, Samantha is still free from any complications of diabetes, and
          her
          blood sugar regularly tests normal. <br>
          <small class="by"> The McPhersons </small>
        </blockquote>

        <a href="testimonials.html"><button class="btn btn-primary">Read more testimonials from our customers</button></a>

      </article>
    </section>


    <?php 
    include "./php/footer.php"
