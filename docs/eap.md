# EAP: Architecture Specification and Prototype
## A7: Web Resources Specification

This artifact documents the  architecture of the web application to be developed, indicating the catalog of resources, the properties of each resource, and the format of JSON responses. This specification adheres to the OpenAPI standard using YAML.
This artifact presents the documentation for Tu-Do, including the CRUD (create, read, update, delete) operations for each resource.

### Overview

An overview of the web application to implement is presented in this section, where the modules are identified and briefly described. The web resources associated with each module are detailed in the individual documentation of each module inside the OpenAPI specification.

|                                                    |                                                                                                                                                                                                                                                                                                                                               |
| -------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| M01: Sign up, Sign in and external APIs            | Web resources associated with user registration and authentication. Includes the following system features: login/logout, signup and password recovery. It also includes endpoints such as those related to the use of external APIs.                                                                                                         |
| M02: Individual Profile and User Information       | Web resources associated with user profile management. Includes the following system features: view and edit personal profile information, user projects.                                                                                                                                                                                     |
| M03: User Administration and static pages          | Web resources associated with the pages and actions that only administrators of the system have access to. That is, the pages and actions related to the administrator center. This module also includes web resources associated with static pages that serve to inform the user. Includes the About, FAQ, Contacts and Main Features pages. |
| M04: Content Searching, Filtering and Presentation | Web resources associated with the searching and filtering of the system's content. Includes the searching for projects, tasks and users.                                                                                                                                                                                                      |
| M05: Projects                                      | Web resources associated with all aspects regarding projects, boards, columns, tasks and comments.                                                                                                                                                                                                                                            |
| M06: Forums                                        | Web resources associated with all aspects regarding forums, messages and posts.                                                                                                                                                                                                                                                               |
### Permissions

This section defines the permissions used in the modules to establish the conditions of access to resources.
|     |               |                                                                                    |
|-----|---------------|------------------------------------------------------------------------------------|
| PUB | Public        | Users without privileges                                                           | 
| USR | User | Authenticated users                                                                         | 
| OWN | Owner         | User that are owners of the information (e.g. own profile, participating projects) |
| COO | Coordinator   | User that is the coordinator of the project.                                       |
| ADM | Administrator | System administrators                                                              |

### OpenAPI Specification

This section includes the API specification for the all the high priority tasks in OpenAPI (YAML). 
There's also a link to the OpenAPI YAML file in the group's repository that can be checked here: <a href="https://git.fe.up.pt/lbaw/lbaw2223/lbaw2215/-/blob/main/openapi.yaml">Tu-do OpenAPI</a>

```
openapi: 3.0.0
info:
 version: '1.0'
 title: 'LBAW Tu-Do Web API'
 description: 'Web Resources Specification (A7) for Tu-Do' 
externalDocs:
 description: Find more info here.
 url: https://web.fe.up.pt/~ssn/wiki/teach/lbaw/medialib/a07
tags:
 - name: 'M01: Authentication and Individual Profile'
 - name: 'M02: Works'
 - name: 'M03: Reviews and Wish list'
 - name: 'M04: Loans'
 - name: 'M05: Projects'
paths:
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
       operationId: R503
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
    # Obter a page para adicionar uma project board
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


  /boards/{board_id}/add_vertical:
    # Obter a page para adicionar uma coluna
    get:
      operationId: R508
      summary: 'R508: Fetch add_vertical page'
      description: 'Gets the add_vertical page with a form to add a new board column. Access: COO'
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
          description: 'Ok. Show add_vertical page'
        '401':
          description: 'Cannot access this page.'

    # Adiciona uma coluna nova a uma board
    post:
        operationId: R509
        summary: 'R509: Adds a board vertical to a board Action'
        description: 'Processes the add_vertical page form submission. Access: COO'
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
            description: 'Redirect after processing the add_vertical form'
            headers:
              Location:
                schema:
                  type: string
                examples:
                  302Success:
                    description: 'New board vertical was added. Redirect to board page.'
                    value: '/boards/{board_id}'
                  302Error:
                    description: 'Failed to add new board vertical. Redirect to add_column form.'
                    value: '/boards/{board_id}/vertical'
          '400':
            description: 'Bad Request. Back to add_vertical page.'
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
            description: 'Ok. Project fetched!’'
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
            description: 'Ok. board fetched!’'
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
            description: 'Ok. Column’s tasks fetched!'
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
            description: 'Ok. Task’s label_classes fetched!'
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
            description: 'Ok. Task’s comments fetched!'
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
                    profilePicture: #??
                    name: Lara Daniela Ferreira
                  - id: 13
                    username: dizzy
                    profilePicture: #??
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
                          profilePicture: #??
                          name: Lara Daniela 
                        - id: 2
                          username: laurasia
                          profilePicture: #??
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
                          profilePicture: #??
                          name: Lara Daniela 
                        - id: 2
                          username: laurasia
                          profilePicture: #??
                          name: Laura Eugénia
                    - id: 2
                      title: Laundry
                      description: This week laundry
                      participants:
                        - id: 1
                          username: spukunu
                          profilePicture: #??
                          name: Lara Daniela 
                        - id: 2
                          username: laurasia
                          profilePicture: #??
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

## A8 - Vertical Prototype

The Vertical Prototype includes the implementation of the features marked as necessary (with an asterisk) in the common and theme requirements documents. This artifact aims to validate the architecture presented, also serving to gain familiarity with the technologies used in the project.
The implementation is based on the <a href="https://git.fe.up.pt/lbaw/template-laravel">LBAW Framework</a> and includes work on all layers of the architecture of the solution to implement: user interface, business logic and data access. The prototype includes the implementation of pages of visualization, insertion, edition and removal of information, the control of permissions in the access to the implemented pages, and the presentation of error and success messages.

### Implemented Features
#### Implemented User Stories
The user stories that were implemented in the prototype are described in the following table.