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

#### Accessibility

To evaluate the Accessibility of our wep app we used the online checklist: https://ux.sapo.pt/checklists/acessibilidade/
We ended-up agreeing on a 14 out of 18 score, since we had some checkmarks unchecked, like:
- Non textual elements have a an alternative version in text
- <fieldset> and <legend> are used to group various fileds on forms
- The <title> of the pages is clear, direct and perceptible and its related to the content of the page
- The website is totally navigable using only the keyboard

#### Usability

To evaluate the Usability of our wep app we used the online checklist: https://ux.sapo.pt/checklists/usabilidade/
We ended-up agreeing on a 26 out of 28 score, since we had some checkmarks unchecked, like:
- A stylesheet specific for printing is included
- "Open Graph" tags were added

### 6. HTML & CSS Validation

### 7. Revisions to the Project

We have added a new table to the database to store invites to a project, and
also some fields used to store the order of tasks inside a column and of
columns inside a board.

### 8. Web Resources Specification

```yaml
openapi: 3.0.0

info:
  version: '1.0'
  title: 'LBAW Tu-do Web API'
  description: 'Web Resources Specification (A7) for Tu-do'

servers:
  - url: http://lbaw2215.lbaw.fe.up.pt
    description: 'Production server'


externalDocs:
  description: Find more info here.
  url: 'https://git.fe.up.pt/lbaw/lbaw2223/lbaw2215/-/wikis/home'


tags:
  - name: 'M01: Sign up, Sign in and external APIs'
  - name: 'M02: Individual Profile and User Information'
  - name: 'M03: User Administration and static pages'
  - name: 'M04: Content Searching, Filtering and Presentation'
  - name: 'M05: Projects'
  - name: 'M06: Forums'


paths:
  /login:
    get:
      operationId: R101
      summary: 'R101: Login Form'
      description: 'Provide login form. Access: PUB'
      tags:
        - 'M01: Sign up, Sign in and external APIs'
      responses:
          '200':
            description: 'Ok. Show Log-in Form UI'


    post:
      operationId: R102
      summary: 'R102: Login Action'
      description: 'Processes the login form submission. Access: PUB'
      tags:
        - 'M01: Sign up, Sign in and external APIs'

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                email:
                  type: string
                  format: email
                password:
                  type: string
                  format: password
              required:
                  - email
                  - password

      responses:
        '302':
          description: 'Redirect after processing the login credentials.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful authentication. Redirect to user profile.'
                  value: '/users/{id}'
                302Error:
                  description: 'Failed authentication. Redirect to login form.'
                  value: '/login'
        '400':
          description: 'Bad Request. Back to Log-In Form.'

  /logout:
    post:
      operationId: R103
      summary: 'R103: Logout Action'
      description: 'Logout the current authenticated user. Access: USR, ADM'
      tags:
        - 'M01: Sign up, Sign in and external APIs'
      responses:
        '302':
          description: 'Redirect after processing logout.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful logout. Redirect to login form.'
                  value: '/login'


  /register:
    get:
      operationId: R104
      summary: 'R104: Register Form'
      description: 'Provide new user registration form. Access: PUB'
      tags:
        - 'M01: Sign up, Sign in and external APIs'
      responses:
        '200':
          description: 'Ok. Show Sign-Up UI'

    post:
      operationId: R105
      summary: 'R105: Register Action'
      description: 'Processes the new user registration form submission. Access: PUB'
      tags:
        - 'M01: Sign up, Sign in and external APIs'

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                username:
                  type: string
                password:
                  type: string
                  format: password
                passwordConfirmation:
                  type: string
                  format: password
                name:
                  type: string
                birth:
                  type: string
                  format: date
                phoneNumber:
                  type: string
              required:
                  - email
                  - password
                  - passwordConfirmation
                  - username
                  - name

      responses:
        '302':
          description: 'Redirect after processing the new user information.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful authentication. Redirect to user profile.'
                  value: '/users/{id}'
                302Failure:
                  description: 'Failed authentication. Redirect to login form.'
                  value: '/login'
        '400':
          description: 'Bad Request. Back to Register Form.'

  /login/google:
    post:
      operationId: R106
      summary: 'R106: Login with Google'
      description: 'Processes the login form submission. Access: PUB'
      tags:
        - 'M01: Sign up, Sign in and external APIs'
      responses:
        '302':
          description: 'Redirect after processing the login credentials.'
          headers:
             Location:
               schema:
                 type: string
               examples:
                 302Success:
                   description: 'Successful authentication. Redirect to user profile.'
                   value: '/users/{id}'
                 302Error:
                   description: 'Failed authentication. Redirect to login form.'
                   value: '/login'
        '400':
          description: 'Bad Request. Back to Log-In Form.'


  /users/{id}:

    parameters:
      - in: path
        name: id
        schema:
          type: integer
        required: true

    get:
      operationId: R201
      summary: 'R201: View user profile'
      description: 'Show the individual user profile. Access: USR'
      tags:
        - 'M02: Individual Profile and User Information'

      responses:
        '200':
          description: 'Ok. Show User Profile UI'
        '401':
          description: 'Not logged-in.'
        '404':
          description: 'User not found'


  /users/{id}/edit:

    parameters:
      - in: path
        name: id
        schema:
          type: integer
        required: true

    get:
      operationId: R202
      summary: 'R202: View user profile edition page'
      description: 'Show the individual user profile edition page. Access: OWN, ADM'
      tags:
        - 'M02: Individual Profile and User Information'

      responses:
        '200':
          description: 'Ok. Show User Profile Edition UI'
        '401':
          description: 'Not logged-in.'
        '403':
          description: 'Tried to access the edit profile page of another user.'
        '404':
          description: 'User not found'


  /users/{id}/projects:

    parameters:
       - in: path
         name: id
         schema:
           type: integer
         required: true

    get:
      operationId: R203
      summary: 'R203: View user projects page'
      description: 'Show the individual user project page. Access: OWN, ADM'
      tags:
        - 'M02: Individual Profile and User Information'
      responses:
        '200':
          description: 'Ok. Show User Projects UI'
        '401':
          description: 'Not logged-in.'
        '403':
          description: 'Tried to access the profile page of another user.'
        '404':
          description: 'User not found'

  /users/{id}/favorites:

    parameters:
      - in: path
        name: id
        schema:
          type: integer
        required: true

    get:
      operationId: R204
      summary: 'R204: View user favorite projects page'
      description: "Show the individual user's favorite projects page. Access: OWN, ADM"
      tags:
        - 'M02: Individual Profile and User Information'

      responses:
        '200':
          description: 'Ok. Show User Favorite Projects UI'
        '401':
          description: 'Not logged-in.'
        '403':
          description: 'Tried to access the profile page of another user.'
        '404':
          description: 'User not found'


  /users/{id}/calendar:

    parameters:
      - in: path
        name: id
        schema:
          type: integer
        required: true
    get:
      operationId: R205
      summary: 'R205: View user projects page'
      description: 'Show the individual user calendar page. Access: OWN, ADM'
      tags:
        - 'M02: Individual Profile and User Information'


      responses:
        '200':
          description: 'Ok. Show User Calendar UI'
        '401':
          description: 'Not logged-in.'
        '403':
          description: 'Tried to access the profile page of another user.'
        '404':
          description: 'User not found'


  /api/users/{id}:

    parameters:
      - in: path
        name: id
        schema:
          type: integer
        required: true

    patch:
      operationId: R206
      summary: 'R206: Edit user profile'
      description: 'Processes the request to edit the profile of an user. Access: OWN, ADM'
      tags:
         - 'M02: Individual Profile and User Information'

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                id:
                  type: integer
                username:
                  type: string
                password:
                  type: string
                  format: password
                name:
                  type: string
                birth:
                  type: string
                  format: date
                phoneNumber:
                  type: string
          responses:
            '200':
              description: 'OK. Profile edited with success.'
            '400':
              description: 'Bad Request. Return to profile.'
            '401':
              description: 'Not logged-in.'
            '403':
              description: 'Tried to edit a profile not owned by the user.'
            '404':
              description: 'User not found.'
    delete:
      operationId: R207
      summary: 'R207: Delete user profile'
      description: 'Delete an user profile. Access: OWN, ADM'
      tags:
        - 'M02: Individual Profile and User Information'
      responses:
        '200':
          description: 'Ok. Delete user profile.'
        '401':
          description: 'Not logged-in.'
        '403':
          description: 'Tried to delete a profile not owned by the user.'
        '404':
          description: 'User not found.'
  /api/users/{id}/notifications:
    parameters:
      - in: path
        name: id
        schema:
          type: integer
        required: true
    get:
      operationId: R208
      summary: 'R208: Get user notifications'
      description: 'Requests all notifications of an user. Access: OWN, ADM'
      tags:
          - 'M02: Individual Profile and User Information'
      responses:
        '200':
          description: 'OK. Notifications successfully retrieved.'
          content:
            application/json:
              schema:
                type: array
              items:
                type: object
              properties:
                id:
                    type: string
                date:
                    type: string
                    format: date-time
                message:
                    type: string
              example:
                  - id: 1
                    date: 08/11/2022
                    message: You have been assigned a new task.
                  - id: 2
                    date: 09/11/2022
                    message: One of your projects has a new coordinator.
        '400':
          description: 'Bad Request.'
        '401':
          description: 'Not logged-in.'
        '403':
          description: 'Tried to retrieve notifications of an user profile not owned by the user.'
        '404':
          description: 'User not found.'
  /api/users/{id}/projects:
    parameters:
      - in: path
        name: id
        schema:
          type: integer
        required: true
    get:
        operationId: R209
        summary: 'R209: Get user projects'
        description: 'Requests all projects of an user. Access: OWN, ADM'
        tags:
           - 'M02: Individual Profile and User Information'
        responses:
            '200':
              description: 'OK. Projects successfully retrieved.'
              content:
                application/json:
                  schema:
                    type: array
                  items:
                    type: object
                  properties:
                    id:
                      type: string
                    title:
                      type: string
                    description:
                      type: string
                    creation:
                      type: string
                      format: date-time
                    isArchived:
                        type: boolean
                  example:
                    - id: 1
                      title: Sonsing
                      description: Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.
                      creation: 11/20/2021
                      isArchived: false
            '400':
              description: 'Bad Request.'
            '401':
              description: 'Not logged-in.'
            '403':
              description: 'Tried to retrieve projects of an user profile not owned by the user.'
            '404':
              description: 'User not found.'
  /api/users/{id}/favorites:
    parameters:
      - in: path
        name: id
        schema:
          type: integer
        required: true
    get:
        operationId: R210
        summary: 'R210: Get user favorite projects'
        description: 'Requests all favorite projects of an user. Access: OWN, ADM'
        tags:
           - 'M02: Individual Profile and User Information'

        responses:
            '200':
              description: 'OK. Projects successfully retrieved.'
              content:
                application/json:
                    schema:
                        type: array
                    items:
                        type: object
                    properties:
                        id:
                            type: string
                        title:
                            type: string
                        description:
                            type: string
                        creation:
                            type: string
                            format: date-time
                        isArchived:
                            type: boolean
                    example:
                        - id: 1
                          title: Sonsing
                          description: Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.
                          creation: 11/20/2021
                          isArchived: false
            '400':
              description: 'Bad Request.'
            '401':
              description: 'Not logged-in.'
            '403':
              description: 'Tried to retrieve favorite projects of an user profile not owned by the user.'
            '404':
              description: 'User not found.'
  /faq:
     get:
       operationId: R301
       summary: 'R301: View FAQ page.'
       description: 'Show the page containing the Frequently Asked Questions. Access: PUB'
       tags:
         - 'M03: User Administration and static pages'
       responses:
         '200':
           description: 'Ok. Show FAQ Page.'
  /about:
     get:
       operationId: R302
       summary: 'R302: View About Us page.'
       description: 'Show the page containing information about the platform and its developers. Access: PUB'
       tags:
         - 'M03: User Administration and static pages'
       responses:
         '200':
           description: 'Ok. Show About Us Page.'
  /contacts:
     get:
       operationId: R303
       summary: 'R303: View Contacts page.'
       description: 'Show the page containing contact information. Access: PUB'
       tags:
         - 'M03: User Administration and static pages'
       responses:
         '200':
           description: 'Ok. Show Contacts Page.'
  /features:
     get:
       operationId: R304
       summary: 'R304: View Main Features page.'
       description: 'Show the page containing information about the main features of the platform. Access: PUB'
       tags:
         - 'M03: User Administration and static pages'
       responses:
         '200':
           description: 'Ok. Show Main Features Page.'
  /:
     get:
       operationId: R305
       summary: 'R305: View Homepage.'
       description: 'Show the Homepage. Access: PUB'
       tags:
         - 'M03: User Administration and static pages'
       responses:
         '200':
           description: 'Ok. Show Homepage.'
  /api/faq:
    get:
      operationId: R306
      summary: 'R306: Get FAQs.'
      description: 'Retrieve information about Frequently Asked Questions. Access: PUB'
      tags:
        - 'M03: User Administration and static pages'
      responses:
        '200':
           description: 'Ok. Successfully retrieved FAQs.'
           content:
             application/json:
               schema:
                 type: array
               items:
                 type: object
               properties:
                 question:
                   type: string
                 answer:
                   type: string
               example:
                 - question: 'What is Tu-Do?'
                   answer: 'Tu-Do is a tool designed to be an interactive and easy way of managing projects'
    put:
      operationId: R307
      summary: 'R307: New FAQ Action'
      description: 'Processes the new FAQ submission. Access: ADM'
      tags:
        - 'M03: User Administration and static pages'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                question:
                  type: string
                answer:
                  type: string
                  format: password
              required:
                  - question
                  - answer
      responses:
        '200':
          description: 'OK. Successfully added a new FAQ'
        '401':
           description: 'Not logged-in.'
        '403':
           description: 'User is not an administrator.'
        '409':
           description: 'Question already exists.'
    delete:
      operationId: R308
      summary: 'R308: Delete FAQ action'
      description: 'Attempts to delete a FAQ. Access: ADM'
      tags:
        - 'M03: User Administration and static pages'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                id:
                  type: integer
              required:
                 - id
      responses:
        '200':
          description: 'OK. Successfully removed FAQ'
        '204':
          description: 'FAQ does not exist.''
        '400':
           description: 'Bad Request.'
        '401':
           description: 'Not logged-in.'
        '403':
           description: 'User is not an administrator.'
  /admins:
     get:
       operationId: R309
       summary: 'R309: View Administration page.'
       description: 'Show the Administration Center page. Access: ADM'
       tags:
         - 'M03: User Administration and static pages'
       responses:
         '200':
           description: 'Ok. Show Administration Page.'
         '401':
            description: 'Not logged-in.'
         '403':
            description: 'User is not an administrator.'
  /api/users/{id}/ban:
    parameters:
      - in: path
        name: id
        schema:
          type: integer
        required: true
    post:
      operationId: R310
      summary: 'R310: Ban an user Action'
      description: 'Processes the request to ban an user. Access: ADM'
      tags:
        - 'M03: User Administration and static pages'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                id:
                  type: integer
                endDate:
                  type: string
                  format: date-time
                reason:
                  type: string
              required:
                  - id
                  - endDate
      responses:
          '200':
            description: 'OK. User banned with success.'
          '400':
            description: 'Bad Request. Return to the last page.'
          '401':
            description: 'Not logged-in.'
          '403':
            description: 'User is not an administrator.'
          '404':
            description: 'User not found.'
  /projects/{project_id}:
     get:
       operationId: R501
       summary: 'R501: Fetch project page'
       description: 'Get the project page. Access: USR'
       tags:
         - 'M05: Projects'
       parameters:
         - in: path
           name: project_id
           schema:
             type: integer
           required: true
       responses:
         '200':
            description: 'Ok. Show Project page'
         '401':
            description: 'Cannot access this page.'
  # Get the board page
  /boards/{board_id}:
     get:
       operationId: R502
       summary: 'R502: Fetch board page'
       description: 'Get the board page. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: board_id
           schema:
             type: integer
           required: true

       responses:
         '200':
           description: 'Ok. Show Board page'
         '401':
           description: 'Cannot access this page.'

  # Get the task page
  /task/{task_id}:
     get:
       operationId: R503  # CORRIGIR NUMERaÇÂO
       summary: 'R503: Fetch task page'
       description: 'Get the task page. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: task_id
           schema:
             type: integer
           required: true

       responses:
         '200':
           description: 'Ok. Show task page'
         '401':
           description: 'Cannot access this page.'

  /users/{user_id}/add_project:
    # Obter a page para adicionar um projeto
    get:
      operationId: R504
      summary: 'R504: Fetch add project page'
      description: 'Gets the add_project page with a form to add a new project. Access: USR'
      tags:
        - 'M05: Projects'
      parameters:
         - in: path
           name: user_id
           schema:
             type: integer
           required: true
      responses:
        '200':
          description: 'Ok. Show add_project page'
        '401':
          description: 'Cannot access this page.'

    # Adiciona um projeto novo a um user
    post:
        operationId: R505
        summary: 'R505: Adds a project to a user Action'
        description: 'Processes the add_project page form submission. Access: USR'
        tags:
          - 'M05: Projects'

        parameters:
         - in: path
           name: user_id
           schema:
             type: integer
           required: true

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  title:
                    type: string
                  description:
                    type: string
                required:
                      - title
        responses:
          '302':
            description: 'Redirect after processing the add_project form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'New Project was added. Redirect to projects page.'
                    value: '/users/{id}'   #REDIRECIONAR PARA a pagina onde estao os projetos do user (homepage)
                  302Error:
                    description: 'Failed to add new project. Redirect to add_project form.'
                    value: '/users/{user_id}/add_project'
          '400':
            description: 'Bad Request. Back to add_project page.'
          '401':
            description: 'Cannot do this action.'


  /project/{project_id}/add_board:
    # Obter a page para adicionar um projeto
    get:
      operationId: R506
      summary: 'R506: Fetch add_project_board page'
      description: 'Gets the add_board page with a form to add a new project board. Access: COO'
      tags:
        - 'M05: Projects'
      parameters:
         - in: path
           name: project_id
           schema:
             type: integer
           required: true
      responses:
        '200':
          description: 'Ok. Show add_board page'
        '401':
          description: 'Cannot access this page.'

    # Adiciona uma board nova a um projeto
    post:
        operationId: R507
        summary: 'R507: Adds a project board to a project Action'
        description: 'Processes the add_board page form submission. Access: COO'
        tags:
          - 'M05: Projects'

        parameters:
         - in: path
           name: project_id
           schema:
             type: integer
           required: true

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  project_id:
                    type: integer
                  description:
                    type: string
                  name:
                    type: string
                required:
                      - project_id
                      - name
        responses:
          '302':
            description: 'Redirect after processing the add_board form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'New Project board was added. Redirect to project page.'
                    value: '/projects/{project_id}'
                  302Error:
                    description: 'Failed to add new project board. Redirect to add_board form.'
                    value: '/project/{project_id}/board'
          '400':
            description: 'Bad Request. Back to add_board page.'
          '401':
            description: 'Cannot do this action.'
  /boards/{board_id}/add_column:
    # Obter a page para adicionar uma coluna
    get:
      operationId: R508
      summary: 'R508: Fetch add_column page'
      description: 'Gets the add_column page with a form to add a new board column. Access: COO'
      tags:
        - 'M05: Projects'
      parameters:
         - in: path
           name: board_id
           schema:
             type: integer
           required: true
      responses:
        '200':
          description: 'Ok. Show add_column page'
        '401':
          description: 'Cannot access this page.'
    # Adiciona uma coluna nova a uma board
    post:
        operationId: R509
        summary: 'R509: Adds a board column to a board Action'
        description: 'Processes the add_column page form submission. Access: COO'
        tags:
          - 'M05: Projects'
        parameters:
         - in: path
           name: board_id
           schema:
             type: integer
           required: true
        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  board_id:
                    type: integer
                  name:
                    type: string
                required:
                      - board_id
                      - name
        responses:
          '302':
            description: 'Redirect after processing the add_column form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'New board column was added. Redirect to board page.'
                    value: '/boards/{board_id}'
                  302Error:
                    description: 'Failed to add new board column. Redirect to add_column form.'
                    value: '/boards/{board_id}/column'
          '400':
            description: 'Bad Request. Back to add_column page.'
          '401':
            description: 'Cannot do this action.'

  /verticals/{vertical_id}/add_task:
    # Obter a page para adicionar uma task
    get:
      operationId: R510
      summary: 'R510: Fetch add_task page'
      description: 'Gets the add_task page with a form to add a new column task. Access: USR'
      tags:
        - 'M05: Projects'
      parameters:
         - in: path
           name: column_id
           schema:
             type: integer
           required: true
      responses:
        '200':
          description: 'Ok. Show add_task page'
        '401':
          description: 'Cannot do this action.'
    # Adiciona uma task nova a uma coluna
    post:
        operationId: R511
        summary: 'R511: Adds a column task to a column Action'
        description: 'Processes the add_task page form submission. Access: USR'
        tags:
          - 'M05: Projects'
        parameters:
         - in: path
           name: column_id
           schema:
             type: integer
           required: true
        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  column_id:
                    type: integer
                  name:
                    type: string
                  description:
                    type: string
                  due_date:
                    type: string
                required:
                      - column_id
                      - name
        responses:
          '302':
            description: 'Redirect after processing the add_task form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'New column task was added. Redirect to board page.'
                    value: '/boards/{board_id}'
                  302Error:
                    description: 'Failed to add new column task. Redirect to add_task form.'
                    value: '/boards/{board_id}/column'
          '400':
            description: 'Bad Request. Back to add_task page.'
          '401':
            description: 'Cannot do this action.'
  /add_label:
    # Obter a page para criar/adicionar uma label
    get:
      operationId: R512
      summary: 'R512: Fetch add_label page'
      description: 'Gets the add_label page with a form to add a new label. Access: USR'
      tags:
        - 'M05: Projects'
      responses:
        '200':
          description: 'Ok. Show add_label page'

    # cria um label nova
    post:
        operationId: R513
        summary: 'R513: Creates a new label Action'
        description: 'Processes the add_label page form submission. Access: USR'
        tags:
          - 'M05: Projects'
        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  name:
                    type: string
                  color:
                    type: integer
                required:
                      - color
                      - name

        responses:
          '302':
            description: 'Redirect after processing the add_label form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'New label was created. Redirect to board page.'
                    value: '/boards/{board_id}'
                  302Error:
                    description: 'Failed to create a new label. Redirect to add_label form.'
                    value: '/add_label'
          '400':
            description: 'Bad Request. Back to add_label page.'

  /add_label_class:
    # Obter a page para criar/adicionar uma label_classas
    get:
      operationId: R514
      summary: 'R514: Fetch add_label_class page'
      description: 'Gets the add_label_class page with a form to add a new label. Access: COO'
      tags:
        - 'M05: Projects'
      responses:
        '200':
          description: 'Ok. Show add_label_class page'

    # adiciona/cria uma label_class nova a um label
    post:
        operationId: R515
        summary: 'R515: Creates a new label class Action'
        description: 'Processes the add_label_class page form submission. Access: COO'
        tags:
          - 'M05: Projects'

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  name:
                    type: string
                required:
                      - name

        responses:
          '302':
            description: 'Redirect after processing the add_label_class form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'New label class was created. Redirect to board page.'
                    value: '/boards/{board_id}'
                  302Error:
                    description: 'Failed to create a new label class. Redirect to add_label_class form.'
                    value: '/add_label_class'
          '400':
            description: 'Bad Request. Back to add_label_class page.'

  # associa uma label a um task (separado pois varias tasks podem ter a mesma label) (alterar assginment)
  /add_label_to_task:
    post:
      operationId: R516
      summary: 'R516: Associates a label to a task'
      description: 'Creates a new label_task instance with the given label_id and task_id. Access: USR'
      tags:
        - 'M05: Projects'

      parameters:
        - in: query
          name: label_id
          schema:
           type: integer
          required: true
        - in: query
          name: task_id
          schema:
           type: integer
          required: true

      requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  label_id:
                    type: integer
                  task_id:
                    type: integer
                required:
                      - object

      responses:
          '302':
            description: 'Redirect after processing the add_label_to_task action'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'New label class was created. Redirect to board page.'
                    value: '/boards/{board_id}'
                  302Error:
                    description: 'Failed to create a new label class. Redirect to board page.'
                    value: '/boards/{board_id}'
          '400':
            description: 'Bad Request. Back to board page.'

  # associa uma label class a uma label
  /add_labelClass_to_label:
    post:
      operationId: R517
      summary: 'R517: Associates a label class to a label'
      description: 'Creates a new label_label_class instance with the given label_id and label_class_id. Access: USR'
      tags:
        - 'M05: Projects'

      requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  label_id:
                    type: integer
                  label_class_id:
                    type: integer
                required:
                  - object

      responses:
        '302':
          description: 'Redirect after processing the add_labelClass_to_label action'
          headers:
            Location:
              schema:
                 type: string
              examples:
                302Success:
                  description: 'New label class was created. Redirect to board page.'
                  value: '/boards/{board_id}'
                302Error:
                  description: 'Failed to create a new label class. Redirect to board page.'
                  value: '/boards/{board_id}'
        '400':
          description: 'Bad Request. Back to board page.'

  # Adiciona um comment novo a uma task
  /tasks/{task_id}/add_comment:
    post:
        operationId: R518
        summary: 'R518: Adds a new comment to a task Action'
        description: 'Processes the add_task page form submission. Access: USR'
        tags:
          - 'M05: Projects'
        parameters:
         - in: path
           name: task_id
           schema:
             type: integer
           required: true

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  id:
                    type: integer
                  msg:
                    type: string
                  sent_date:
                    type: string
                  id_task:
                    type: integer
                  id_users:
                    type: integer
                required:
                    - object

        responses:
          '302':
            description: 'Redirect after processing the add_task form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'New task comment was added. Redirect to task page.'
                    value: '/boards/{board_id}'
                  302Error:
                    description: 'Failed to add new task comment. Redirect to add_task form.'
                    value: '/boards/{board_id}/column'
          '400':
            description: 'Bad Request. Back to add_task page.'



  /api/project/{project_id}:
    # fetches a project by ID
    get:
      operationId: R519
      summary: 'R519: Fetch a project'
      description: 'Gets a certain project via ID. Access: ADM'
      tags:
        - 'M05: Projects'

      parameters:
        - in: path
          name: project_id
          schema:
            type: integer
          required: true

      responses:
         '200':
            description: 'Ok. Project fetched!'
            content:
              application/json:
                schema:
                  type: object
                  properties:
                    id:
                      type: integer
                    title:
                      type: string
                    description:
                      type: string
                    creation:
                      type: string
                    is_archived:
                      type: boolean
                    id_coordinator:
                      type: integer

  # edits a project (including changing coordinator)
    put:
        operationId: R520
        summary: 'R520: Edits a project Action'
        description: 'Edits a project. Access: COO'
        tags:
          - 'M05: Projects'

        parameters:
         - in: path
           name: project_id
           schema:
             type: integer
           required: true

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                    title:
                      type: string
                    description:
                      type: string
                    is_archived:
                      type: boolean
                    id_coordinator:
                      type: integer
                required:
                      - title
                      - is_achived
                      - id_coordinator

        responses:
          '302':
            description: 'Redirect after processing to form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'Project was edited. Redirect to projects page.'
                    value: 'asd' #REDIRECIONAR PARA a pagina onde estao os projetos do user (homepage)
                  302Error:
                    description: 'Failed to edit project. Redirect to add_project form.'
                    value: '/users/{user_id}/add_project'
          '400':
            description: 'Bad Request. Back to add_project form.'

  /api/boards/{board_id}:
    # fetches a board by ID
    get:
      operationId: R521
      summary: 'R521: Fetch a board'
      description: 'Gets a certain board via ID. Access: ADM'
      tags:
        - 'M05: Projects'

      parameters:
        - in: path
          name: board_id
          schema:
            type: integer
          required: true

      responses:
         '200':
            description: 'Ok. board fetched!'
            content:
              application/json:
                schema:
                  type: object
                  properties:
                    id:
                      type: integer
                    name:
                      type: string
                    id_project:
                      type: integer

    # edits a board
    put:
        operationId: R522
        summary: 'R522: Edits a board Action'
        description: 'Edits a board. Access: COO'
        tags:
          - 'M05: Projects'

        parameters:
         - in: path
           name: board_id
           schema:
             type: integer
           required: true

        requestBody:
          required: true
          content:
            application/json:
              schema:
                type: object
                properties:
                  name:
                    type: string
                required:
                    - name

        responses:
          '302':
            description: 'Redirect after processing to form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'Board was edited. Redirect to project page.'
                    value: '/projects/{project_id}'
                  302Error:
                    description: 'Failed to edit board. Redirect to add_board form.'
                    value: '/project/{project_id}/add_board'
          '400':
            description: 'Bad Request. Back to add_board form.'

  /api/columns/{column_id}:
    # fetches a column by ID
    get:
      operationId: R523
      summary: 'R523: Fetch a column'
      description: 'Gets a certain column via ID. Access: ADM'
      tags:
        - 'M05: Projects'

      parameters:
        - in: path
          name: column_id
          schema:
            type: integer
          required: true

      responses:
         '200':
            description: 'Ok. column fetched!’'
            content:
              application/json:
                schema:
                  type: object
                  properties:
                    id:
                      type: integer
                    name:
                      type: string
                    id_board:
                      type: integer

    # edits a column
    put:
        operationId: R524
        summary: 'R524: Edits a column Action'
        description: 'Edits a column. Access: COO'
        tags:
          - 'M05: Projects'

        parameters:
         - in: path
           name: column_id
           schema:
             type: integer
           required: true

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  name:
                    type: string
                required:
                  - object

        responses:
          '302':
            description: 'Redirect after processing to form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'Column was edited. Redirect to board page.'
                    value: '/boards/{board_id}'
                  302Error:
                    description: 'Failed to edit column. Redirect to add_column form.'
                    value: '/boards/{board_id}/add_column'
          '400':
            description: 'Bad Request. Back to add_column form.'

  /api/tasks/{task_id}:
    # fetches a task by ID
    get:
      operationId: R525
      summary: 'R525: Fetch a task'
      description: 'Gets a certain task via ID. Access: ADM'
      tags:
        - 'M05: Projects'

      parameters:
        - in: path
          name: task_id
          schema:
            type: integer
          required: true

      responses:
         '200':
            description: 'Ok. task fetched!’'
            content:
              application/json:
                schema:
                  type: object
                  properties:
                    id:
                      type: integer
                    name:
                      type: string
                    description:
                      type: string
                    creation_date:
                      type: string
                    due_date:
                      type: string
                    id_vertical:
                      type: integer

    # edits a task
    put:
        operationId: R526
        summary: 'R526: Edits a task Action'
        description: 'Edits a task. Access: USR'
        tags:
          - 'M05: Projects'

        parameters:
         - in: path
           name: task_id
           schema:
             type: integer
           required: true

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  name:
                    type: string
                  description:
                    type: string
                  creation_date:
                    type: string
                  due_date:
                    type: string
                required:
                  - name

        responses:
          '302':
            description: 'Redirect after processing to form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'task was edited. Redirect to board page.'
                    value: '/boards/{board_id}'
                  302Error:
                    description: 'Failed to edit task. Redirect to add_task form.'
                    value: '/columns/{column_id}/add_task'
          '400':
            description: 'Bad Request. Back to add_task form.'


  /api/label/{label_id}:
    # fetches a label by ID
    get:
      operationId: R527
      summary: 'R527: Fetch a label'
      description: 'Gets a certain label via ID. Access: ADM'
      tags:
        - 'M05: Projects'

      parameters:
        - in: path
          name: label_id
          schema:
            type: integer
          required: true

      responses:
         '200':
            description: 'Ok. label fetched!’'
            content:
              application/json:
                schema:
                  type: object
                  properties:
                    id:
                      type: integer
                    name:
                      type: string
                    color:
                      type: integer

    # edits a label
    put:
        operationId: R528
        summary: 'R528: Edits a label Action'
        description: 'Edits a label. Access: USR'
        tags:
          - 'M05: Projects'

        parameters:
         - in: path
           name: label_id
           schema:
             type: integer
           required: true

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
              schema:
                type: object
                properties:
                  name:
                    type: string
                  color:
                    type: integer
                required:
                      - color
                      - name

        responses:
          '302':
            description: 'Redirect after processing to form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'label was edited. Redirect to board page.'
                    value: '/task/{task_id}'
                  302Error:
                    description: 'Failed to edit label. Redirect to add_label form.'
                    value: '/add_label'
          '400':
            description: 'Bad Request. Back to add_label form.'

  /api/label_class/{label_class_id}:
    # fetches a label_class by ID
    get:
      operationId: R529
      summary: 'R529: Fetch a label_class'
      description: 'Gets a certain label_class via ID. Access: ADM'
      tags:
        - 'M05: Projects'

      parameters:
        - in: path
          name: label_class_id
          schema:
            type: integer
          required: true

      responses:
         '200':
            description: 'Ok. label_class fetched!’'
            content:
              application/json:
                schema:
                  type: object
                  properties:
                    id:
                      type: integer
                    name:
                      type: string

    # edits a label_class
    put:
        operationId: R530
        summary: 'R530: Edits a label_class Action'
        description: 'Edits a label_class. Access: COO'
        tags:
          - 'M05: Projects'

        parameters:
         - in: path
           name: label_class_id
           schema:
             type: integer
           required: true

        requestBody:
          required: true
          content:
            application/x-www-form-urlencoded:
                schema:
                  type: object
                  properties:
                    name:
                      type: string

        responses:
          '302':
            description: 'Redirect after processing to form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'label_class was edited. Redirect to board page.'
                    value: '/task/{task_id}'
                  302Error:
                    description: 'Failed to edit label_class. Redirect to add_label_class form.'
                    value: '/add_label_class'
          '400':
            description: 'Bad Request. Back to add_label_class form.'

  # gets the projects of a user (array of projects)
  /api/users/{user_id}/projects:
     get:
       operationId: R531
       summary: 'R531: Fetch the projects of a user'
       description: 'Gets the projects of a user. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: user_id
           schema:
             type: integer
           required: true

       responses:
         '200':
            description: 'Ok. User’s projects fetched!’'
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: integer
                      title:
                        type: string
                      description:
                        type: string
                      creation:
                        type: string
                      is_archived:
                        type: boolean
                      id_coordinator:
                        type: integer
         '401':
            description: 'Cannot do this action.'

  # gets the boards of a project (array of boards)
  /api/project/{project_id}/boards:
     get:
       operationId: R532
       summary: 'R532: Fetch the boards of a project'
       description: 'Gets the boards of a certain project. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: project_id
           schema:
             type: integer
           required: true

       responses:
         '200':
            description: 'Ok. Project’s boards fetched!'
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: integer
                      name:
                        type: string
                      id_project:
                        type: integer
         '401':
            description: 'Cannot do this action.'

  # gets the columns of a board (array of verticals)
  /api/boards/{board_id}/columns:
     get:
       operationId: R533
       summary: 'R533: Fetch the columns of a board'
       description: 'Gets the columns of a certain board. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: board_id
           schema:
             type: integer
           required: true

       responses:
         '200':
            description: 'Ok. Board’s columns fetched!'
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: integer
                      name:
                        type: string
                      id_board:
                        type: integer
         '401':
            description: 'Cannot do this action.'

  # gets the tasks of a column (array of tasks)
  /api/columns/{column_id}/tasks:
     get:
       operationId: R534
       summary: 'R534: Fetch the tasks of a column'
       description: 'Gets the tasks of a certain column. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: column_id
           schema:
             type: integer
           required: true

       responses:
         '200':
            description: "Ok. Column's tasks fetched!"
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: integer
                      name:
                        type: string
                      description:
                        type: string
                      creation_date:
                        type: string
                      due_date:
                        type: string
                      id_vertical:
                        type: integer
         '401':
            description: 'Cannot do this action.'

  # gets the labels of a task (array of labels)
  /api/tasks/{task_id}/labels:
     get:
       operationId: R535
       summary: 'R535: Fetch the labels of a task'
       description: 'Gets the labels of a certain task. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: task_id
           schema:
             type: integer
           required: true

       responses:
         '200':
            description: 'Ok. Task`s labels fetched!'
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: integer
                      name:
                        type: string
                      color:
                        type: integer
         '401':
            description: 'Cannot do this action.'

  # gets the label_classes of a label (array of label_classes)
  /api/labels/{label_id}/label_classes:
     get:
       operationId: R536
       summary: 'R536: Fetch the label_classes of the task'
       description: 'Gets the label_classes of a certain label. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: label_id
           schema:
             type: integer
           required: true

       responses:
         '200':
            description: "Ok. Task's label_classes fetched!"
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: integer
                      name:
                        type: string
         '401':
            description: 'Cannot access this page.'

  # gets the comments of a task (array of comments)
  /api/tasks/{task_id}/comments:
     get:
       operationId: R537
       summary: 'R537: Fetch the comments of the task'
       description: 'Gets the messages of the chat that is associated with a certain task. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: task_id
           schema:
             type: integer
           required: true

       responses:
         '200':
            description: "Ok. Task's comments fetched!"
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: integer
                      msg:
                        type: string
                      sent_date:
                        type: string
                      id_task:
                        type: integer
                      id_users:
                        type: integer
         '401':
            description: 'Cannot access this page.'

  # gets the collaborators of a project (array of users)
  /api/projects/{project_id}/collaborators:
     get:
       operationId: R538
       summary: 'R538: Fetch the collaborators of the project'
       description: 'Gets the users that are collaborators on the a project. Access: USR'
       tags:
         - 'M05: Projects'

       parameters:
         - in: path
           name: project_id
           schema:
             type: integer
           required: true

       responses:
         '200':
            description: 'Ok. Projects collaborators fetched!'
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: integer
                      username:
                        type: string
                      name:
                        type: string
                      birth:
                        type: string
                      email:
                        type: string
                      phone_number:
                        type: string

         '401':
            description: 'Cannot access this page.'

  /assign_user_to_task/{user_id}/{task_id}:
    post:
      operationId: R539
      summary: 'R539: Assigns a user (collaborator) to a task'
      description: 'Creates a new assignment instance with the user_id and task_id. Access: COO'
      tags:
        - 'M05: Projects'

      parameters:
        - in: path
          name: user_id
          schema:
           type: integer
          required: true
        - in: path
          name: task_id
          schema:
           type: integer
          required: true

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                user_id:
                  type: integer
                task_id:
                  type: integer
                assign_date:
                  type: string
              required:
                - object

      responses:
        '200':
          description: 'Ok. Show task page'
        '401':
          description: 'Cannot do this action.'

  /favorite:
    put:
      operationId: R540
      summary: 'R540: Adds a project to the favorites of a user'
      description: 'Changes/edits the atribute favorite of the collaborator instance with the same user_id, so a user can add the project to their favorites page. Access: USR'
      tags:
        - 'M05: Projects'

      parameters:
        - in: query
          name: user_id
          description: User id of the user to add a new favorite project
          schema:
           type: integer
          required: true
        - in: query
          name: project_id
          description: Project_id of the project to be favorited by a user
          schema:
           type: integer
          required: true

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                favorite:
                  type: boolean

      responses:
        '200':
          description: 'Ok. Show projects page'

  /api/search/users/:
    parameters:
      - in: query
        name: query
        schema:
          type: string
        required: true
      - in: query
        name: maxItems
        schema:
          type: integer
        required: false
    get:
      operationId: R401
      summary: 'R401: Search for users'
      description: 'Search for users based on their username/name'
      tags:
        - 'M04: Content Searching, Filtering and Presentation'
      responses:
          '200':
            description: Success
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: string
                      username:
                        type: string
                      profilePicture:
                        type: string
                      name:
                        type: string
                  example:
                    - id: 1
                      username: spukunu
                      profilePicture: path/picture
                      name: Lara Daniela Ferreira
                    - id: 13
                      username: dizzy
                      profilePicture: path/picture
                      name: Daniel Ferreira
  /api/search/projects/:
    parameters:
      - in: query
        name: query
        schema:
            type: string
        required: true
      - in: query
        name: maxItems
        schema:
            type: integer
        required: false
    get:
      operationId: R402
      summary: 'R402: Search for projects'
      description: 'Search for projects based on their title/description'
      tags:
        - 'M04: Content Searching, Filtering and Presentation'
      responses:
          '200':
            description: Success
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: string
                      title:
                        type: string
                      description:
                        type: string
                      participants:
                        schema:
                          type: array
                          items:
                            type: object
                          properties:
                            id:
                              type: string
                            username:
                              type: string
                            profilePicture:
                              type: string
                            name:
                              type: string
                  example:
                    - id: 1
                      title: Home
                      description: Chores of the House
                      participants:
                        - id: 1
                          username: spukunu
                          profilePicture: path/picture
                          name: Lara Daniela
                        - id: 2
                          username: laurasia
                          profilePicture: path/picture
                          name: Laura Eugénia
  /api/search/tasks/:
    parameters:
      - in: query
        name: query
        schema:
            type: string
        required: true
      - in: query
        name: maxItems
        schema:
            type: integer
        required: false
    get:
      operationId: R403
      summary: 'R403: Search for tasks'
      description: 'Search for tasks based on their title/description'
      tags:
        - 'M04: Content Searching, Filtering and Presentation'
      responses:
          '200':
            description: Success
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: string
                      title:
                        type: string
                      description:
                        type: string
                      participants:
                        schema:
                          type: array
                          items:
                            type: object
                          properties:
                            id:
                              type: string
                            username:
                              type: string
                            profilePicture:
                              type: string
                            name:
                              type: string
                  example:
                    - id: 1
                      title: Dishes
                      description: Doing the dishes this week
                      participants:
                        - id: 1
                          username: spukunu
                          profilePicture: path/picture
                          name: Lara Daniela
                        - id: 2
                          username: laurasia
                          profilePicture: path/picture
                          name: Laura Eugénia
                    - id: 2
                      title: Laundry
                      description: This week laundry
                      participants:
                        - id: 1
                          username: spukunu
                          profilePicture: path/picture
                          name: Lara Daniela
                        - id: 2
                          username: laurasia
                          profilePicture: path/picture
                          name: Laura Eugénia
  /api/search/labels/:
    parameters:
      - in: query
        name: query
        schema:
            type: string
        required: true
      - in: query
        name: maxItems
        schema:
            type: integer
        required: false
    get:
      operationId: R404
      summary: 'R404: Search for labels'
      description: 'Search for labels based on their name'
      tags:
        - 'M04: Content Searching, Filtering and Presentation'
      responses:
          '200':
            description: Success
            content:
              application/json:
                schema:
                  type: array
                  items:
                    type: object
                    properties:
                      id:
                        type: string
                      name:
                        type: string
                  example:
                    - id: 2
                      name: 'Doing'
                    - id: 3
                      name: 'Done'
```

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

Tu-Do allows the user to create and participate in projects with his
coleages. There they are able to create boards, and inside them create columns
to organize their tasks. You can invite and accept invites to other projects,
and leave any project whenever you want.
You can edit your profile to your liking, including your profile picture and
set projects as favorite so you can more easily find them.

> URL to the product: http://lbaw2215.lbaw.fe.up.pt

### 2. Video presentation

## Revision history

GROUP2215, 03/01/2023

* Emanuel Silva Gestosa, up202005485@edu.fe.up.pt (Editor)
* José Leandro Rodrigues da Silva, up202008061@edu.fe.up.pt
* Mariana Solange Monteiro Rocha, up202004656@edu.fe.up.pt
* Martim Afonso Rodrigues dos Santos Castro Videira, up202006289@edu.fe.up.pt
