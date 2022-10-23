-- email  special data type
-- phone number  which type
-- Verificar as foreing keys se todas serao on update cascade


DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id serial PRIMARY KEY,
    user_name text NOT NULL CONSTRAINT user_name_unique UNIQUE,
    birth date NOT NULL,
    email text NOT NULL CONSTRAINT email_unique UNIQUE,
    phone_number text
);

DROP TABLE IF EXISTS project;
CREATE TABLE project (
    id serial PRIMARY KEY,
    title text NOT NULL,
    description text,
    creation date,
    is_archived boolean NOT NULL,
    id_coordinator integer REFERENCES users (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS board;
CREATE TABLE board (
    id serial PRIMARY KEY,
    name text NOT NULL,
    id_project integer REFERENCES project (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS COLUMN;
CREATE TABLE COLUMN (
    id serial PRIMARY KEY,
    name text NOT NULL,
    id_board integer REFERENCES board (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS task;
CREATE TABLE task (
    id serial PRIMARY KEY,
    name text NOT NULL,
    description text,
    creation_date date,
    due_date date,
    id_column integer REFERENCES COLUMN (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS label;
CREATE TABLE label (
    id serial PRIMARY KEY,
    name text NOT NULL,
);

DROP TABLE IF EXISTS label_class;
CREATE TABLE label_class (
    id serial PRIMARY KEY,
    name text NOT NULL,
);

DROP TABLE IF EXISTS forum;
CREATE TABLE forum (
    id serial PRIMARY KEY,
    id_project integer REFERENCES project (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS chat;
CREATE TABLE chat (
    id serial PRIMARY KEY,
    name text NOT NULL
);

DROP TABLE IF EXISTS message;
CREATE TABLE message (
    id serial PRIMARY KEY,
    message text,
    sent_date date NOT NULL,
    id_users integer REFERENCES users (id) ON UPDATE CASCADE id_chat integer REFERENCES chat (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS ROLE;
CREATE TABLE ROLE (
    id serial PRIMARY KEY,
    name text,
    id_project integer REFERENCES project (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS permission;
CREATE TABLE permission (
    id serial PRIMARY KEY,
    name text,
    id_role integer REFERENCES ROLE (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS administrator;
CREATE TABLE administrator (
    id serial PRIMARY KEY,
    id_users integer REFERENCES users (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS ban;
CREATE TABLE ban (
    id serial PRIMARY KEY,
    start_date date,
    end_date date,
    reason text,
    id_administrator integer REFERENCES administrator (id) ON UPDATE CASCADE,
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
);

DROP TABLE IF EXISTS faq;
CREATE TABLE faq (
    id serial PRIMARY KEY,
    question text NOT NULL,
    answer text NOT NULL
);

DROP TABLE IF EXISTS assignment;
CREATE TABLE assignment (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_users, id_task)
);

DROP TABLE IF EXISTS notification;
CREATE TABLE notification (
    id serial PRIMARY KEY,
    sent_date date NOT NULL message text NOT NULL
);

DROP TABLE IF EXISTS new_message;
CREATE TABLE new_message (
    id_notification integer REFERENCES notification (id) ON UPDATE CASCADE,
    id_message integer REFERENCES message (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_notification, id_message)
);

DROP TABLE IF EXISTS new_coordinator;
CREATE TABLE new_coordinator (
    id_notification integer REFERENCES notification (id) ON UPDATE CASCADE,
    id_project integer REFERENCES project (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_notification, id_project)
);

DROP TABLE IF EXISTS new_assign;
CREATE TABLE new_assign (
    id_notification integer REFERENCES notification (id) ON UPDATE CASCADE,
    id_assignment integer REFERENCES assignment (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_notification, id_assignment)
);

DROP TABLE IF EXISTS task_moved;
CREATE TABLE task_moved (
    id_notification integer REFERENCES notification (id) ON UPDATE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_notification, id_task)
);

DROP TABLE IF EXISTS notified;
CREATE TABLE notified (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_notification integer REFERENCES notification (id) ON UPDATE CASCADE,
    is_read boolean DEFAULT FALSE,
    PRIMARY KEY (id_users, id_notification)
);


-- 22 tables

user_role(id_user->user, id_role->role)
collaborator(id_user->user, id_project->project, favorite NN DF false) 
label_label_class(id_label ->label, id_label_class -> label_class)
label_task(id_label->label, id_task->task)
role_permission(id_role -> role, id_permission -> permission)


