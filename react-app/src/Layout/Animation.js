import React, { Fragment, useEffect } from "react";
import $ from "jquery";

const Animation = () => {
  useEffect(() => {
    $("#book-now").click(function() {
      $("html, body").animate(
        {
          scrollTop: $("#ride-container").offset().top - 100
        },
        2000
      );
    });

    $("#book-now-1").click(function() {
      $("html, body").animate(
        {
          scrollTop: $("#ride-container").offset().top - 100
        },
        2000
      );
    });

    $('.nav-menu-icon').on('click', function(e) {
      $(this).toggleClass('active');
      $('.wheel-navigation').toggleClass('active');
      $('html').toggleClass('overflow-html');


  });

  });
  return <Fragment />;
};

export default Animation;
