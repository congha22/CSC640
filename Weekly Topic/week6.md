---
marp: true
---

# Week 6 : High-Level Programming (TypeScript & React)

### 1. Struture?
This week marks a significant shift from low-level programming and standard JavaScript into **High-Level Programming**. The focus is on moving away from the "chaos" of loose typing and manual DOM manipulation toward structured, scalable software development. We explored **TypeScript** to add type safety to our code and **React** to componentize our user interfaces. The narrative followed "Sarah’s journey" from C to JavaScript, and finally to TypeScript and React, highlighting how each tool solves the scalability problems of the previous one.

### 2. What We Learned

#### Part A: TypeScript (Adding Safety to JavaScript)
We learned that TypeScript is a superset of JavaScript that compiles down to JS. Its primary goal is to catch errors at **compile time** rather than **runtime** (avoiding the "3 AM debugging" scenario).

* **Static Typing:** unlike JS, TS allows us to define types (`string`, `number`, `boolean`) explicitly.
* **Interfaces & Types:** We learned to define the "shape" of objects using Interfaces. This ensures that if a function expects a `Student` object, it effectively has an ID, name, and email.
* **Generics:** We covered how to write reusable code components that work with a variety of types while retaining type safety (e.g., a `Container<T>`).
* **Decorators:** A method to wrap or modify behavior (like logging or validation) without changing the original method's code.
* **DOM Manipulation:** We learned how to use TS to interact with the DOM safely (e.g., casting `document.getElementById` to `HTMLButtonElement` so we get the correct autocomplete suggestions).

#### Part B: React (The Component Revolution)
We moved from Imperative programming (telling the browser exactly *how* to change the DOM step-by-step) to Declarative programming (telling React *what* the UI should look like based on the current data).

* **Components:** The UI is built using reusable blocks (Functions returning JSX) rather than one massive HTML file.
* **Props vs. State:**
    * **Props:** Data passed *down* from a parent to a child (immutable by the child).
    * **State (`useState`):** Internal memory of a component. When state changes, React automatically re-renders the UI.
* **One-Way Data Flow:** Data flows down the tree, and events flow up. This makes debugging predictable.

* **The Virtual DOM:** React keeps a virtual copy of the UI in memory, compares it to the actual DOM when data changes, and only updates the specific elements that changed (efficient rendering).
* **Side Effects (`useEffect`):** We learned how to handle operations outside of rendering, such as fetching data or saving to `localStorage`, ensuring these don't disrupt the render cycle.

### 3. Assignments 

* **HW3:** Complete the assigned homework (check specific deadline).
* **HW5 (Documentation):**
    * Update your documentation regarding Software Quality.
    * Review the updates from your three team leaders (Assignment & GitHub Repository).

**Project (HW4) - Major Focus:**
You need to work on the REST API implementation for the course project. This is split into two stages:
* **Stage 1:** Implement REST APIs using **PHP, MySQL, and Nginx**.
* **Stage 2:** Implement REST APIs using **Laravel ORM**, incorporating **DevOps** practices and **GitHub Pages**.

---