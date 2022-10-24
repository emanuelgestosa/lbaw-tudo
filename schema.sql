-- email  special data type
-- phone number  which type
-- Verificar as foreing keys se todas serao on update cascade
-- Add ON DELETE CASCADE

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id serial PRIMARY KEY,
    username text NOT NULL CONSTRAINT username_unique UNIQUE,
    password text NOT NULL,
    name text NOT NULL,
    birth date NOT NULL CONSTRAINT CK_birth CHECK (birth < CURRENT_DATE),
    email text NOT NULL CONSTRAINT email_unique UNIQUE,
    phone_number text
);

DROP TABLE IF EXISTS project;
CREATE TABLE project (
    id serial PRIMARY KEY,
    title text NOT NULL,
    description text,
    creation date NOT NULL CONSTRAINT CK_project_creation CHECK (creation <= CURRENT_DATE),
    is_archived boolean NOT NULL DEFAULT FALSE,
    id_coordinator integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS board;
CREATE TABLE board (
    id serial PRIMARY KEY,
    name text NOT NULL,
    id_project integer NOT NULL REFERENCES project (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS COLUMN;
CREATE TABLE COLUMN (
    id serial PRIMARY KEY,
    name text NOT NULL,
    id_board integer NOT NULL REFERENCES board (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS task;
CREATE TABLE task (
    id serial PRIMARY KEY,
    name text NOT NULL,
    description text,
    creation_date date NOT NULL CONSTRAINT CK_task_creation_date CHECK (creation_date <= CURRENT_DATE), ,
    due_date date CONSTRAINT CK_task_due_date CHECK (creation_date < due_date),
    id_column integer NOT NULL REFERENCES COLUMN (id) ON UPDATE CASCADE
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
    id_project integer PRIMARY KEY REFERENCES project (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS chat;
CREATE TABLE chat (
    id serial PRIMARY KEY,
    name text NOT NULL
    id_forum integer NOT NULL REFERENCES forum (id_project) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS message;
CREATE TABLE message (
    id serial PRIMARY KEY,
    message text NOT NULL,
    sent_date date NOT NULL CONSTRAINT CK_sent_date CHECK (sent_date <= CURRENT_DATE),
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE,
    id_chat integer NOT NULL REFERENCES chat (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS ROLE;
CREATE TABLE ROLE (
    id serial PRIMARY KEY,
    name text NOT NULL,
    id_project integer NOT NULL REFERENCES project (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS permission;
CREATE TABLE permission (
    id serial PRIMARY KEY,
    name text NOT NULL,
);

DROP TABLE IF EXISTS administrator;
CREATE TABLE administrator (
    id serial PRIMARY KEY,
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS ban;
CREATE TABLE ban (
    id serial PRIMARY KEY,
    start_date date NOT NULL,
    end_date date NOT NULL CONSTRAINT CK_ban_interval CHECK (start_date <= end_date),
    reason text,
    id_administrator integer NOT NULL REFERENCES administrator (id) ON UPDATE CASCADE,
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE,
);

DROP TABLE IF EXISTS faq;
CREATE TABLE faq (
    id serial PRIMARY KEY,
    question text NOT NULL CONSTRAINT question_unique UNIQUE,
    answer text NOT NULL
);

DROP TABLE IF EXISTS notification;
CREATE TABLE notification (
    id serial PRIMARY KEY,
    sent_date date NOT NULL CONSTRAINT CK_notification_date CHECK (sent_date <= CURRENT_DATE),
    message text NOT NULL
);

DROP TABLE IF EXISTS comment;
CREATE TABLE comment (
    id serial PRIMARY KEY,
    message text NOT NULL
    sent_date date NOT NULL CONSTRAINT CK_comment_sent_date CHECK (sent_date <= CURRENT_DATE),
    id_task integer NOT NULL,
    id_users integer NOT NULL
);

DROP TABLE IF EXISTS new_message;
CREATE TABLE new_message (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE,
    id_message integer REFERENCES message (id) ON UPDATE CASCADE,
);

DROP TABLE IF EXISTS new_coordinator;
CREATE TABLE new_coordinator (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE,
    id_project integer REFERENCES project (id) ON UPDATE CASCADE,
);

DROP TABLE IF EXISTS new_assign;
CREATE TABLE new_assign (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE,
    id_assignment integer REFERENCES assignment (id) ON UPDATE CASCADE,
);

DROP TABLE IF EXISTS task_moved;
CREATE TABLE task_moved (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE,
);

DROP TABLE IF EXISTS assignment;
CREATE TABLE assignment (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE,
    assign_date date NOT NULL CONSTRAINT CK_assign_date CHECK (assign_date <= CURRENT_DATE),
    PRIMARY KEY (id_users, id_task)
);

DROP TABLE IF EXISTS notified;
CREATE TABLE notified (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_notification integer REFERENCES notification (id) ON UPDATE CASCADE,
    is_read boolean NOT NULL DEFAULT FALSE,
    PRIMARY KEY (id_users, id_notification)
);

DROP TABLE IF EXISTS users_role;
CREATE TABLE users_role (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_role integer REFERENCES ROLE (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_users, id_role)
);

DROP TABLE IF EXISTS collaborator;
CREATE TABLE collaborator (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_project integer REFERENCES project (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_users, id_project)
);

DROP TABLE IF EXISTS label_label_class;
CREATE TABLE label_label_class (
    id_label integer REFERENCES label (id) ON UPDATE CASCADE,
    id_label_class integer REFERENCES label_class (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_label, id_label_class)
);

DROP TABLE IF EXISTS label_task;
CREATE TABLE label_task (
    id_label integer REFERENCES label (id) ON UPDATE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_label, id_task)
);

DROP TABLE IF EXISTS role_permission;
CREATE TABLE role_permission (
    id_role integer REFERENCES ROLE (id) ON UPDATE CASCADE,
    id_permission integer REFERENCES permission (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_role, id_permission)
);
