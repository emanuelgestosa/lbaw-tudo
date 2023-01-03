# pa

# PA: Product and Presentation

> Tu-Do is a tool designed to  be an interactive and easy way of managing projects. It uses interactive, intuitive, dynamic and visual interfaces and can be used for personal, small and big projects! One can enroll in multiple projects and organize them as they want!

## A9: Product

### 1. Installation

### 2. Usage

> URL to the product: http://lbaw2215.lbaw.fe.up.pt

#### 2.1 Administration Credentials

> Administration URL: http://lbaw2215.lbaw.fe.up.pt/admins

| Username | Password   |
|----------|------------|
| ricardo  | ricardo123 |

#### 2.2. User Credentials

| Type          | Username | Password   |
|---------------|----------|------------|
| basic account | ana  | ana123 |

### 3. Application Help

To mark a column as a column for completed tasks, the user needs to check
a box. We provide a help text that can be revealed by hovering a question mark
to tell the user the function of the checkbox.

ADD IMAGE!!!!!

### 4. Input validation

On the server side, we used the laravel Request validate method. On the client side,
validation is made using HTML forms.

Example of validation of the creation of a task:

On the server side:

```php
$request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'due_date' => 'nullable|date|after_or_equal:tomorrow'
      ]);
```

On the client side:

```html
<input class="form-control" type="text" name="name" value="{{ $task->name }}" required/>
<input class="form-control" type="date" name="due_date" value="{{ $task->due_date }}" pattern="\d{4}-\d{2}-\d{2}">
```

### 5. Check Accessibility and Usability

### 6. HTML & CSS Validation

### 7. Revisions to the Project

### 8. Web Resources Specification

### 9. Implementation Details

#### 9.1. Libraries Used
- [Bootstrap](https://getbootstrap.com)
    - This library provides a wide variety of pre-made responsive design elements which speeds up the front-end development process We used this library here INSERIR
- [Font Awesome](https://fontawesome.com)
    - This library provides a wide range of icons. We used this library in our project because icons are a great way to visualize concepts. That can lead to the user spending less time looking for some feature. We used this library here INSERIR
- [Pusher](https://pusher.com)
    - Pusher offers 
- [SortableJS](https://sortablejs.github.io/Sortable/)
    - SortableJS is a library that allows sorting lists by dragging and dropping items. We used this library to sort both collumns and tasks inside the boards. As can be seen here INSERIR
#### 9.2 User Stories

## A10: Presentation

### 1. Product presentation

### 2. Video presentation

## Revision history

GROUP2215, 03/01/2023

* Emanuel Silva Gestosa, up202005485@edu.fe.up.pt (Editor)
* José Leandro Rodrigues da Silva, up202008061@edu.fe.up.pt
* Mariana Solange Monteiro Rocha, up202004656@edu.fe.up.pt
* Martim Afonso Rodrigues dos Santos Castro Videira, up202006289@edu.fe.up.pt
