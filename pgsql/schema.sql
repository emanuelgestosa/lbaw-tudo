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
DROP TABLE IF EXISTS forum CASCADE;
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
id_coordinator integer REFERENCES users (id) ON UPDATE CASCADE
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
CREATE INDEX user_projects_index ON collaborator USING HASH (id_users);

-- CLUSTER collaborator USING user_projects_index;
-- Get the comments on a task
CREATE INDEX task_comments_index ON comment USING HASH (id_task);

-- CLUSTER comment USING task_comments_index;
-- Get the task of a certain column
CREATE INDEX column_tasks_index ON task USING HASH (id_vertical);

-- CLUSTER task USING column_tasks_index;
-- Get the verticals of a certain board
CREATE INDEX board_verticals_index ON vertical USING HASH (id_board);

-- CLUSTER vertical USING board_verticals_index;
-- Get the boards of a certain project
CREATE INDEX project_boards_index ON board USING HASH (id_project);

-- CLUSTER board USING project_boards_index;
-- Get the labels of a certain task
CREATE INDEX task_labels_index ON label_task USING HASH (id_task);

-- CLUSTER task USING column_tasks_index;
-- Get users notifications
CREATE INDEX user_notifications_index ON notified USING HASH (id_users);

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
--Projetos(Nome do Projeto,descricao do projeto),Tasks(Nome da Task,descricao), Users(username,Nome), Labels(Nome)
--------------------------------------------------------------------------------------------------------------
--                          Full Text Search
--------------------------------------------------------------------------------------------------------------
---         User Search         ---
ALTER TABLE users
    ADD COLUMN tsvectors TSVECTOR;

-- Create a function to automatically update ts_vectors on update or on insert
CREATE OR REPLACE FUNCTION users_search_update ()
    RETURNS TRIGGER
    AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = (setweight(to_tsvector('english', NEW.username), 'A') || setweight(to_tsvector('english', NEW.name), 'B'));
    END IF;
    IF TG_OP = 'UPDATE' THEN
        IF (NEW.name <> OLD.name) || (NEW.username <> OLD.username) THEN
            NEW.tsvectors = (setweight(to_tsvector('english', NEW.username), 'A') || setweight(to_tsvector('english', NEW.name), 'B'));
        END IF;
    END IF;
    RETURN NEW;
END;
$$
LANGUAGE plpgsql;

-- Create a trigger before insert or update on work.
CREATE TRIGGER users_search_update_trigger
    BEFORE INSERT OR UPDATE ON users
    FOR EACH ROW
    EXECUTE PROCEDURE users_search_update ();

-- Finally, create a GIN index for ts_vectors.
DROP INDEX IF EXISTS search_users_idx;
CREATE INDEX search_users_idx ON users USING GIN (tsvectors);

---         Project Search        ---
ALTER TABLE project
    ADD COLUMN tsvectors TSVECTOR;

CREATE OR REPLACE FUNCTION project_search_update ()
    RETURNS TRIGGER
    AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = (setweight(to_tsvector('english', NEW.title), 'A') || setweight(to_tsvector('english', NEW.description), 'B'));
    END IF;
    IF TG_OP = 'UPDATE' THEN
        IF (NEW.title <> OLD.title) OR (NEW.description <> OLD.description) THEN
            NEW.tsvectors = (setweight(to_tsvector('english', NEW.title), 'A') || setweight(to_tsvector('english', NEW.description), 'B'));
        END IF;
    END IF;
    RETURN NEW;
END;
$$
LANGUAGE plpgsql;

-- Create a trigger before insert or update on project
CREATE TRIGGER project_search_update_trigger
    BEFORE INSERT OR UPDATE ON project
    FOR EACH ROW
    EXECUTE PROCEDURE project_search_update ();

DROP INDEX IF EXISTS search_project_idx;
CREATE INDEX search_project_idx ON project USING GIN (tsvectors);

---         Task Search         ---
ALTER TABLE task
    ADD COLUMN tsvectors TSVECTOR;

CREATE OR REPLACE FUNCTION task_search_update ()
    RETURNS TRIGGER
    AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = (setweight(to_tsvector('english', NEW.name), 'A') || setweight(to_tsvector('english', coalesce(NEW.description, '')), 'B'));
    END IF;
    IF TG_OP = 'UPDATE' THEN
        IF (NEW.name<> OLD.name) OR (NEW.description <> OLD.description) THEN
            NEW.tsvectors = (setweight(to_tsvector('english', NEW.name), 'A') || setweight(to_tsvector('english', coalesce(NEW.description, '')), 'B'));
        END IF;
    END IF;
    RETURN NEW;
END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER task_search_update_trigger
    BEFORE INSERT OR UPDATE ON task
    FOR EACH ROW
    EXECUTE PROCEDURE task_search_update ();

DROP INDEX IF EXISTS search_task_idx;

CREATE INDEX search_task_idx ON task USING GIN (tsvectors);

---         Label Search           ----
ALTER TABLE LABEL
    ADD COLUMN tsvectors TSVECTOR;

CREATE OR REPLACE FUNCTION label_search_update ()
    RETURNS TRIGGER
    AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = to_tsvector('english', NEW.name);
    END IF;
    IF TG_OP = 'UPDATE' THEN
        IF NEW.name <> OLD.name THEN
            NEW.tsvectors = to_tsvector('english', NEW.name);
        END IF;
    END IF;
    RETURN NEW;
END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER label_search_update_trigger
    BEFORE INSERT OR UPDATE ON label
    FOR EACH ROW
    EXECUTE PROCEDURE label_search_update ();

DROP INDEX IF EXISTS search_label_idx;
CREATE INDEX search_label_idx ON label USING GIN (tsvectors);

-- --------------------------
-- TRIGGERS
-- -------------------------
DROP FUNCTION IF EXISTS send_message() CASCADE;
CREATE FUNCTION send_message() RETURNS TRIGGER AS
$BODY$
BEGIN
IF EXITS (select * from users join collaborator on (users.id = collaborator.id_users) join project on (collaborator.id_project = project.id)
 where (users.id = NEW.id_users) AND (NEW.id_post = project.id)) THEN
    return new;
END IF;
    RAISE EXCEPTION 'User does not have access to chat';
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER send_message
BEFORE INSERT OR UPDATE ON msg
FOR EACH ROW
EXECUTE PROCEDURE send_message();

DROP FUNCTION IF EXISTS issue_ban() CASCADE;
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


DROP FUNCTION IF EXISTS notify_assignment() CASCADE;
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

DROP FUNCTION IF EXISTS notify_new_coordinator() CASCADE;
CREATE FUNCTION notify_new_coordinator() RETURNS TRIGGER AS
$BODY$
DECLARE 
id_notf INTEGER;
BEGIN
    INSERT INTO notification(sent_date, msg)
    VALUES (current_date, 'One of your projects has a new coordinator') RETURNING id INTO id_notf;
    INSERT INTO new_coordinator(id_notification, id_project)
    VALUES (id_noft, NEW.id);
    INSERT INTO notified(id_users, id_notification)
        SELECT id_users, id AS id_notification FROM collaborator CROSS JOIN notification WHERE id_project = NEW.id AND id = id_notf;
RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER notify_new_coordinator
AFTER UPDATE ON project
FOR EACH ROW
EXECUTE PROCEDURE notify_new_coordinator();

DROP FUNCTION IF EXISTS notify_moved_task() CASCADE;
CREATE FUNCTION notify_moved_task() RETURNS TRIGGER AS
$BODY$
DECLARE 
id_notf INTEGER;
BEGIN
IF NOT EXISTS (SELECT * FROM task WHERE id = NEW.id AND id_vertical = NEW.id_vertical) THEN
    INSERT INTO notification(sent_date, msg)
    VALUES (current_date, 'A task you are assigned to has been moved') RETURNING id INTO id_notf;
    INSERT INTO task_moved(id_notification, id_task)
    VALUES (id_noft, NEW.id);
    INSERT INTO notified(id_users, id_notification)
        SELECT id_users, id AS id_notification FROM assignmnt CROSS JOIN notification WHERE id = id_notf AND id_task = NEW.id;
END IF;
RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER notify_moved_task
BEFORE UPDATE ON task
FOR EACH ROW
EXECUTE PROCEDURE notify_moved_task();

DROP FUNCTION IF EXISTS notify_message() CASCADE;
CREATE FUNCTION notify_message() RETURNS TRIGGER AS
$BODY$
DECLARE 
id_notf INTEGER;
BEGIN
    INSERT INTO notification(sent_date, msg)
    VALUES (current_date, 'You have received a new message.') RETURNING id INTO id_notf;
    INSERT INTO new_message(id_notification, id_message)
    VALUES (id_notf, NEW.id);
    INSERT INTO notified(id_users, id_notification)
        SELECT id_users, id AS id_notification FROM collaborator CROSS JOIN notification WHERE id_project IN (SELECT id_forum FROM chat WHERE id IN (SELECT id_forum FROM message WHERE NEW.id = id)) AND id = id_notf;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER notify_message
    AFTER INSERT ON msg
    FOR EACH ROW
    EXECUTE PROCEDURE notify_message();

DROP FUNCTION IF EXISTS archive_project() CASCADE;
CREATE FUNCTION archive_project() RETURNS TRIGGER AS
$BODY$
BEGIN
        UPDATE project 
        SET is_archived = true,
            id_coordinator = null
        WHERE id IN (SELECT id FROM project WHERE id_coordinator = OLD.id);
        RETURN OLD;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER archive_project
    BEFORE DELETE ON users
    FOR EACH ROW
    EXECUTE PROCEDURE archive_project();

