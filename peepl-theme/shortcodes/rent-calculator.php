<?php

function rent_calculator_shortcode(){
    wp_enqueue_script(
        'calculator-js',
        get_theme_file_uri('/assets/js/rent-calculator.js'),
        array('jquery'),
        '0.0.1'
    );

    ob_start(); ?>

<div class="rent-calculator my-4 my-md-5 js-rent-calculator">
  <div class="rent-calculator__result">
    <h2>You’d already have £<span class="js-kitty"></span> in your kitty</h2>
    <p>If you’d been roosting instead of renting since <span class="js-since-date"></span>.</p>
    <button class="js-edit-calculation">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
      </svg>
      Edit
    </button>
  </div>
  <div class="rent-calculator__cta">
    <p>How would Roost work for you?</p>
    <h2>Try our rent calculator</h2>
  </div>
  <form class="rent-calculator__form js-rent-calculator-form">
    <div class="form-group"> <label for="rent">Your monthly rent</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">£</div>
        </div> <input type="text" inputmode="numeric" pattern="[0-9]*" required class="form-control" id="rent">
        <div class="input-group-append">
          <div class="input-group-text">/mth</div>
        </div>
      </div>
    </div>
    <div class="form-group"> <label for="months">How long have you been paying?</label>
      <div class="input-group"> <input type="text" inputmode="numeric" pattern="[0-9]*" required class="form-control"
          id="months">
        <div class="input-group-append">
          <div class="input-group-text">months</div>
        </div>
      </div>
    </div> <button type="submit" class="btn btn-primary btn-block js-calculate-kitty">Calculate my kitty</button>
  </form>
</div>

    <?php return ob_get_clean();
}

add_shortcode('rent-calculator', 'rent_calculator_shortcode');
