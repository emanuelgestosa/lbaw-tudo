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

| US Identifier | Name                                | Module    | Priority | Team Members                    | State |
| ------------- | ----------------------------------- | --------- | -------- | ------------------------------- | ----- |
| US01          | Sign-in                             | Module 01 | high     | Emanuel Gestosa                 | 100%  |
| US02          | Guest Sign-up                       | Module 01 | high     | Emanuel Gestosa                 | 100%  |
| US03          | Recover Password                    | Module 01 | medium   | \-                              | 0%    |
| US04          | Sign-in with Google                 | Module 01 | low      | \-                              | 0%    |
| US05          | Sign-up with Google                 | Module 01 | low      | \-                              | 0%    |
| US06          | See Home                            | Module 03 | high     | Mariana Rocha                   | 100%  |
| US07          | Search (full text and exact match)  | Module 04 | high     | Martim Videira                  | 70%   |
| US08          | See About Us                        | Module 03 | medium   | Emanuel Gestosa                 | 100%  |
| US09          | See Main Features                   | Module 03 | medium   | José Silva, Martim Videira      | 100%  |
| US10          | Accept Email Invitation             | Module 05 | medium   | \-                              | 0%    |
| US11          | Search Filters                      | Module 04 | medium   | \-                              | 0%    |
| US12          | See Contacts                        | Module 03 | medium   | Mariana Rocha                   | 100%  |
| US13          | Change to dark/light mode           | Module 03 | medium   | Mariana Rocha                   | 40%   |
| US14          | Placeholders in Form Inputs         | Module 03 | medium   | Emanuel Gestosa, Martim Videira | 100%  |
| US15          | Contextual Error Messages           | Module 03 | medium   | José Silva, Emanuel Gestosa     | 100%  |
| US16          | Contextual Help                     | Module 03 | medium   | Emanuel Gestosa, Martim Videira | 80%   |
| US17          | Sort                                | Module 04 | low      | \-                              | 0%    |
| US18          | See FAQ                             | Module 03 | low      | Mariana Rocha                   | 80%   |
| US19          | Project Creation                    | Module 05 | high     | José Silva                      | 100%  |
| US20          | Logout                              | Module 01 | high     | Mariana Rocha                   | 100%  |
| US21          | View my projects                    | Module 02 | high     | Mariana Rocha                   | 100%  |
| US22          | View profile                        | Module 02 | high     | Mariana Rocha                   | 100%  |
| US23          | Edit profile                        | Module 02 | high     | Mariana Rocha, Emanuel Gestosa  | 100%  |
| US24          | Delete Account                      | Module 02 | medium   | Emanuel Gestosa                 | 100%  |
| US25          | Support Profile Picture             | Module 02 | medium   | Mariana Rocha, José Silva       | 100%  |
| US26          | Favorite Projects                   | Module 02 | medium   | José Silva                      | 100%  |
| US27          | Project Invitation managing         | Module 05 | low      | Martim Videira                  | 100%  |
| US28          | Task Creation                       | Module 05 | high     | José Silva                      | 100%  |
| US29          | Task Management                     | Module 05 | high     | José Silva                      | 100%  |
| US30          | View Task Details                   | Module 05 | high     | José Silva                      | 100%  |
| US31          | Task Completion                     | Module 05 | high     | Mariana Rocha                   | 100%  |
| US32          | Search Tasks                        | Module 04 | high     | \-                              | 0%    |
| US33          | Task Deletion                       | Module 05 | medium   | Emanuel Gestosa, Mariana Rocha  | 100%  |
| US34          | Comment on a task                   | Module 05 | medium   | Martim Videira                  | 100%  |
| US35          | Assign users to task                | Module 05 | medium   | \-                              | 0%    |
| US36          | View Board Columns                  | Module 05 | medium   | Mariana Rocha, Martim Videira   | 100%  |
| US37          | Change tasks' column                | Module 05 | medium   | Mariana Rocha, Emanuel Gestosa  | 100%  |
| US38          | Notification on Coordinator change  | Module 05 | medium   | \-                              | 0%    |
| US39          | Notification on task assignment     | Module 05 | medium   | \-                              | 0%    |
| US40          | Notification on task completion     | Module 05 | medium   | \-                              | 0%    |
| US41          | Leave Project                       | Module 05 | medium   | José Silva                      | 100%  |
| US42          | View Team Members Profile           | Module 05 | medium   | Martim Videira, Mariana Rocha   | 100%  |
| US43          | View Project Team                   | Module 05 | medium   | Martim Videira                  | 100%  |
| US44          | Post Messages to Project Forum      | Module 06 | low      | \-                              | 0%    |
| US45          | Browse the Project Message Forum    | Module 06 | low      | \-                              | 0%    |
| US46          | View Project Timeline               | Module 05 | low      | \-                              | 0%    |
| US47          | Edit Post                           | Module 06 | low      | \-                              | 0%    |
| US48          | Delete Post                         | Module 06 | low      | \-                              | 0%    |
| US49          | View Board                          | Module 05 | low      | Mariana Rocha, Martim Videira   | 100%  |
| US50          | View Project Details                | Module 05 | low      | Martim Videira                  | 100%  |
| US51          | Add Users to Project                | Module 05 | high     | Martim Videira, José Silva      | 100%  |
| US52          | Assign a new Coordinator            | Module 05 | medium   | \-                              | 0%    |
| US53          | Edit Project Details                | Module 05 | medium   | José Silva                      | 20%   |
| US54          | Assign Tasks to Collaborators       | Module 05 | medium   | \-                              | 0%    |
| US55          | Remove Collaborators                | Module 05 | medium   | \-                              | 0%    |
| US56          | Archive Projects                    | Module 05 | medium   | \-                              | 0%    |
| US57          | Notification on accepted invitation | Module 05 | medium   | \-                              | 0%    |
| US58          | Notification on task completion     | Module 05 | medium   | \-                              | 0%    |
| US59          | Add/create new Board columns        | Module 05 | medium   | José Silva, Martim Videira      | 100%  |
| US60          | Set completed tasks column          | Module 05 | medium   | Emanuel Gestosa                 | 100%  |
| US61          | Manage Collaborators' permissions   | Module 05 | low      | \-                              | 0%    |
| US62          | Invite to Project via email         | Module 05 | low      | \-                              | 0%    |
| US63          | Create Board                        | Module 05 | low      | José Silva                      | 100%  |
| US64          | Create new roles                    | Module 05 | low      | \-                              | 0%    |
| US65          | Attribute roles                     | Module 05 | low      | \-                              | 0%    |
| US66          | Administer User Accounts            | Module 03 | high     | Emanuel Gestosa, Martim Videira | 100%  |
| US67          | Delete user account                 | Module 03 | medium   | Emanuel Gestosa                 | 100%  |
| US68          | Block/Unblock user accounts         | Module 03 | medium   | Emanuel Gestosa, Martim Videira | 90%   |
| US69          | Browse projects                     | Module 03 | medium   | Emanuel Gestosa, José Silva     | 10%   |
| US70          | View project details                | Module 03 | medium   | José Silva                      | 100%  |
| US71          | Remove comments                     | Module 03 | low      | \-                              | 0%    |
| US72          | Unfreeze projects                   | Module 03 | low      | \-                              | 0%    |
| US73          | Accept user                         | Module 03 | low      | \-                              | 0%    |

## A10: Presentation

### 1. Product presentation

### 2. Video presentation

## Revision history

GROUP2215, 03/01/2023

* Emanuel Silva Gestosa, up202005485@edu.fe.up.pt (Editor)
* José Leandro Rodrigues da Silva, up202008061@edu.fe.up.pt
* Mariana Solange Monteiro Rocha, up202004656@edu.fe.up.pt
* Martim Afonso Rodrigues dos Santos Castro Videira, up202006289@edu.fe.up.pt
