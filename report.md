---
marp: true
---

# Building High-Quality Software (HQS): An Onboarding Guide

## 1. Introduction: What is High-Quality Software?
As software engineers, our job is not simply to write code; it is to solve problems and manage complexity. Many projects fail because they treat software as "complicated" (like a bridge) rather than "complex" (like an ecosystem).

To succeed, we must aim for **High-Quality Software (HQS)**. HQS is defined by three pillars:
* **Reliable:** It works as expected and handles errors gracefully.
* **Maintainable:** It is easy to read, fix, and extend by other developers.
* **Efficient:** It performs well without wasting resources.

> **Engineer's Note:** High quality is not an accident. It is the result of using the right **Process** (Agile/DevOps) and the right **Design** (OOP/SOLID/Frameworks).

---

## 2. The Process: Managing Complexity
To build HQS, we must abandon rigid processes like **Waterfall**, which fail because requirements always change. Instead, we adopt **Agile** and **DevOps** philosophies.

### 2.1 Agile & Scrum
We build software in "vertical slices" (complete features) rather than horizontal layers. This allows for:
* **Iterative Development:** We embrace change rather than fearing it.
* **Feedback Loops:** We test early and often, avoiding the "big bang" integration disasters of Waterfall.

### 2.2 DevOps & Infrastructure as Code (IaC)
A major part of quality is consistency. If code works on my machine but breaks on the server, we have failed. We solve this using **DevOps** practices like **Infrastructure as Code (IaC)**.

**Case Study Example (HW4): Docker**
In our Todo API project, we didn't just write PHP files; we containerized the application using **Docker**.
* We defined our environment (PHP-FPM, Nginx, MySQL) in `docker-compose.yml`.
* **Benefit:** This ensures that every developer runs the exact same environment (`./setup.sh`), eliminating "it works on my machine" bugs. This increases reliability and speed of deployment.

---

## 3. Software Design: The Blueprint of Quality
Once the process is set, we need to structure our code correctly using **Object-Oriented Programming (OOP)** and **Design Patterns**.

### 3.1 APIEC Principles
We use the **APIEC** principles to organize our code logic:
* **Abstraction:** Hiding complex implementation details. For example, in our API, the user doesn't need to know *how* a token is hashed, only that they receive one.
* **Encapsulation:** Bundling data and methods together and restricting access.
* **Inheritance & Polymorphism:** Reusing code to reduce redundancy (DRY - Don't Repeat Yourself).

### 3.2 SOLID Principles
To prevent "spaghetti code," we follow **SOLID** principles, specifically:
* **Single Responsibility Principle (SRP):** A class should have only one reason to change.
* **Open/Closed Principle:** Code should be open for extension but closed for modification.

**Case Study Example (HW4): MVC Architecture**
Our Laravel project demonstrates SRP through the MVC (Model-View-Controller) pattern:
* `Item.php` (Model): Handles database logic.
* `TodoController.php`: Handles business logic and HTTP responses.
* `api.php`: Handles routing.
* **Benefit:** If we need to change how Todo items are saved, we only touch the Model. If we need to change the JSON response format, we only touch the Controller.

---

## 4. The Power of Abstraction: High-Level Frameworks
One of the most effective ways to ensure HQS is to use **High-Level Languages** and **Frameworks**. We learned through "Sarah's Journey" that moving from low-level languages (C) to high-level languages (JS/TS) drastically improves productivity and reduces memory management errors.

### 4.1 Type Safety (TypeScript)
While JavaScript increases productivity, it can be fragile. **TypeScript** adds static typing, catching errors at **compile time** rather than **runtime**.
* **Why it matters:** It prevents the "3 AM debugging" scenario by ensuring that if a function expects a `Student` object, it actually gets one.

### 4.2 Frameworks (Laravel)
Frameworks provide a standard foundation so we don't have to reinvent the wheel.

**Case Study Example (HW4): Laravel & Sanctum**
In our Todo project, we used Laravel instead of raw PHP.
* **Authentication:** Instead of writing our own insecure login script, we used **Laravel Sanctum** to handle Bearer token authentication.
* **ORM (Eloquent):** Instead of writing raw SQL queries (which are prone to injection attacks), we used Laravel's Eloquent ORM.
    * *Raw SQL:* `SELECT * FROM items WHERE user_id = 5`
    * *Eloquent:* `$user->items()`
* **Benefit:** This abstraction makes the code cleaner, more secure, and easier to read, directly contributing to **Maintainability** and **Reliability**.

---

## 5. Refactoring: Keeping Quality High
Quality is not a one-time event; it is a habit. **Refactoring** is the process of improving code structure without changing its external behavior.

In our project lifecycle:
1.  **Make it work:** Build the feature (e.g., "Create Todo").
2.  **Refactor:** Look for code smells. Are we repeating code? Is a function doing too much?
3.  **Optimize:** Improve performance if necessary.

In HW4, the separation of the `AuthController` from the `TodoController` is an example of keeping responsibilities clear and the code refactored for readability.

---

## 6. Conclusion
Building High-Quality Software requires a holistic approach. It is not just about writing code that compiles.

To be a successful member of this team, you must:
1.  **Trust the Process:** Use Docker and Agile workflows to ensure consistency and adaptability.
2.  **Design for Change:** Use OOP and SOLID principles so your code can evolve without breaking.
3.  **Leverage Abstractions:** Use frameworks like Laravel and tools like TypeScript to handle complexity for you.

As Richard Feynman said, **"What I cannot create, I do not understand."**. We learned these concepts by building the HW4 API; now we apply them to everything we build.

---

### **Appendix: HW4 Project Overview (Example of HQS)**
* **Stack:** PHP 8.3, Laravel 10, MySQL 8.0, Nginx.
* **Security:** Bearer Token Authentication via Sanctum.
* **Deployment:** Containerized via Docker for reproducible builds.
* **Endpoints:** RESTful design (GET, POST, PUT, DELETE) handling JSON data.