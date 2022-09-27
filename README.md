# ER: Requirements Specification Component

## A1: Tu-Do

## Goals, business context and environment.  

The main goal of *Tu-Do* project is to provide a complete , easy
and interactive environment 
for project management. This tool can be used for any kind of
project from software development to meal 
prepping for the month as well as house chores! 

It offers text forums so that the manager and team members can
communicate easily.

The project Stakeholders can range from the common user with small but yet meaningful projects 
without a team. To enterprise level teams with big projects in need of specialized tasks as well as  
user-defined labeling,scheduling as well as  group/all chats.

### Main features.  

- Create an account 
- Searching for tasks and projects by severall criteria
- Searching for friend's profiles
- Searching chats/group chats
- Editing/personalizing your profile 
- Adding Friends 
- Creating/managing projects 
- Participate in other users projects 
- Invite other users to your project.
- Create Tasks with descriptions due dates and assignees 
- Alter task status
- Receive e-mail notifications about due-dates.


### User profiles.

We count on having 6 types of users:
1. **Guest**: a user who as yet created an account but can still be invited to 
participate on a project.
2. **Authenticated User**: a user who has an account
3. **Collaborator**: an Authenticated User user who is participating on someone else's project
4. **Coordinator**: a collaborator with special permissions to invite/remove users into/from the project, 
delete tasks created by other users.
5.**Project Owner**: has ownership over the project, having the ability to delete the project 
has well as removing coordinators.
6.**Administrator**

---


## 2. A2: Actors and User stories

> For the *Tu-Do* system, consider the user stories that are presented in the following sections.

### 2.1 Actors

![Actors diagram] (NEED TO ADD IMAGE)
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

*Table 2: Guest user stories*

#### 2.2.2 User

| **Identifier** | **Name**                | **Priority** | **Description**                                                                                                                              |
|----------------|-------------------------|--------------|----------------------------------------------------------------------------------------------------------------------------------------------|
| USXX           | See Home                | high         | As a User, I want to access the home page, so that I can see a brief presentation of the website.                                            |
| USXX           | See About               | Low-medium   | As a User, I want to access the about page, so that I can see a complete description of the website and its creators.                        |
| USXX           | Consult Services        | high         | As a User, I want to access the services information, so that I can see the website's service                                                |
| USXX           | Accept Email Invitation | Medium-High  | As a User, I want to accept email invitations to projects, so that, if I accept, other users can add me to their projects as a collaborator. |

*Table 3: User user stories*

#### 2.2.3 Authenticated User

| **Identifier** | **Name**                    | **Priority** | **Description**                                                                                                                          |
|----------------|-----------------------------|--------------|------------------------------------------------------------------------------------------------------------------------------------------|
| USXX           | Project Creation            | high         | As an Authenticated User, I want to be able to create a project, so that I can define tasks needed to accomplish it and centralize them. |
| USXX           | Favorite Projects           | low          | As an Authenticated User, I want to favorite certain projects, so that I can have faster access to them.                                 |
| USXX           | View projects               | high         | As an Authenticated User, I want to view all my active projects, so that I can have an overview and select one of them.                  |
| USXX           | Project Invitation managing | medium       | As an Authenticated User, I want to manage my project invitations, so that I can accept/reject invitations according to my preferences.  |
| USXX           | Logout                      | high         | As an Authenticated User, I want to Logout of the system, so that my session terminates and no one can have access during my absence.    |

*Table 4: Authenticated User user stories*

#### 2.2.4 Collaborator

| **Identifier** | **Name**                         | **Priority** | **Description**                                                                                                                                                             |
|----------------|----------------------------------|--------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| USXX           | Task Creation                    | high         | As a Collaborator, I want to be able to create tasks, so that I can contribute to the organization of the project.                                                          |
| USXX           | Task Management                  | medium       | As a Collaborator, I want to be able to manage tasks by their priority, due date and other labels, so that I can better organize them.                                      |
| USXX           | Task Deletion                    | medium-high  | As a Collaborator, I want to be able to delete tasks, so that I can focus on the most important tasks.                                                                      |
| USXX           | Comment on a task                | medium       | As a Collaborator, I want to be able to comment on tasks, so that I can expose its progress and share useful information about it.                                          |
| USXX           | Assign users to task             | medium       | As a Collaborator, I want to have the ability to assign users to a task, so that everyone knows what it’s their responsibility.                                             |
| USXX           | Consult Contacts                 | high         | As a Collaborator, I want to access the project members' contacts, so that I can come in touch with the team.                                                               |
| USXX           | View Task Details                | medium       | As a Collaborator, I want to be able to view the details of each task, so that I can have access to details such as due time, priority, etc.                                |
| USXX           | Task Completion                  | high         | As a Collaborator, I want to be able to mark a task as completed, so that it’s known that it is already done.                                                               |
| USXX           | Leave Project                    | high         | As a Collaborator, I want to be able to exit the project, so that I can better organize my chores excluding projects that I am no longer participating in.                  |
| USXX           | View Team Members Profile        | medium       | As a Collaborator, I want to be able to view the team members' profiles, so that I can have access to information such as their contacts and therefore easily contact them. |
| USXX           | Search Tasks                     | high         | As a Collaborator, I want to have the ability to search tasks so that I can quickly find tasks by their name, labels, due date or members assigned.                         |
| USXX           | Post Messages to Project Forum   | high         | As a Collaborator, I want to be able to post messages in the project forum, so that I can communicate my progress as well as sharing issues found and helping others.       |
| USXX           | View Team Project                | medium       | As a Collaborator, I want to be able to view the team project, so that I can easily find the team members and information about them.                                       |
| USXX           | Browse the Project Message Forum | medium       | As a Collaborator, I want to be able to browse messages on the project forum, so that I can  find them easily.                                                              |

*Table 5: Collaborator user stories*

#### 2.2.5 Coordinator

| **Identifier** | **Name**                   | **Priority** | **Description**                                                                                                                                              |
|----------------|----------------------------|--------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------|
| USXX           | Add Users to Project       | high         | As a Coordinator, I want to be able to add users to my project, so that they become collaborators..                                                          |
| USXX           | Assign new coordinators    | medium-high  | As a Coordinator, I want to assign project collaborators as coordinators, so that they can help with project coordination.                                   |
| USXX           | Edit Project Details       | medium       | As a Coordinator, I want to be able to edit project details, so that I can change previously defined aspects of the project.                                 |
| USXX           | Assign Tasks to Members    | high         | As a Coordinator, I want to assign tasks to members, so that members know what tasks are their responsibility to complete.                                   |
| USXX           | Remove project members     | medium-high  | As a Coordinator, I want to remove project members, so that I can manage the project members.                                                                |
| USXX           | Archive Projects           | high         | As a Coordinator, I want to Archive projects, so that I can discard/abandon certain projects.                                                                |
| USXX           | Manage members Permissions | low-medium   | As a Coordinator, I want to Manage members' permissions, so that members acquire/lose certain controls.                                                      |
| USXX           | Invite to Project via email | high         | As a Coordinator, I want to invite new users to projects, so that I can add people that still aren’t users and to alert current users about the new project. |

*Table 6: Coordinator user stories*

### 2.3 Supplementary Requirements

> This section contains business rules, technical requirements and restrictions on the project.

#### 2.3.1 Business rules

#### 2.3.2 Technical requirements

| **Identifier** | **Name**        | **Description**                                                                                                                                                                                                                                                                                                 |
|----------------|-----------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| TR01           | Availability    | The system downtime must not add up to more than 1 day per year                                                                                                                                                                                                                                                 |
| TR02           | Accessibility   | The system must be easily accessible to everyone, independently of their web browser or disabilities                                                                                                                                                                                                            |
| TR03           | Customizability | It is of the utmost importance that our users can customize the system to their needs.  The system is meant to be used by a wide range of people, from just an individual making his grocery list to a large company with dozens of projects and hundreds of employees.                                         |
| TR04           | Web Application | The system should be implemented as a web application with dynamic pages (HTML5, JavaScript, CSS3 and PHP). Due to all the possible different technological backgrounds of our users, our system should be easy to get started with, without the need for installing specific software or specialized hardware. |
| TR05           | Security        | The system must protect information from unauthorized access through the use of an authentication and verification system, as well as prevent common attack vectors (XSS, Man-In-The-Middle, CSRF, etc)                                                                                                         |
| TR06           | Scalability     | The system must be prepared to deal with the growth in the number of users and their actions                                                                                                                                                                                                                    |
| TR07           | Robustness      | The system must be prepared to handle and continue operating when runtime errors occur                                                                                                                                                                                                                          |
| TR08           | Ethics          | The system must respect the ethical principles in software development (for example, personal user details, or usage data, should not be collected nor shared without full acknowledgement and authorization from its owner)                                                                                    |
| TR09           | Performance     | The system should have response times shorter than 2 seconds to ensure the user's attention                                                                                                                                                                                                                     |

*Table 8: Tu-Do technical requirements*

#### 2.3.3 Restrictions

| **Identifier** | **Name**     | **Description**                                                                                                                                                                                                                                                                                                                              |
|----------------|--------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| C01            | Deadline     | The system must be fully functional by the end of the semester                                                                                                                                                                                                                                                                               |
| C02            | Team Limit   | The system must be developed using only the same team of 4 software developers                                                                                                                                                                                                                                                               |
| C03            | Technologies | The developer team is restricted in the technologies they are allowed to use. They must use HTML, CSS and JavaScript as client languages, PHP for server-side programming, PostgreSQL as the DBMS, Laravel as the server framework, Docker as the virtualization environment, NGINX as the web server, and Git as the version control system |

*Table 9: Tu-Do technical requirements*

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
