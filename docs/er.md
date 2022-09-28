# ER: Requirements Specification Component

## A1: Tu-Do

&nbsp;&nbsp;&nbsp;&nbsp;The Tu-Do system is being designed by a small college team group as a product targeted at users that want to organize/manage their projects. <br>
&nbsp;&nbsp;&nbsp;&nbsp;The main goal of the project is the development of a web-based information system for managing projects [with and without a team]. From organizing house chores to managing software development, Tu-Do aims to provide a complete, yet easy and interactive environment. This is a tool that can be used for both personal use and by teams. <br>
&nbsp;&nbsp;&nbsp;&nbsp;Users are separated into groups with different permissions: Guests, Authenticated Users, Collaborators, Coordinators and Project Owners. <br>
&nbsp;&nbsp;&nbsp;&nbsp;When a user has not yet created an account it is called a Guest. Guests can still be invited by email to participate on a project. <br>
&nbsp;&nbsp;&nbsp;&nbsp;A user who has an account is called an Authenticated User, it can be also invited to participate in projects as well as creating and viewing their own. They also have the ability to mark projects as their favorite. <br>
&nbsp;&nbsp;&nbsp;&nbsp;A Collaborator is an Authenticated User who is participating on someone else’s project.  Collaborators can create and manage tasks (by due date, priority, using labels…), assign users to them as well as searching for them, commenting on them, viewing their details and marking them as completed. They should also be able to leave a project and to view the project team and its members’ profiles. <br>
&nbsp;&nbsp;&nbsp;&nbsp;Additionally, a Coordinator is a Collaborator with special permissions to invite/remove users into/from the project and delete tasks created by others as well as assigning members to them, editing project details and assigning a new coordinator . Finally, a Project Owner has ownership over the project, having the ability to delete the project as well as removing Coordinators. (adm??)

## 2. A2: Actors and User stories

> For the *Tu-Do* system, consider the actors and user stories that are presented in the following sections.

### 2.1 Actors

![Actors diagram](actors_diagram.png)

*Figure 1: Tu-Do actors.*

| **Identifier**     | **Description**                                                                                                                                                                                                  |
|--------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| User               | Basic user with very minimal access.                                                                                                                                                                             |
| Guest              | An unauthenticated user that can log-in if he already has an account, or register a new one.                                                                                                                     |
| Authenticated User | A logged-in user that is able to create new projects and accept invites to existing ones.                                                                                                                        |
| Collaborator       | An authenticated user that is part of a project. He is able to view the details of the project and be assigned tasks. His permissions within a project may vary.                                                 |
| Coordinator        | An authenticated user that has the most permissions within a project. He can manage everything related to the project and give permissions to other collaborators. May also choose to appoint a new coordinator. |
| Administrator      | A special type of authenticated user that is responsible for moderating the application. He is able to terminate user accounts and projects.                                                                     |

*Table 1: Tu-Do actors description.*

### 2.2 User Stories

#### 2.2.1 Guest

| **Identifier** | **Name**            | **Priority** | **Description**                                                                                             |
|----------------|---------------------|--------------|-------------------------------------------------------------------------------------------------------------|
| US01           | Sign-in             | high         | As a Guest, I want to authenticate into the system, so that I can access privileged information.            |
| US02           | Guest Sign-up       | high         | As a Guest, I want to register myself into the system, so that I can authenticate myself into the system.   |
| US03           | Sign-in with Google | low          | As a Guest, I want to sign-in through my Google account, so that I can authenticate myself into the system. |
| US04           | Sign-up with Google | low          | As a Guest, I want to register a new account linked to my Google account, so that I do not need to create a whole new account to use the platform. |

*Table 2: Guest user stories*

#### 2.2.2 User

| **Identifier** | **Name**                | **Priority** | **Description**                                                                                                                              |
|----------------|-------------------------|--------------|----------------------------------------------------------------------------------------------------------------------------------------------|
| US05           | See Home                | high         | As a User, I want to access the home page, so that I can see a brief presentation of the website.                                            |
| US06           | See About               | low-medium   | As a User, I want to access the about page, so that I can see a complete description of the website and its creators.                        |
| US07           | Consult Services        | high         | As a User, I want to access the services information, so that I can see the website's service                                                |
| US08           | Accept Email Invitation | medium-High  | As a User, I want to accept email invitations to projects, so that, if I accept, other users can add me to their projects as a collaborator. |
| US09           | Search | high  | As a User, I want to search the platform keywords, so that I can quickly find users and/or projects that I am looking for. |
| US10           | See FAQ | low  | As a User, I want to see the FAQ page, so that I can get answers to common questions that I might have. |
| US11           | See Contact Us | low  | As a User, I want to see the Contact Us page, so that I can know how to reach out to the owners of the website and its creators. |

*Table 3: User user stories*

#### 2.2.3 Authenticated User

| **Identifier** | **Name**                    | **Priority** | **Description**                                                                                                                           |
|----------------|-----------------------------|--------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| US12           | Project Creation            | high         | The system shouldn’t delete all of a user’s information, it should keep its participation (comments,posts,tasks done) in shared projects. |
| US13           | Logout                      | high         | Only the owner of a project can delete his project and the ownership of a project can be passed to another user                           |
| US14           | View projects               | high         | If a owner of a project deletes his account without giving up ownership of his projects, his projects will become frozen.                 |
| US15           | Delete Account              | high         | Only an Admin can reactivate a project.                                                                                                   |
| US16           | Visit/Edit user profile     | high         | Administrator accounts are independent of the user accounts. They cannot create or participate in projects.                               |
| US17           | Project Invitation managing | medium       | Tasks with a label from the notifiable category should send a notification/email some time before that tasks’ due date                    |
| US18           | Favorite Projects           | low          | As an Authenticated User, I want to favorite certain projects, so that I can have faster access to them.                                                                                                                                          |

*Table 4: Authenticated User user stories*

#### 2.2.4 Collaborator

| **Identifier** | **Name**                         | **Priority** | **Description**                                                                                                                                                             |
|----------------|----------------------------------|--------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| US19           | Task Creation                    | high         | As a Collaborator, I want to be able to create tasks, so that I can contribute to the organization of the project.                                                          |
| US20           | Task Management                  | medium       | As a Collaborator, I want to be able to manage tasks by their priority, due date and other labels, so that I can better organize them.                                      |
| US21           | Task Deletion                    | medium-high  | As a Collaborator, I want to be able to delete tasks, so that I can focus on the most important tasks.                                                                      |
| US22           | Comment on a task                | medium       | As a Collaborator, I want to be able to comment on tasks, so that I can expose its progress and share useful information about it.                                          |
| US23           | Assign users to task             | medium       | As a Collaborator, I want to have the ability to assign users to a task, so that everyone knows what it’s their responsibility.                                             |
| US24           | Consult Contacts                 | high         | As a Collaborator, I want to access the project members' contacts, so that I can come in touch with the team.                                                               |
| US25           | View Task Details                | medium       | As a Collaborator, I want to be able to view the details of each task, so that I can have access to details such as due time, priority, etc.                                |
| US26           | View Project Details             | medium       | As a Collaborator, I want to be able to view the details of the project I’m in, so that I can have access to details such as the current project coordinators/collaborators, project description and others. |
| US27           | Task Completion                  | high         | As a Collaborator, I want to be able to mark a task as completed, so that it’s known that it is already done.                                                               |
| US28           | Leave Project                    | high         | As a Collaborator, I want to be able to exit the project, so that I can better organize my chores excluding projects that I am no longer participating in.                  |
| US29           | View Team Members Profile        | medium       | As a Collaborator, I want to be able to view the team members' profiles, so that I can have access to information such as their contacts and therefore easily contact them. |
| US30           | Search Tasks                     | high         | As a Collaborator, I want to have the ability to search tasks so that I can quickly find tasks by their name, labels, due date or members assigned.                         |
| US31           | Post Messages to Project Forum   | high         | As a Collaborator, I want to be able to post messages in the project forum, so that I can communicate my progress as well as sharing issues found and helping others.       |
| US32           | View Team Project                | medium       | As a Collaborator, I want to be able to view the team project, so that I can easily find the team members and information about them.                                       |
| US33           | Browse the Project Message Forum | medium       | As a Collaborator, I want to be able to browse messages on the project forum, so that I can  find them easily.                                                              |

*Table 5: Collaborator user stories*

#### 2.2.5 Coordinator

| **Identifier** | **Name**                   | **Priority** | **Description**                                                                                                                                              |
|----------------|----------------------------|--------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------|
| US34           | Add Users to Project       | high         | As a Coordinator, I want to be able to add users to my project, so that they become collaborators.                                                          |
| US35           | Assign new coordinators    | medium-high  | As a Coordinator, I want to assign project collaborators as coordinators, so that they can help with project coordination.                                   |
| US36           | Edit Project Details       | medium       | As a Coordinator, I want to be able to edit project details, so that I can change previously defined aspects of the project.                                 |
| US37           | Assign Tasks to Members    | high         | As a Coordinator, I want to assign tasks to members, so that members know what tasks are their responsibility to complete.                                   |
| US38           | Remove project members     | medium-high  | As a Coordinator, I want to remove project members, so that I can manage the project members.                                                                |
| US39           | Archive Projects           | high         | As a Coordinator, I want to Archive projects, so that I can discard/abandon certain projects.                                                                |
| US40           | Manage members Permissions | low-medium   | As a Coordinator, I want to Manage members' permissions, so that members acquire/lose certain controls.                                                      |
| US41           | Invite to Project via email | high         | As a Coordinator, I want to invite new users to projects, so that I can add people that still aren’t users and to alert current users about the new project. |

*Table 6: Coordinator user stories*

#### 2.2.6 Administrator 

| **Identifier** | **Name**                    | **Priority** | **Description**                                                                                                                          |
|----------------|-----------------------------|--------------|------------------------------------------------------------------------------------------------------------------------------------------|
| US42           | Remove comments | high         | As an Administrator, I want to remove a comment, so that I can remove inappropriate content |
| US43           | Accept user           | high          |  As an Administrator, I want to accept the registration of a new system user, so that he can access restricted content                                |
| US44           | View projects               | high         | As an Authenticated User, I want to view all my active projects, so that I can have an overview and select one of them.                  |
| US45           | Ban user | high       |  As an Administrator, I want to ban a user from the system, so that he can no longer access restricted contents of the site |
| US46           | Manage FAQs | medium | As an Administrator, I want to manage the questions on the FAQ page, so that they can better answers the common questions that our users have. |

*Table 7: Administrator user stories*

### 2.3 Supplementary Requirements

> This section contains business rules, technical requirements and restrictions on the project.

#### 2.3.1 Business rules

| **Identifier** | **Name**                    | **Description**                                                                                                                           |
|----------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|
| BR01           | Deleted Account             | The system shouldn’t delete all of a user’s information, it should keep its participation (comments,posts,tasks done) in shared projects. |
| BR02           | Ownership of a Project      | Only the owner of a project can delete his project and the ownership of a project can be passed to another user                           |
| BR03           | Deleted Owner               | If a owner of a project deletes his account without giving up ownership of his projects, his projects will become frozen.                 |
| BR04           | Reinstating Frozen Projects | Only an Admin can reactivate a project.                                                                                                   |
| BR05           | Administrator accounts      | Administrator accounts are independent of the user accounts. They cannot create or participate in projects.                               |
| BR06           | Notifiable Tasks            | Tasks with a label from the notifiable category should send a notification/email some time before that tasks’ due date                    |

*Table 8: Tu-Do business rules*

#### 2.3.2 Technical requirements

| **Identifier** | **Name**        | **Description**                                                                                                                                                                                                                                                                                                 |
|----------------|-----------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| TR01           | Availability    | The system downtime must not add up to more than 1 day per year                                                                                                                                                                                                                                                 |
| TR02           | Accessibility   | The system must be easily accessible to everyone, independently of their web browser , device or disabilities                                                                                                                                                                                                            |
| TR03           | Customizability | It is of the utmost importance that our users can customize the system to their needs.  The system is meant to be used by a wide range of people, from just an individual making his grocery list to a large company with dozens of projects and hundreds of employees.                                         |
| TR04           | Web Application | The system should be implemented as a web application with dynamic pages (HTML5, JavaScript, CSS3 and PHP). Due to all the possible different technological backgrounds of our users, our system should be easy to get started with, without the need for installing specific software or specialized hardware. (Low entry barrier) |
| TR05           | Security        | The system must protect information from unauthorized access through the use of an authentication and verification system, as well as prevent common attack vectors (XSS, Man-In-The-Middle, CSRF, etc)                                                                                                         |
| TR06           | Scalability     | The system must be prepared to deal with the growth in the number of users and their actions                                                                                                                                                                                                                    |
| TR07           | Robustness      | The system must be prepared to handle and continue operating when runtime errors occur                                                                                                                                                                                                                          |
| TR08           | Ethics          | The system must respect the ethical principles in software development (for example, personal user details, or usage data, should not be collected nor shared without full acknowledgement and authorization from its owner)                                                                                    |
| TR09           | Performance     | The system should have response times shorter than 2 seconds to ensure the user's attention and live feedback                                                                                                                                                                                                            |

*Table 9: Tu-Do technical requirements*

#### 2.3.3 Restrictions

| **Identifier** | **Name**     | **Description**                                                                                                                                                                                                                                                                                                                              |
|----------------|--------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| C01            | Deadline     | The system must be fully functional by the end of the semester                                                                                                                                                                                                                                                                               |
| C02            | Team Limit   | The system must be developed using only the same team of 4 software developers                                                                                                                                                                                                                                                               |
| C03            | Technologies | The developer team is restricted in the technologies they are allowed to use. They must use HTML, CSS and JavaScript as client languages, PHP for server-side programming, PostgreSQL as the DBMS, Laravel as the server framework, Docker as the virtualization environment, NGINX as the web server, and Git as the version control system |

*Table 10: Tu-Do technical requirements*

---


## A3: Information Architecture

> Brief presentation of the artefact goals.


### 1. Sitemap

> Sitemap presenting the overall structure of the web application.  
> Each page must be identified in the sitemap.  
> Multiple instances of the same page (e.g. student profile in SIGARRA) are presented as page stacks.


### 2. Wireframes

> Wireframes for, at least, two main pages of the web application.
> Do not include trivial use cases.


#### UIxx: Page Name

#### UIxx: Page Name


---


## Revision history

Changes made to the first submission:
1. Item 1
1. ...

***
GROUP21gg, DD/MM/2021

* Group member 1 name, email (Editor)
* Group member 2 name, email
* ...
