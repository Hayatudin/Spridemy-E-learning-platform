


const navLinks = document.querySelectorAll('.nav-link');
const sign = document.querySelectorAll("#sign");

const hamburger = document.getElementById("Hamburger");
const navMenu = document.getElementById("nav-menu");

const hoverRoad = document.getElementById("hoverRoad");
const roadmapLink = document.getElementById("roadmap");

const commentBtn = document.getElementById("userComment");
const commentBox = document.getElementById("commentBox");

const container = document.querySelector(".contain");
const numb = document.querySelectorAll("#numb");
let test = false;

hamburger.addEventListener("click", () => {
  if (navMenu.classList.contains("left-[-100%]")) {
    navMenu.classList.remove("left-[-100%]");
    navMenu.classList.add("fixed", "left-0", "overflow-auto");
  } else {
    navMenu.classList.add("left-[-100%]");
    navMenu.classList.remove("fixed", "left-0", "overflow-auto");
  }


  menuIcon();


});

document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById("search-input");

  searchInput.addEventListener('click', () => {
    window.location.href = "search.php";
  });
});


window.onscroll = () => {
  if (window.screenY = container.offsetTop) {

    if (!test) {
      numb.forEach(e => {
        let start = 0;
        let end = e.dataset.num;

        let count = setInterval(() => {
          start++;
          e.textContent = start;
          if (start == end) {
            clearInterval(count);
          }
        }, 2000 / end)
      })

    }
    test = true;
  }

};


commentBtn.addEventListener("click", () => {

  if (commentBox.classList.contains("hidden")) {
    commentBox.classList.remove("hidden");
    commentBox.classList.add("block");
  } else {
    commentBox.classList.remove("block");
    commentBox.classList.add("hidden");
  }
});


document.addEventListener("DOMContentLoaded", () => {
  const searchIcon = document.getElementById("search");

  searchIcon.addEventListener("click", () => {
    if (searchInput.classList.contains("opacity-0")) {
      searchInput.classList.remove("opacity-0", "hidden");
      searchInput.classList.add("opacity-100");
    } else {
      searchInput.classList.remove("opacity-100");
      searchInput.classList.add("opacity-0", "hidden");
    }
  });
});



function navControl(x) {
  x.forEach((s) => {
    s.addEventListener('click', () => {
      if (navMenu.classList.contains("left-[-100%]")) {
        navMenu.classList.remove("left-[-100%]");
        navMenu.classList.add("fixed", "left-0", "overflow-auto");
      } else {
        navMenu.classList.add("left-[-100%]");
        navMenu.classList.remove("fixed", "left-0", "overflow-auto");
      }

      menuIcon();

    })
  })

}

function menuIcon() {
  if (hamburger.classList.contains("ri-menu-3-line")) {
    hamburger.classList.add("ri-close-line");
    hamburger.classList.remove("ri-menu-3-line");
  }
  else {
    hamburger.classList.add("ri-menu-3-line");
    hamburger.classList.remove("ri-close-line");
  }

}

navControl(sign);
navControl(navLinks);
