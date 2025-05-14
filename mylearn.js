document.addEventListener("DOMContentLoaded", () => {
  const resources = [
    {
      Title: "Guide to Frontend development",
      name: "Guide to Frontend development.pdf",
      path: "../materials/Guide to frontend development.pdf",
    },
    {
      Title: "Introduction to backend development",
      name: "Introduction to backend development.pptx",
      path: "../materials/Introduction to backend development.pptx",
    },
    {
      Title: "Introduction to mobile application development",
      name: "Introduction to mobile application development",
      path: "../materials/Introduction to mobile application development.pptx",
    },
    {
      Title: "Introduction to AI development",
      name: "Introduction to AI development.pptx",
      path: "../materials/Introduction to AI development.pptx",
    },
    {
      Title: "Get started with UI UX design",
      name: "Get started with UI UX design.pptx",
      path: "../materials/Get started with UI UX design.pptx",
    },
    {
      Title: "Introduction to Cyber security",
      name: "Introduction to Cyber security.pptx",
      path: "../materials/Introduction to Cyber security.pptx",
    },
  ];

  const resourceContainer = document.getElementById("resource-container");

  resources.forEach((resource) => {
    const listItem = document.createElement("li");
    listItem.classList.add(
      "resource-item",
      "flex",
      "flex-col",
      "gap-1",
      "items-center",
      "py-4",
      "w-24"
    );
    listItem.innerHTML = `
        <img src="../file.png" style="width: 70px; height: 70px; " alt="file icon">
        <span class="text-center ">${resource.Title}</span>
        <button class="download-btn bg-green-600 rounded-sm px-4 py-1 my-4" onclick="downloadResource('${resource.path}', '${resource.name}')">Download</button>
      `;
    resourceContainer.appendChild(listItem);
  });
});

function downloadResource(path, fileName) {
  const a = document.createElement("a");
  a.href = path;
  a.download = fileName;
  a.click();
}

const courseBtn = document.getElementById("courseBtn");
const resourceBtn = document.getElementById("resourceBtn");
const beyondBtn = document.getElementById("beyondBtn");

const courseContainer = document.getElementById("course-container");
const resourceContainer = document.getElementById("resource-container");
const beyondContainer = document.getElementById("beyond-container");

courseBtn.addEventListener("click", () => {
  courseContainer.classList.remove("hidden");
  resourceContainer.classList.add("hidden");
  beyondContainer.classList.add("hidden");
});

resourceBtn.addEventListener("click", () => {
  courseContainer.classList.add("hidden");
  resourceContainer.classList.remove("hidden");
  beyondContainer.classList.add("hidden");
});

beyondBtn.addEventListener("click", () => {
  courseContainer.classList.add("hidden");
  resourceContainer.classList.add("hidden");
  beyondContainer.classList.remove("hidden");
});
