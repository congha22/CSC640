---
marp: true
---

### **Week 5: High-Level Programming Language (JavaScript)**

#### **1. Structure**
This week marks a pivotal shift from low-level systems to **High-Level Programming**, specifically using **JavaScript** to manage software complexity. We explored the "Developer's Journey"—a narrative case study illustrating why high-level abstractions, type safety, and frameworks are necessary as projects scale. The core theme is **High Quality Software (HQS)**: achieving productivity and maintainability by moving away from manual memory management (like in C) toward automated, abstraction-rich environments (JavaScript/TypeScript/React).

#### **2. What we learned**

**A. The Evolution of Complexity (The "Sarah" Story)**
We learned through a case study how different layers of abstraction solve specific development problems:
* **The Low-Level Pain (C Language):** Great for control, but terrible for productivity in web apps. Requires manual memory management (`malloc`/`free`) and verbose string handling (500 lines of C vs. 20 lines of JS).
* **The High-Level Solution (JavaScript):** Drastically increases productivity with dynamic typing and built-in data structures, but becomes fragile at scale due to lack of type safety.
* **The Type Safety Layer (TypeScript):** Solves the "runtime error" chaos by catching bugs (like `undefined` properties or type mismatches) at compile time.
* **The Framework Layer (React):** Solves "Spaghetti Code" (DOM manipulation mess) by using a component-based, declarative architecture with a Virtual DOM.



**B. JavaScript Fundamentals**
We covered the technical syntax required to write modern JavaScript:
* **Variables:** The importance of using `const` (immutable reference) and `let` over the outdated `var`.
* **Functions:** Transitioning from traditional functions to modern **Arrow Functions** (`const add = (a, b) => a + b`).
* **Functional Programming:** Moving away from `for` loops toward higher-order array methods:
    * `map()`: Transforms elements (returns a new array).
    * `filter()`: Selects elements based on criteria.
    * `reduce()`: Combines elements into a single value (e.g., summing a score).



**C. The Document Object Model (DOM)**
We learned that the DOM is a tree-like object representation of the HTML.
* **Selection:** Using `document.querySelector` to grab elements.
* **Manipulation:** Changing text, styles, or HTML content dynamically.
* **Events:** attaching listeners (e.g., `click`, `submit`) to make pages interactive.



---

#### **3. Assignments**

* **HW3:** Complete outstanding tasks if not already submitted.
* **HW5 (Documentation):**
    * Update your documentation regarding **Software Quality**.
    * Review the updates from your three team leaders (GitHub Repository check).

**Project (HW4) Milestones:**
* **Stage 1:** Implement REST APIs using **PHP, MySQL, and Nginx**.
* **Stage 2:** Implement REST APIs using **Laravel (ORM), DevOps, and Github.io**.

---
