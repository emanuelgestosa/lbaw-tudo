# EBD: Database Specification Component

## A4: Conceptual Data Model
> apresentar os objetivos

### 1. Class diagram

![umlDiagram](umlDiagram.png)

### 2. Additional Business Rules

* BR01. When a project is deleted, all its boards are deleted as well.
* BR02. When a board is deleted, all its columns are deleted as well.
* BR03. When a column is deleted, all its tasks are deleted as well.
* BR04. When a forum is deleted, all its chats are deleted as well.
* BR05. When a chat is deleted, all its messages are deleted as well.
* BR06. When a task is deleted its chat is deleted too.
  
## A5: Relational Schema, validation and schema refinement
### Relational Schema

| **Relation reference** | **Relation Compact Notation**                                                                                                                             |
|------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------|
| R01                    | user(id, username UK NN, password NN, name NN, birth NN CK birth < Today, email UK NN, phone_number)                                                      |
| R02                    | project(id, title NN, description, creation NN CK creation <= Today, is_archived NN DF false, id_coordinator->user NN)                                    |
| R03                    | board(id, name NN, id_project->project NN)                                                                                                                |
| R04                    | column(id, name NN, id_board->board NN)                                                                                                                   |
| R05                    | task(id, id_chat-> chat NN, name NN, description, creation_date NN CK creation_date <= Today ,due_date CK creation_date < due_date, id_column->column NN) |
| R06                    | label(id, name NN)                                                                                                                                        |
| R07                    | label_class(id, name NN)                                                                                                                                  |
| R08                    | forum(project_id->project)                                                                                                                                |
| R09                    | chat(id, name NN)                                                                                                                                         |
| R10                    | message(id, message NN, sent_date NN CK sent_date <= Today, id_user->user NN, id_chat->chat NN)                                                           |
| R11                    | role(id, name NN, id_project->project NN)                                                                                                                 |
| R12                    | permission(id, name NN)                                                                                                                                   |
| R13                    | administrator(id, id_user->user NN)                                                                                                                       |
| R14                    | ban(id, start_date NN, end_date NN CK start_date < end_date, reason, id_user->user NN, id_administrator->administrator NN)                                |
| R15                    | faq(id, question NN UK, answer NN)                                                                                                                        |
| R16                    | notification(id, date NN CK date <= Today, message NN)                                                                                                    |
| R17                    | new_message(id_notification->notification, id_message->message)                                                                                           |
| R18                    | new_coordinator(id_notification->notification, id_project->project)                                                                                       |
| R19                    | new_assign(id_notification->notification, id_assignement->assignment)                                                                                     |
| R20                    | task_moved(id_notification->notification id_task->task)                                                                                                   |
| R21                    | assignment(id_user->user, id_task->task, assign_date NN CK assignDate <= current_date)                                                                    |
| R22                    | notified(id_user->user, id_notification->notification, isRead NN DF false)                                                                                |
| R23                    | user_role(id_user->user, id_role->role)                                                                                                                   |
| R24                    | collaborator(id_user->user, id_project->project, favorite NN DF false)                                                                                    |
| R25                    | label_label_class(id_label ->label, id_label_class -> label_class)                                                                                        |
| R26                    | label_task(id_label->label, id_task->task)                                                                                                                |
| R27                    | role_permission(id_role -> role, id_permission -> permission)                                                                                             |

Legend:
* **UK** = UNIQUE KEY
* **NN** = NOT NULL
* **DF** = DEFAULT
* **CK** = CHECK


### 2. Domains

| Domain Name | Domain Specifications |
|-------------|-----------------------|
| Today | DATE DEFAULT CURRENT_DATE |


### 3. Schema validation

| Table R01 (user)                 | |
| ------------------------------- | - |
| Keys: {id}, {username}, {email} | |
| Functional Dependencies         | |
| FD0101                          | {id} -> {username, password, name, birth, email, phone\_number} |
| FD0102                          | {username} -> {id, password, name, birth, email, phone\_number} |
| FD0103                          | {email} -> {id, username, password, name, birth, phone\_number} |
| Normal Form                     | BCNF |

| Table R02 (project)     |   |
| ----------------------- | - |
| Keys: {id}              |   |
| Functional Dependencies |   |
| FD0201                  | {id} -> {title, description, creation, is\_archived, id\_coordinator} |
| Normal Form             | BCNF |

| Table R03 (board)       |   |
| ----------------------- | - |
| Keys: {id}              |   |
| Functional Dependencies |   |
| FD0301                  | {id} -> {name, id\_project} |
| Normal Form             | BCNF |

| Table R04 (column)      |   |
| ----------------------- | - |
| Keys: {id}              |   |
| Functional Dependencies |   |
| FD0401                  | {id} -> {name, id\_board} |
| Normal Form             | BCNF |

| Table R05 (task)        |  |
| ----------------------- | - |
| Keys: {id}              | |
| Functional Dependencies | |
| FD0501                  | {id} -> {name, description, creation\_date, due\_date, id\_column} |
| Normal Form             | BCNF |

| Table R06 (label)       |   |
| ----------------------- | - |
| Keys: {id}              |   |
| Functional Dependencies |   |
| FD0601                  | {id} -> {name} |
| Normal Form             | BCNF |

| Table R07 (label\_class) |   |
| ------------------------ | - |
| Keys: {id}               |   |
| Functional Dependencies  |   |
| FD0701                   | {id} -> {name} |
| Normal Form              | BCNF |

| Table R08 (forum)       |   |
| ----------------------- | - |
| Keys: {forum\_id}       |   |
| Functional Dependencies | none |
| Normal Form             | BCNF |

| Table R09 (chat)        | |
| ----------------------- | - |
| Keys: {id}              | |
| Functional Dependencies | |
| FD0901                  | {id} -> {name} |
| Normal Form             | BCNF |

| Table R10 (message)     |   |
| ----------------------- | - |
| Keys: {id}              |   |
| Functional Dependencies |   |
| FD1001                  | {id} -> {message, sent\_date, id\_user, id\_chat} |
| Normal Form             | BCNF |

| Table R11 (role)        |   |
| ----------------------- | - |
| Keys: {id}              |   |
| Functional Dependencies |   |
| FD1101                  | {id} -> {name, id\_project} |
| Normal Form             | BCNF |

| Table R12 (permission)  |   |
| ----------------------- | - |
| Keys: {id}              |   |
| Functional Dependencies |   |
| FD1201                  | {id} -> {name} |
| Normal Form             | BCNF |

| Table R13 (administrator) |   |
| ------------------------- | - |
| Keys: {id}                |   |
| Functional Dependencies   |   |
| FD1301                    | {id} -> {id\_user} |
| Normal Form               | BCNF |

| Table R14 (ban)         |   |
| ----------------------- | - |
| Keys: {id}              |   |
| Functional Dependencies |   |
| FD1401                  | {id} -> {start\_date, end\_date, reason, id\_user, id\_administrator} |
| Normal Form             | BCNF |

| Table R15 (faq) faq(id, question NN UK, answer NN) |   |
| -------------------------------------------------- | - |
| Keys: {id}, {question}                             |   |
| Functional Dependencies                            |   |
| FD1501                                             | {id} -> {question, answer} |
| FD1502                                             | {question} -> {id, answer} |
| Normal Form                                        | BCNF |

| Table R16 (faq)         |   |
| ----------------------- | - |
| Keys: {id}              |   |
| Functional Dependencies |   |
| FD1601                  | {id} -> {date, message} |
| Normal Form             | BCNF |

| Table R17 (faq)          |   |
| ------------------------ | - |
| Keys: {id\_notification} |   |
| Functional Dependencies  |   |
| FD1701                   | {id\_notification} -> {id\_message} |
| Normal Form              | BCNF |

| Table R18 (new\_coordinator) |   |
| ---------------------------- | - |
| Keys: {id\_notification}     |   |
| Functional Dependencies      |   |
| FD1801                       | {id\_notification} -> {id\_project} |
| Normal Form                  | BCNF |

| Table R19 (new assign)   |   |
| ------------------------ | - |
| Keys: {id\_notification} |   |
| Functional Dependencies  |   |
| FD1901                   | {id\_notification} -> {id\_assignment} |
| Normal Form              | BCNF |

| Table R20 (task moved)   |   |
| ------------------------ | - |
| Keys: {id\_notification} |   |
| Functional Dependencies  |   |
| FD2001                   | {id\_notification} -> {id\_task} |
| Normal Form              | BCNF |

| Table R21 (assignment)     | |
| -------------------------- | - |
| Keys: {id\_user, id\_task} | |
| Functional Dependencies    | |
| FD2101                     | {id\_user, id\_task} -> {assign\_date} |
| Normal Form                | BCNF |


| Table R22 (notified)               | |
| ---------------------------------- | - |
| Keys: {id\_user, id\_notification} | |
| Functional Dependencies            | |
| FD2201                             | {id\_user, id\_notification} -> {isRead} |
| Normal Form                        | BCNF |

| Table R23 (user\_role)     | |
| -------------------------- | - |
| Keys: {id\_user, id\_role} | |
| Functional Dependencies    | none |
| Normal Form                | BCNF |

| Table R24 (collaborator)      | |
| ----------------------------- | - |
| Keys: {id\_user, id\_project} | |
| Functional Dependencies       | |
| FD2401                        | {id\_user, id\_project} -> {favorite} |

| Normal Form                   | BCNF |
| Table R25 (label\_label\_class)     | |
| ----------------------------------- | - |
| Keys: {id\_label, id\_label\_class} | |
| Functional Dependencies             | none |
| Normal Form                         | BCNF |

| Table R26 (label\_task)     | |
| --------------------------- | - |
| Keys: {id\_label, id\_task} | |
| Functional Dependencies     | none |
| Normal Form                 | BCNF |

| Table R27 (role\_permission)     | |
| -------------------------------- | - |
| Keys: {id\_role, id\_permission} | |
| Functional Dependencies          | none |
| Normal Form                      | BCNF |

