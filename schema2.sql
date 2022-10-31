-- email  special data type
-- phone number  which type
-- Verificar as foreing keys se todas serao on update cascade
-- Add ON DELETE CASCADE

DROP TABLE IF EXISTS role_permission;
DROP TABLE IF EXISTS label_task;
DROP TABLE IF EXISTS label_label_class;
DROP TABLE IF EXISTS collaborator;
DROP TABLE IF EXISTS users_role;
DROP TABLE IF EXISTS notified;
DROP TABLE IF EXISTS task_moved;
DROP TABLE IF EXISTS new_assign;
DROP TABLE IF EXISTS assignmnt;
DROP TABLE IF EXISTS new_coordinator;
DROP TABLE IF EXISTS new_message;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS notification;
DROP TABLE IF EXISTS faq;
DROP TABLE IF EXISTS ban;
DROP TABLE IF EXISTS administrator;
DROP TABLE IF EXISTS permission;
DROP TABLE IF EXISTS ROLE;
DROP TABLE IF EXISTS msg;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS forum;
DROP TABLE IF EXISTS label_class;
DROP TABLE IF EXISTS label;
DROP TABLE IF EXISTS task;
DROP TABLE IF EXISTS vertical;
DROP TABLE IF EXISTS board;
DROP TABLE IF EXISTS project;
DROP TABLE IF EXISTS users;

CREATE TABLE users(
    id SERIAL PRIMARY KEY,
    username text NOT NULL CONSTRAINT username_unique UNIQUE,
    password text NOT NULL,
    name text NOT NULL,
    birth date NOT NULL CONSTRAINT CK_birth CHECK (birth < CURRENT_DATE),
    email text NOT NULL CONSTRAINT email_unique UNIQUE,
    phone_number text
);

CREATE TABLE project (
    id serial PRIMARY KEY,
    title text NOT NULL,
    description text,
    creation date NOT NULL CONSTRAINT CK_project_creation CHECK (creation <= CURRENT_DATE),
    is_archived boolean NOT NULL DEFAULT FALSE,
    id_coordinator integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE
);

CREATE TABLE board (
    id serial PRIMARY KEY,
    name text NOT NULL,
    id_project integer NOT NULL REFERENCES project (id) ON UPDATE CASCADE
);

CREATE TABLE vertical (
    id serial PRIMARY KEY,
    name text NOT NULL,
    isDone boolean NOT NULL DEFAULT FALSE,
    id_board integer NOT NULL REFERENCES board (id) ON UPDATE CASCADE
);

CREATE TABLE task (
    id serial PRIMARY KEY,
    name text NOT NULL,
    description text,
    creation_date date NOT NULL CONSTRAINT CK_task_creation_date CHECK (creation_date <= CURRENT_DATE), 
    due_date date CONSTRAINT CK_task_due_date CHECK (creation_date < due_date),
    id_vertical integer NOT NULL REFERENCES vertical (id) ON UPDATE CASCADE
);

CREATE TABLE label (
    id serial PRIMARY KEY,
    name text NOT NULL
);

CREATE TABLE label_class (
    id serial PRIMARY KEY,
    name text NOT NULL
);

CREATE TABLE forum (
    id_project integer PRIMARY KEY REFERENCES project (id) ON UPDATE CASCADE
);

CREATE TABLE post (
    id serial PRIMARY KEY,
    title text NOT NULL,
    description text, 
    id_forum integer NOT NULL REFERENCES forum (id_project) ON UPDATE CASCADE
);

CREATE TABLE msg (
    id serial PRIMARY KEY,
    msg text NOT NULL,
    sent_date date NOT NULL CONSTRAINT CK_sent_date CHECK (sent_date <= CURRENT_DATE),
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE,
    id_post integer NOT NULL REFERENCES post (id) ON UPDATE CASCADE
);

CREATE TABLE ROLE (
    id serial PRIMARY KEY,
    name text NOT NULL,
    id_project integer NOT NULL REFERENCES project (id) ON UPDATE CASCADE
);

CREATE TABLE permission (
    id serial PRIMARY KEY,
    name text NOT NULL
);

CREATE TABLE administrator (
    id serial PRIMARY KEY,
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE
);

CREATE TABLE ban (
    id serial PRIMARY KEY,
    start_date date NOT NULL,
    end_date date NOT NULL CONSTRAINT CK_ban_interval CHECK (start_date <= end_date),
    reason text,
    id_administrator integer NOT NULL REFERENCES administrator (id) ON UPDATE CASCADE,
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE
);

CREATE TABLE faq (
    id serial PRIMARY KEY,
    question text NOT NULL CONSTRAINT question_unique UNIQUE,
    answer text NOT NULL
);

CREATE TABLE notification (
    id serial PRIMARY KEY,
    sent_date date NOT NULL CONSTRAINT CK_notification_date CHECK (sent_date <= CURRENT_DATE),
    msg text NOT NULL
);

CREATE TABLE comment (
    id serial PRIMARY KEY,
    msg text NOT NULL,
    sent_date date NOT NULL CONSTRAINT CK_comment_sent_date CHECK (sent_date <= CURRENT_DATE),
    id_task integer NOT NULL REFERENCES task (id),
    id_users integer NOT NULL REFERENCES users (id)
);

CREATE TABLE new_message (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE,
    id_message integer REFERENCES msg (id) ON UPDATE CASCADE
);

CREATE TABLE new_coordinator (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE,
    id_project integer REFERENCES project (id) ON UPDATE CASCADE
);

CREATE TABLE assignmnt (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE,
    assign_date date NOT NULL CONSTRAINT CK_assign_date CHECK (assign_date <= CURRENT_DATE),
    PRIMARY KEY (id_users, id_task)
);

CREATE TABLE new_assign (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE,
	id_users integer,
	id_task integer,
    CONSTRAINT FK_Assign FOREIGN KEY (id_users, id_task) REFERENCES assignmnt (id_users, id_task) ON UPDATE CASCADE
);

CREATE TABLE task_moved (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE
);

CREATE TABLE notified (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_notification integer REFERENCES notification (id) ON UPDATE CASCADE,
    is_read boolean NOT NULL DEFAULT FALSE,
    PRIMARY KEY (id_users, id_notification)
);

CREATE TABLE users_role (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_role integer REFERENCES ROLE (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_users, id_role)
);

CREATE TABLE collaborator (
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_project integer REFERENCES project (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_users, id_project)
);

CREATE TABLE label_label_class (
    id_label integer REFERENCES label (id) ON UPDATE CASCADE,
    id_label_class integer REFERENCES label_class (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_label, id_label_class)
);

CREATE TABLE label_task (
    id_label integer REFERENCES label (id) ON UPDATE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_label, id_task)
);

CREATE TABLE role_permission (
    id_role integer REFERENCES ROLE (id) ON UPDATE CASCADE,
    id_permission integer REFERENCES permission (id) ON UPDATE CASCADE,
    PRIMARY KEY (id_role, id_permission)
);


-- --------------------------
-- INDEXES
-- -------------------------

-- Get the projects of a user
CREATE INDEX user_projects_index ON collaborator USING hash (id_users);
-- CLUSTER collaborator USING user_projects_index;

-- Get the comments on a task
CREATE INDEX task_comments_index ON comment USING hash (id_task);
-- CLUSTER comment USING task_comments_index;

-- Get the task of a certain column
CREATE INDEX column_tasks_index ON task USING hash (id_vertical);
-- CLUSTER task USING column_tasks_index;

-- Get the verticals of a certain board
CREATE INDEX board_verticals_index ON vertical USING hash (id_board);
-- CLUSTER vertical USING board_verticals_index;

-- Get the boards of a certain project
CREATE INDEX project_boards_index ON board USING hash (id_project);
-- CLUSTER board USING project_boards_index;

-- Get the labels of a certain task
CREATE INDEX task_labels_index ON label_task USING hash (id_task);
-- CLUSTER task USING column_tasks_index;

-- Get users notifications
CREATE INDEX user_notifications_index ON notified USING hash (id_users);
--CLUSTER notification USING notification_date_index;

-- Organize notifications by sent date
CREATE INDEX notifications_date_index ON notification USING btree (sent_date);

-- CREATE INDEX username_index ON users USING btree (username);
-- Create an Index and Cluster for every chat (name) usado para ordenar chats pelo seu nome
-- CREATE INDEX chat_index ON chat USING btree (name);
--CLUSTER chat USING chat_index;  MAYBE NOT A GOOD IDEA BECAUSE OF HIGH UPDATE FREQUENCY 

-- Create an Index and Cluster for every message (date) usado para ordenar msgs por data de envio
-- CREATE INDEX msg_index ON msg USING btree (sent_date);
--CLUSTER msg USING msg_index;


-- CREATE INDEX task_name_index ON task USING btree (name);

-- CREATE INDEX project_name_index ON project USING btree (title);

-- CREATE INDEX label_index ON label USING btree (name);

-- --------------------------
-- TRIGGERS
-- -------------------------
DROP FUNCTION IF EXISTS issue_ban();
CREATE FUNCTION issue_ban() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM administrator WHERE id_users IN (SELECT id_users AS banned_id FROM ban WHERE NEW.id = id)) THEN
        RAISE EXCEPTION 'Cannot ban an administrator'; 
END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER issue_ban
    BEFORE INSERT OR UPDATE ON ban
    FOR EACH ROW
    EXECUTE PROCEDURE issue_ban();


DROP FUNCTION IF EXISTS notify_assignment();
CREATE FUNCTION notify_assignment() RETURNS TRIGGER AS
$BODY$
DECLARE 
	id_notf INTEGER;
BEGIN
        INSERT INTO notification(sent_date, msg)
        VALUES (current_date, 'You have been assigned a new task.') RETURNING id INTO id_notf;
        INSERT INTO new_assign(id_notification, id_users, id_task)
        VALUES (id_notf, NEW.id_users, NEW.id_task);
        INSERT INTO notified(id_users, id_notification)
        VALUES (NEW.id_users, id_notf);
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER notify_assignment
    AFTER INSERT OR UPDATE ON assignmnt
    FOR EACH ROW
    EXECUTE PROCEDURE notify_assignment();

--2.0
DROP FUNCTION IF EXISTS issue_ban();
CREATE FUNCTION issue_ban() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM administrator WHERE id_users IN (SELECT id_users AS banned_id FROM ban WHERE NEW.id = id)) THEN
        RAISE EXCEPTION 'Cannot ban an administrator'; 
END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER issue_ban
    BEFORE INSERT OR UPDATE ON ban
    FOR EACH ROW
    EXECUTE PROCEDURE issue_ban();


DROP FUNCTION IF EXISTS notify_assignment();
CREATE FUNCTION notify_assignment() RETURNS TRIGGER AS
$BODY$
DECLARE 
    id_notf INTEGER;
BEGIN
        INSERT INTO notification(sent_date, msg)
        VALUES (current_date, 'You have been assigned a new task.') RETURNING id INTO id_notf;
        INSERT INTO new_assign(id_notification, id_users, id_task)
        VALUES (id_notf, NEW.id_users, NEW.id_task);
        INSERT INTO notified(id_users, id_notification)
        VALUES (NEW.id_users, id_notf);
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER notify_assignment
    AFTER INSERT OR UPDATE ON assignmnt
    FOR EACH ROW
    EXECUTE PROCEDURE notify_assignment();