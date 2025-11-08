---
marp: true
---

### Week Goal: Understand Software Design
The primary goal this week is to understand core software design concepts using Python's Object-Oriented Programming (OOP) features. The key topics include **UML Diagrams**, the **APIEC Principles** (Abstraction, Polymorphism, Inheritance, Encapsulation), and the **SOLID Principles**.

---

### Key Topics Covered

#### 1. Python Fundamentals (Q1)
* **Dynamic Typing:** Understanding why Python is a dynamically-typed language (checks types at runtime) and its pros (flexibility) and cons (runtime bugs).
* **Data Types & Operators:** Reviewing basic types (int, string, list), the `type()` function, and operators like `/` (float division) vs. `//` (integer division).
* **Collections:** The main characteristics of Lists `[]`, Tuples `()`, and Dictionaries `{}`.
* **Duck Typing:** The concept that an object's suitability is determined by its methods/attributes, not its explicit type ("If it looks like a duck and quacks like a duck...").

#### 2. Object-Oriented Programming (OOP) in Python (Q2)
* **Class & Object Basics:** Instantiating objects (no `new` keyword), using the `__init__` constructor, and customizing string representations with `__str__` (user-friendly) and `__repr__` (developer-focused).
* **APIEC Principles:**
    * **Abstraction:** Hiding complex implementation details and exposing only essential features (e.g., public methods, private fields).
    * **Polymorphism:** Allowing objects of different classes to respond to the same message (method call) in different ways.
    * **Inheritance:** Creating new classes (subclasses) that reuse and extend the functionality of existing classes (superclasses).
    * **Encapsulation:** Bundling data (attributes) and the methods that operate on that data within a single unit (a class) and restricting direct access to internal fields.

#### 3. UML Diagrams (Q3 & Q4)
* **Purpose:** UML (Unified Modeling Language) is a visual language used to model, design, and document software systems, particularly those built with OOP.
* **Diagram Categories:**
    * **Structural Diagrams:** Show the static structure of the system.
        * **Class Diagram:** Displays classes, their attributes, methods, and relationships.
        * **Object Diagram:** Shows object instances and their relationships at a specific point in time.
    * **Behavioral Diagrams:** Show the dynamic behavior and interactions within the system.
        * **Use Case Diagram:** Captures functional requirements by showing interactions between actors (users) and the system (using the "As a..., I want to..., so that..." format).
        * **Sequence Diagram:** Visualizes how objects interact with each other over time, showing the sequence of messages passed between them.
* **Key Relationships:**
    * **Inheritance:** A solid line with a hollow arrow pointing to the superclass.
    * **Interface:** A dotted line with a hollow arrow pointing to the interface.
    * **Composition:** A solid line with a **filled** diamond (owner side). The part *cannot* exist without the whole.
    * **Aggregation:** A solid line with a **hollow** diamond (owner side). The part *can* exist independently.
    * **Dependency:** A dotted line with an open arrow, indicating one class "uses" another.

---

### Assignments
* **HW2**
* **Project (HW4)**: Stage 1 (REST APIs with PHP/MySQL) and Stage 2 (REST APIs with Laravel/ORM)
* **Documentation (HW5)**: Update documentation on Software Quality.

---

### Resources
* All lecture materials are available in the **ASE 420 GitHub Repository**.