const outlines = [
    // introduction outlines 
    {
        content: '',
        header: 'Introduction to Frontend development',
        description: 'Frontend development involves building the user interface (UI) of a website or application. It defines the part of a site that users can see and interact with directly.',
        listH1: ' Client-Side Development:',
        detail1: 'This refers to everything that happens in the users browser, such as displaying content, handling user inputs, and dynamic interactivity.',
        listH2: 'Tools and Technologies: ',
        detail2: 'The core technologies used in frontend development are HTML, CSS, and JavaScript. Developers use them to create structure, style, and behavior.',
        listH3: 'Role in Full-Stack Development:',
        detail3: 'The frontend works alongside the backend to provide users with a complete experience. While the frontend handles the visual and interactive part, the backend manages data processing and storage.'
    },

    // HTML outlines 
    {
        content: '',
        header: 'HTML (HyperText Markup Language)',
        description: 'HTML is the foundation of any webpage. It provides the basic structure of a website, allowing browsers to interpret and render content.',
        listH1: 'Document Structure: ',
        detail1: 'HTML organizes content hierarchically with elements like <html>, <head>, and <body>. The <head> contains metadata, while the <body> holds visible content.',
        listH2: 'Semantic Elements: ',
        detail2: 'Semantic tags (like <article>, <section>, <nav>) help define the purpose of different parts of a webpage. This improves accessibility and SEO.',
        listH3: 'Forms and User Input:',
        detail3: 'HTML forms allow users to input data (e.g., login forms, feedback forms). Input fields, buttons, and validation attributes make data collection efficient.'
    },

    // CSS outlines 
    {
        content: '',
        header: 'CSS (Cascading Style Sheets)',
        description: 'CSS is used to style HTML content, giving websites their look and feel. It controls layout, colors, fonts, and responsiveness.',
        listH1: 'The Box Model: ',
        detail1: 'Every HTML element is treated as a box, with properties like margins, borders, padding, and content. Understanding this is crucial for layout control.',
        listH2: 'Responsive Design: ',
        detail2: 'CSS makes websites adaptable to different screen sizes using media queries. This ensures compatibility with devices like mobiles, tablets, and desktops.',
        listH3: 'Positioning and Layouts:',
        detail3: 'CSS provides layout tools like Flexbox and Grid for designing complex, responsive layouts efficiently.',
        listH4: 'Animations and Transitions:',
        detail4: 'CSS allows smooth animations for effects like hover transitions or element movement, enhancing the user experience.'
    },

    // JavaScript outlines 
    {
        content: '',
        header: 'Fundamentals of JavaScript',
        description: 'JavaScript brings interactivity to web pages, allowing for dynamic content updates, animations, and advanced features like API integration.',
        listH1: 'DOM Manipulation: ',
        detail1: 'JavaScript can access and modify the Document Object Model (DOM), which represents the structure of a webpage. This enables dynamic updates to content without reloading the page',
        listH2: 'Event Handling: ',
        detail2: 'avaScript listens for user actions like clicks, keystrokes, or scrolls and triggers corresponding functions.',
        listH3: 'APIs and Data Fetching:',
        detail3: 'JavaScript interacts with external servers or APIs to fetch or send data. For instance, it can retrieve weather data and display it dynamically on a webpage.',
        listH4: 'Frameworks and Libraries:',
        detail4: 'Tools like React, Vue, and Angular simplify complex JavaScript development tasks, enabling developers to build large-scale applications faster.'
    },

    // advanced js outlines 
    {
        content: '',
        header: 'Advanced JavaScript',
        description: 'Advanced JavaScript involves deeper concepts and techniques that allow developers to write more efficient, scalable, and maintainable code. Below are four key areas of advanced JavaScript:',
        listH1: 'Modern JavaScript Features (ES6+): ',
        detail1: 'Modern JavaScript introduces features that enhance code readability and efficiency. These include arrow functions for concise syntax, template literals for string formatting, and destructuring for extracting values from objects and arrays. These features reduce boilerplate code and streamline the development process. ',
        listH2: 'Asynchronous Programming:',
        detail2: 'Asynchronous programming allows JavaScript to handle time-consuming tasks, such as API requests, without blocking the main thread. This is achieved through mechanisms like Promises and async/await. These tools help manage asynchronous tasks efficiently, improving performance and user experience by preventing delays in the application’s interface.',
        listH3: 'Object-Oriented Programming (OOP): ',
        detail3: 'HTML forms allow users to input data (e.g., login forms, feedback forms). Input fields, buttons, and validation attributes make data collection efficient.',
        listH4: 'Functional Programming: ',
        detail4: 'Functional programming treats functions as first-class citizens and emphasizes immutability and pure functions. Concepts such as higher-order functions and closures enable developers to write concise and predictable code. This approach simplifies debugging and testing while promoting a declarative style of programming.'
    },

    // framework outlines 
    {
        content: '',
        header: 'Frontend Frameworks',
        description: 'Frontend frameworks streamline development by providing prewritten code and reusable components for common tasks.',
        listH1: 'React: ',
        detail1: 'A popular JavaScript library for building user interfaces. It introduces the concept of components (reusable pieces of UI) and state management.',
        listH2: 'Bootstrap:',
        detail2: 'A CSS framework that includes prebuilt classes for layout, typography, and components like buttons and modals.',
        listH3: 'TailwindCSS:',
        detail3: 'A utility-first CSS framework that enables rapid custom styling without writing custom CSS from scratch.'
    },

    // VC outlines 
    {
        content: '',
        header: 'Version Control and Deployment',
        description: 'Version control helps teams collaborate on code, and deployment makes the website live and accessible to users. ',
        listH1: 'Git and GitHub: ',
        detail1: 'Git is a version control system that tracks code changes, while GitHub allows developers to share and collaborate on projects.',
        listH2: 'Deployment Platforms: ',
        detail2: 'Services like Netlify and Vercel allow developers to host websites for free. The deployment process involves uploading the project and configuring domain settings. ',
        listH3: 'Environment Variables: ',
        detail3: 'These are used to securely store sensitive information like API keys, ensuring they are not exposed in the code.'
    }
    

];

const headers = document.querySelectorAll("#heads");
const headDiscription = document.querySelectorAll("#Hdesc");
const L1Head = document.querySelectorAll("#Ldesc");
const L1Desc = document.querySelectorAll("#L1desc");
const L2Head = document.querySelectorAll("#L2Head");
const L2Desc = document.querySelectorAll("#L2desc");
const L3Head = document.querySelectorAll("#L3Head");
const L3Desc = document.querySelectorAll("#L3desc");

const nextBTN = document.getElementById("nextBTN");
const prevBTN = document.getElementById("prevBTN");

const video = document.getElementById("video");
const outlineList = document.querySelectorAll("#outlineList");

outlineList.forEach(Element => {

});


let currentIndex = 0;



function updateContent() {


    const currentOutline = outlines[currentIndex];

    if (currentOutline === outlines[0]) {
        video.classList.add('block');
        video.classList.remove('hidden');
    } else {
        video.classList.add('hidden');
        video.classList.remove('block');
    }

    headers.forEach(header => {
        header.textContent = currentOutline.header;
    });

    headDiscription.forEach(desc => {
        desc.textContent = currentOutline.description;
    });

    L1Head.forEach(l1Head => {
        l1Head.textContent = currentOutline.listH1;
    });
    L1Desc.forEach(l1Desc => {
        l1Desc.textContent = currentOutline.detail1;
    });

    L2Head.forEach(l2Head => {
        l2Head.textContent = currentOutline.listH2;
    });
    L2Desc.forEach(l2Desc => {
        l2Desc.textContent = currentOutline.detail2;
    });

    L3Head.forEach(l3Head => {
        l3Head.textContent = currentOutline.listH3;
    });
    L3Desc.forEach(l3Desc => {
        l3Desc.textContent = currentOutline.detail3;
    });

    prevBTN.disabled = currentIndex === 0;
    nextBTN.disabled = currentIndex === outlines.length - 1;
}

nextBTN.addEventListener("click", () => {
    if (currentIndex < outlines.length - 1) {
        currentIndex++;
        updateContent();
    }
});

prevBTN.addEventListener("click", () => {
    if (currentIndex > 0) {
        currentIndex--;
        updateContent();
    }
});

updateContent();
