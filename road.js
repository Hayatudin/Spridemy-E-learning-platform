document.addEventListener("DOMContentLoaded", () => {
  const roadmapLink = document.getElementById("roadmap-link");
  const megaMenu = document.getElementById("mega-menu");

  if (roadmapLink && megaMenu) {
    roadmapLink.addEventListener("mouseenter", () => {
      megaMenu.classList.remove("hidden");
    });

    roadmapLink.addEventListener("mouseleave", (e) => {
      setTimeout(() => {
        if (!megaMenu.matches(":hover")) {
          megaMenu.classList.add("hidden");
        }
      }, 100);
    });

    megaMenu.addEventListener("mouseleave", () => {
      megaMenu.classList.add("hidden");
    });
  } else {
    console.error("Roadmap link or Mega Menu element not found.");
  }
});
