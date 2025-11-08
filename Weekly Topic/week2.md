---
marp: true
---

### Week 2 Goal

The primary goal is to understand that **Software Process** and **Software Design** are the two most important tools for building High-Quality Software (HQS).

---

### Key Concepts: The Evolution of Software Process

This week traces the "struggle to manage complexity," starting with early project failures and leading to the development of modern methodologies.

* **The Problem:** In the 1960s, software projects became too large and complex, leading to massive failures. This sparked the need for a formal process.

* **1. Waterfall Model:** The first major process, borrowed from hardware engineering. It's a rigid, linear sequence:
    * Requirements $\rightarrow$ Design $\rightarrow$ Implementation $\rightarrow$ Testing $\rightarrow$ Maintenance
    * **Failure:** This model treats software as "complicated" (like building a bridge) when it's actually "complex" (like managing an ecosystem). It failed because **requirements always change**, "big bang" integration at the end was a disaster, and testing only happened at the end, making bug fixes extremely expensive.

* **2. Spiral Model (1986):** An improvement by Barry Boehm that introduced two key ideas: **iterative development** and **continuous risk evaluation**. It was better, but still slow, heavy on documentation, and process-focused rather than people-focused.

* **3. Agile (2001):** A major philosophical shift. The **Agile Manifesto** values:
    * **Individuals and interactions** over processes and tools
    * **Working software** over comprehensive documentation
    * **Customer collaboration** over contract negotiation
    * **Responding to change** over following a plan
    * It uses "vertical slices" (building one complete feature at a time) to get fast, continuous feedback, unlike Waterfall's "horizontal slices" (building one layer, e.g., the whole database, at a time).

* **4. Scrum:** The most popular **framework** for implementing the Agile philosophy. It is *not* Agile itself, but a way *to be* Agile. Its key components include:
    * **Roles:** Product Owner, Scrum Master, Development Team
    * **Events:** Sprints (short 1-4 week cycles), Sprint Planning, Daily Scrum, Sprint Review, and Sprint Retrospective.
    * **Artifacts:** Product Backlog, Sprint Backlog, and the Increment (the working software).

* **5. DevOps:** The modern extension of Agile that breaks down the "wall" between Development (Dev) and Operations (Ops). It focuses on automating the software delivery process using tools and practices like:
    * **CI/CD (Continuous Integration/Continuous Deployment):** An automated pipeline for testing and deploying code.
    * **Infrastructure as Code (IaC):** Managing servers and infrastructure using code (e..g., Docker, Terraform).
    * **Automated Testing:** Essential for enabling speed and reliability.

---

### Weekly Activities

* **Discussion:** Reviewing two key presentations (PDFs) on the evolution from **Waterfall to Agile** and the specifics of **Scrum and DevOps**.
* **Project (HW4):** Applying these concepts in Stages 1 and 2, which involve building REST APIs and implementing **DevOps** practices with PHP, Laravel, and Nginx.
* **Documentation (HW5):** Updating documentation related to **Software Quality**, which is the ultimate goal of using a good software process.