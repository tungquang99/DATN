document.addEventListener("DOMContentLoaded", function () {
  var btnTabs = document.getElementsByClassName("tab-item");
  var limit_Tour = document.getElementsByClassName("limit_tour");
  const to_Top = document.querySelector(".fa-chevron-up ");
  const bar_menu = document.querySelector(".bar_menu ");
  const close_menu = document.querySelector(".close_menu ");
  const menu = document.querySelector(".menu ");

  for (var i = 0; i < btnTabs.length; i++) {
    btnTabs[i].onclick = function () {
      for (var i = 0; i < btnTabs.length; i++) {
        btnTabs[i].classList.remove("active");
      }
      this.classList.add("active");
      var show = this.getAttribute("data-tour");
      var limitTour = document.getElementById(show);
      for (var i = 0; i < limit_Tour.length; i++) {
        limit_Tour[i].classList.remove("show");
      }
      limitTour.classList.add("show");
    };
  }

  bar_menu.onclick = function () {
    menu.classList.add("show");
  };
  close_menu.onclick = function () {
    menu.classList.remove("show");
  };

  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 500) {
      to_Top.classList.add("active");
    } else {
      to_Top.classList.remove("active");
    }
  });

  var owl = $(".owl-carousel");
  owl.owlCarousel({
    loop: true,
    nav: false,
    margin: 6,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      960: {
        items: 2,
      },
      1440: {
        items: 3,
      },
      1500: {
        items: 3,
      },
      1550: {
        items: 4,
      },
    },
  });
});

function changeImg(id) {
  let imagePath = document.getElementById(id).getAttribute("src");
  document.getElementById("main-img").setAttribute("src", imagePath);
}
