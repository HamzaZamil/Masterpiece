(function ($) {
  "use strict";

  /*------------- preloader js --------------*/
  var percentage = 0;
  var LoadingCounter = setInterval(function () {
    if (percentage <= 100) {
      // $('#loading-screen ').css('opacity', (100 - percentage));
      $("#loading-screen .loading-counter").text(percentage + "%");
      $("#loading-screen .bar").css("width", (100 - percentage) / 2 + "%");
      $("#loading-screen .progress-line").css(
        "transform",
        "scale(" + percentage / 100 + ")"
      );
      percentage++;
    } else {
      $("#loading-screen").fadeOut(300);
      setTimeout(() => {
        $("#loading-screen").remove();
      }, 300);
      clearInterval(LoadingCounter);
    }
  }, 10);

  //Header Search
  if ($(".search-box-outer").length) {
    $(".search-box-outer").on("click", function () {
      $("body").addClass("search-active");
    });
    $(".close-search").on("click", function () {
      $("body").removeClass("search-active");
    });
  }

  // Mobile Menu
  $(".mobile-menu nav").meanmenu({
    meanScreenWidth: "991",
    meanMenuContainer: ".mobile-menu",
    meanMenuOpen: "<span></span> <span></span> <span></span>",
    onePage: false,
  });

  // sticky
  let wind = $(window);
  let sticky = $("#header-sticky");
  wind.on("scroll", function () {
    let scroll = wind.scrollTop();
    if (scroll < 100) {
      sticky.removeClass("sticky");
    } else {
      sticky.addClass("sticky");
    }
  });

  // menu button - start
  $(document).ready(function () {
    $(".close_btn, .cart_sidebar_overlay").on("click", function () {
      $(".cart_sidebar").removeClass("active");
      $(".cart_sidebar_overlay").removeClass("active");
    });

    $(".cart_btn").on("click", function () {
      $(".cart_sidebar").addClass("active");
      $(".cart_sidebar_overlay").addClass("active");
    });

    $(".cart_item .remove_btn").on("click", function () {
      $(this).closest(".cart_item").toggleClass("remove");
    });
  });

  // menu button - start
  $(document).ready(function () {
    $(".close_btn, .white_sidebar_overlay").on("click", function () {
      $(".white_sidebar").removeClass("active");
      $(".white_sidebar_overlay").removeClass("active");
    });

    $(".white_btn").on("click", function () {
      $(".white_sidebar").addClass("active");
      $(".white_sidebar_overlay").addClass("active");
    });

    $(".white_item .remove_btn").on("click", function () {
      $(this).closest(".white_item").toggleClass("remove");
    });
  });

  // Button hover

  $(function () {
    $(".cat-shop-btn a , .cat-shop-btn button")
      .on("mouseenter", function (e) {
        let parentOffset = $(this).offset(),
          relX = e.pageX - parentOffset.left,
          relY = e.pageY - parentOffset.top;
        $(this).find("span").css({
          top: relY,
          left: relX,
        });
      })
      .on("mouseout", function (e) {
        let parentOffset = $(this).offset(),
          relX = e.pageX - parentOffset.left,
          relY = e.pageY - parentOffset.top;
        $(this).find("span").css({
          top: relY,
          left: relX,
        });
      });
  });

  // Sidebar
  ("use strict");
  jQuery(document).ready(function (o) {
    0 < o(".offset-side-bar").length &&
      o(".offset-side-bar").on("click", function (e) {
        e.preventDefault(),
          e.stopPropagation(),
          o(".cart-group").addClass("isActive");
      }),
      0 < o(".close-side-widget").length &&
        o(".close-side-widget").on("click", function (e) {
          e.preventDefault(), o(".cart-group").removeClass("isActive");
        }),
      0 < o(".navSidebar-button").length &&
        o(".navSidebar-button").on("click", function (e) {
          e.preventDefault(),
            e.stopPropagation(),
            o(".info-group").addClass("isActive");
        }),
      0 < o(".close-side-widget").length &&
        o(".close-side-widget").on("click", function (e) {
          e.preventDefault(), o(".info-group").removeClass("isActive");
        }),
      o("body").on("click", function (e) {
        o(".info-group").removeClass("isActive"),
          o(".cart-group").removeClass("isActive");
      }),
      o(".xs-sidebar-widget").on("click", function (e) {
        e.stopPropagation();
      }),
      0 < o(".xs-modal-popup").length &&
        o(".xs-modal-popup").magnificPopup({
          type: "inline",
          fixedContentPos: !2,
          fixedBgPos: !0,
          overflowY: "auto",
          closeBtnInside: !2,
          callbacks: {
            beforeOpen: function () {
              this.st.mainClass = "my-mfp-slide-bottom xs-promo-popup";
            },
          },
        });
  });

  //mouse active

  $(document).ready(function () {
    $(
      ".category-single-box , .category-item , .collection-single-box , .latest-news-single-box , .process-single-box , .rely-single-box , .pricing-single-box , .service-sidebar-single-services li , .team-inner-single-box"
    ).on("mouseenter", function () {
      $(this).addClass("active").siblings().removeClass("active");
    });

    $(
      ".category-single-box , .category-item , .collection-single-box , .latest-news-single-box , .process-single-box , .rely-single-box , .pricing-single-box , .service-sidebar-single-services li , .team-inner-single-box"
    ).on("mouseenter", function () {
      $(this).addClass("active");
      $(this)
        .parent()
        .siblings()
        .find(
          ".category-single-box , .category-item , .collection-single-box , .latest-news-single-box , .process-single-box , .rely-single-box , .pricing-single-box , .service-sidebar-single-services li , .team-inner-single-box"
        )
        .removeClass("active");
    });
  });

  //Banner Slider
  $(document).ready(function () {
    $(".banner-slider").slick({
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5000,
      animation: true,
      speed: 1000,
      fade: true,
      arrows: true,
      prevArrow:
        '<span class="slick-prev"><i class="bi bi-chevron-right"></i></span>',
      nextArrow:
        '<span class="slick-next"><i class="bi bi-chevron-left"></i></span>',
      cssEase: "ease",
    });
  });

  //Testimoial Slider
  $(document).ready(function () {
    $(".testimonial-slider").slick({
      dots: true,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5000,
      animation: true,
      speed: 1000,
      fade: true,
      arrows: false,
      cssEase: "ease",
    });
  });

  //Quick Slider
  $(document).ready(function () {
    $(".quick-slider").slick({
      slidesToShow: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToScroll: 1,
      arrows: true,
      prevArrow:
        '<span class="slick-prev"><i class="bi bi-chevron-right"></i></span>',
      nextArrow:
        '<span class="slick-next"><i class="bi bi-chevron-left"></i></span>',
      fade: true,
      cssEase: "ease",
      asNavFor: ".quick-slider-btn",
    });
  });
  $(document).ready(function () {
    $(".quick-slider-btn").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      autoplay: true,
      asNavFor: ".quick-slider",
      dots: false,
      centerMode: true,
      arrows: false,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 900,
          settings: {
            arrows: false,
            slidesToShow: 3,
            centerMode: true,
          },
        },
        {
          breakpoint: 700,
          settings: {
            arrows: false,
            slidesToShow: 3,
            centerMode: false,
          },
        },
        {
          breakpoint: 350,
          settings: {
            arrows: false,
            slidesToShow: 1,
            centerMode: false,
          },
        },
      ],
    });
  });

  //Brand One Slider
  $(document).ready(function () {
    $(".brand-slider").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 1300,
      arrows: false,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            arrows: false,
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 600,
          settings: {
            arrows: false,
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            slidesToShow: 1,
          },
        },
      ],
    });
  });

  //Brand Two Slider
  $(document).ready(function () {
    $(".brand-slider2").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 3000,
      cssEase: "linear",
      tabindex: 1,
      speed: 1300,
      arrows: false,
      responsive: [
        {
          breakpoint: 1300,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 1150,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 850,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  });

  /* Product Quantity & Shop Details Quantity*/
  const elements = document.querySelectorAll(
    ".product-quantity-count, .category-count-button, .qty-btn, .ctnbutton"
  );

  elements.forEach((element) => {
    element.addEventListener("click", function (e) {
      e.preventDefault();

      const btn = e.target; // Clicked button
      const box = btn.parentElement.querySelector(
        ".product-quantity-box, .cart-plus-minus-box"
      );

      if (btn.classList.contains("inc")) {
        box.value = Number(box.value) + 1;
      } else if (btn.classList.contains("dec") && Number(box.value) > 1) {
        box.value = Number(box.value) - 1;
      }
    });
  });

  /* Shopping Form Toggle */
  $(document).ready(function () {
    if ($("[data-toggle-shipping]").length) {
      const $shippingToggle = $("[data-toggle-shipping]"),
        $shippingToggleTarget = $($shippingToggle[0].dataset.toggleShipping),
        $shippingShowHide = function () {
          if ($shippingToggle[0].checked) {
            $shippingToggleTarget.slideDown();
          } else {
            $shippingToggleTarget.slideUp();
          }
        };
      $shippingShowHide();
      $shippingToggle.on("change", function () {
        $shippingShowHide();
      });
    }
  });

  /* Payment Method Toggle */
  $(document).ready(function () {
    if ($('input[type="radio"][name="payment-method"]').length) {
      const $paymentToggle = $('input[type="radio"][name="payment-method"]'),
        $paymentShowHide = function () {
          $paymentToggle.each(function () {
            const $this = $(this),
              $thisContent = $this.siblings("p");
            if ($this[0].checked) {
              $thisContent.slideDown();
              $this.parent().siblings().find("p").slideUp();
            }
          });
        };
      $paymentShowHide();
      $paymentToggle.on("change", function () {
        $paymentShowHide();
      });
    }
  });

  $(document).ready(function () {
    document.addEventListener("DOMContentLoaded", function () {
      // First set of inputs
      const set1 = setupInputs(
        ".quantity",
        ".price",
        ".total",
        "subtotal",
        "shopping",
        "total"
      );

      // Second set of inputs
      const set2 = setupInputs(
        ".quantity2",
        ".price2",
        ".total2",
        "subtotal2",
        "shopping2",
        "total2"
      );

      // Initial calculations for both sets
      set1.updateTotals();
      set2.updateTotals();

      function setupInputs(
        quantitySelector,
        priceSelector,
        totalSelector,
        subtotalId,
        shoppingId,
        totalId
      ) {
        const quantityInputs = document.querySelectorAll(quantitySelector);
        const priceElements = document.querySelectorAll(priceSelector);
        const totalElements = document.querySelectorAll(totalSelector);
        const subtotalElement = document.getElementById(subtotalId);
        const shoppingElement = document.getElementById(shoppingId);
        const totalCostElement = document.getElementById(totalId);

        quantityInputs.forEach((input) => {
          input.addEventListener("change", updateTotals);
          input.addEventListener("input", function () {
            this.classList.add("changed");
          });
          input.addEventListener("blur", function () {
            this.classList.remove("changed");
          });
        });

        function updateTotals() {
          let subtotal = 0;

          for (let i = 0; i < quantityInputs.length; i++) {
            const quantity = parseInt(quantityInputs[i].value);
            const price = parseFloat(
              priceElements[i].textContent.replace("$", "")
            );
            const total = quantity * price;

            totalElements[i].textContent = "$" + total.toFixed(2);
            subtotal += total;
          }

          const shopping = 5.0;
          const totalCost = subtotal + shopping;

          subtotalElement.textContent = "$" + subtotal.toFixed(2);
          shoppingElement.textContent = "$" + shopping.toFixed(2);
          totalCostElement.textContent = "$" + totalCost.toFixed(2);
        }

        return {
          quantityInputs,
          priceElements,
          totalElements,
          subtotalElement,
          shoppingElement,
          totalCostElement,
          updateTotals,
        };
      }
    });
  });

  $(document).ready(function () {
    document.addEventListener("DOMContentLoaded", function () {
      const alertJs = document.querySelector(".alert-js"),
        overlay = document.querySelector(".alert-overlay"),
        showalertBtn = document.querySelector(".show-alert"),
        closealertBtn = document.querySelector(".closebtn");

      showalertBtn.addEventListener("click", () =>
        alertJs.classList.add("active")
      );

      overlay.addEventListener("click", () =>
        alertJs.classList.remove("active")
      );

      closealertBtn.addEventListener("click", () =>
        alertJs.classList.remove("active")
      );
    });
  });

  // Mouse Move

  $(document).ready(function () {
    document.addEventListener("mousemove", parallax);

    function parallax(e) {
      this.querySelectorAll(".layer").forEach((layer) => {
        const speed = layer.getAttribute("data-speed");

        const x = (window.innerWidth - e.pageX * speed) / 75;
        const y = (window.innerHeight - e.pageY * speed) / 75;

        layer.style.transform = `translateX(${x}px) translateY(${y}px)`;
      });
    }
  });

  // Shop To Pop Up
  $(document).ready(function () {
    function handleConfirmation(message, callback) {
      showConfirm(message, function (result) {
        if (result) {
          console.log("You pressed Yes.");
        } else {
          console.log("You pressed No.");
        }
        if (callback) {
          callback(result);
        }
      });
    }

    $(".whiteListConfirm").on("click", function () {
      handleConfirmation("Do you want to add to white list ?", function (result) {});
    });

    $(".cartConfirm").on("click", function () {
      handleConfirmation("Do you want to add to Cart list ?", function (result) {
        if (result) {
          window.location.href = "cart.html";
        }
      });
    });
  });


  /*---------------------
	  WOW active js 
	  --------------------- */
  new WOW().init();

  // counterUp
  $(".counter").counterUp({
    delay: 5,
    time: 1500,
  });

  // Venubox

  $(".venobox").venobox({
    numeratio: true,

    infinigall: true,
  });

  /*--------------------------
	   scrollUp
	  ---------------------------- */
  $.scrollUp({
    scrollText: '<i class="fa fa-angle-up"></i>',
    easingType: "linear",
    scrollSpeed: 900,
    animation: "fade",
  });

  jQuery(document).ready(function ($) {
    "use strict";

    // =======< accordion js >========
    $(".accordion > li:eq(0) a").addClass("active").next().slideDown();
    $(".accordion a").on("click", function (j) {
      let dropDown = $(this).closest("li").find("p");

      $(this).closest(".accordion").find("p").not(dropDown).slideUp();

      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
      } else {
        $(this).closest(".accordion").find("a.active").removeClass("active");
        $(this).addClass("active");
      }

      dropDown.stop(false, true).slideToggle();

      j.preventDefault();
    });
  });

  //Shop Details Thumb Tab

  $(document).ready(function () {
    const tabs = document.querySelectorAll(".tab-btn button");
    const all_content = document.querySelectorAll(".tab-content");

    tabs.forEach((tab, index) => {
      tab.addEventListener("click", () => {
        tabs.forEach((tab) => {
          tab.classList.remove("active");
        });
        tab.classList.add("active");

        all_content.forEach((content) => {
          content.classList.remove("active");
        });
        all_content[index].classList.add("active");
      });
    });
  });

  //Shop Details Content Tab

  $(document).ready(function () {
    const tabs = document.querySelectorAll(".info-tab-btn button");
    const all_content = document.querySelectorAll(".tab-contents");

    tabs.forEach((tab, index) => {
      tab.addEventListener("click", () => {
        tabs.forEach((tab) => {
          tab.classList.remove("active");
        });
        tab.classList.add("active");

        all_content.forEach((content) => {
          content.classList.remove("active");
        });
        all_content[index].classList.add("active");
      });
    });
  });

  // active class & remove class

  $(document).ready(function () {
    let buttons = document.querySelectorAll(
      ".shop-list-left i , .size-value ul li button "
    );

    buttons.forEach((button) => {
      button.addEventListener("click", function () {
        buttons.forEach((btn) => btn.classList.remove("active"));
        this.classList.add("active");
      });
    });
  });

  $(document).ready(function () {
    let buttons = document.querySelectorAll(".color-value ul li button");

    buttons.forEach((button) => {
      button.addEventListener("click", function () {
        buttons.forEach((btn) => btn.classList.remove("active"));
        this.classList.add("active");
      });
    });
  });

  $(document).ready(function () {
    let buttons = document.querySelectorAll(".metarial-value ul li button");

    buttons.forEach((button) => {
      button.addEventListener("click", function () {
        buttons.forEach((btn) => btn.classList.remove("active"));
        this.classList.add("active");
      });
    });
  });

  // scroll up

  if ($(".prgoress_indicator path").length) {
    let progressPath = document.querySelector(".prgoress_indicator path");
    let pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "stroke-dashoffset 10ms linear";
    let updateProgress = function () {
      let scroll = $(window).scrollTop();
      let height = $(document).height() - $(window).height();
      let progress = pathLength - (scroll * pathLength) / height;
      progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).on("scroll", updateProgress);
    let offset = 250;
    let duration = 550;
    jQuery(window).on("scroll", function () {
      if (jQuery(this).scrollTop() > offset) {
        jQuery(".prgoress_indicator").addClass("active-progress");
      } else {
        jQuery(".prgoress_indicator").removeClass("active-progress");
      }
    });
    jQuery(".prgoress_indicator").on("click", function (event) {
      event.preventDefault();
      jQuery("html, body").animate(
        {
          scrollTop: 0,
        },
        duration
      );
      return false;
    });
  }

  // confirm box

  function showConfirm(message, callback) {
    let confirmBox = document.createElement("div");
    confirmBox.classList.add("confirm-box");

    let messageBox = document.createElement("div");
    messageBox.classList.add("message-box");
    messageBox.textContent = message;
    confirmBox.appendChild(messageBox);

    let buttonBox = document.createElement("div");
    buttonBox.classList.add("button-box");
    messageBox.appendChild(buttonBox);

    let yesButton = document.createElement("button");
    yesButton.classList.add("yes-button");
    yesButton.textContent = "Yes";
    buttonBox.appendChild(yesButton);
    yesButton.addEventListener("click", YesButtonClick);

    let noButton = document.createElement("button");
    noButton.classList.add("no-button");
    noButton.textContent = "No";
    buttonBox.appendChild(noButton);
    noButton.addEventListener("click", NoButtonClick);

    function removeConfirmBox() {
      document.body.removeChild(confirmBox);
    }

    function YesButtonClick() {
      callback(true);
      removeConfirmBox();
    }

    function NoButtonClick() {
      callback(false);
      removeConfirmBox();
    }

    document.body.appendChild(confirmBox);
  }
})(jQuery);
