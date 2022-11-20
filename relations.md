## Project

- Has One Coordinator
- Belongs to Many Collaborators
- Has Many Boards
- Has One Forum
- Has many Roles

## Board

- Belongs to a **Project**
- Has many **Verticals**

## Forum 

- Belongs to a **Project**
- Has Many **Posts**

## Post

- Belongs TO a Forum
- Has Many **msgs**
- Post Belongs to a user
## MSG

- Belongs To a Post
- Belongs To an Author

## User

- Belongs to Many Projects  
- HasMany Project -> coordinator
- Belongs to many tasks 
- Has Many **MSGS**
- Has Many Posts
- Has Many Bans
- Belongs to many roles

## Label

- Belongs TO Many Task
- Belongs To Many LabelClasses

## LabelClass 

- Belongs To Many Label

## Task

- Belongs to a **Vertical**
- Belongs to many **Label**
- Has Many **Comment**
- Belons to Many **User**

## Vertical 
- Belongs to **Board**
- Has Many **Tasks**

## Comment 
- Belongs To a Task
- Should belong to a user ainda não está feito

## Administrator 

- Has One User
- Has Many Bans

## Role 

- Belongs to a project
- Belongs to many users
- Belongs to many permission
## Ban
- Belongs to admin
- Belongs to user

## Permission
- Belongs to many roles
# Missing In Action

## New Assignment
## New Coordinator
## New Message
## Notification
## TaskMoved
## Assignment

## FAQ
