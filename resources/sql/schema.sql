DROP TYPE IF EXISTS TODAY;

CREATE DOMAIN TODAY AS TIMESTAMP DEFAULT CURRENT_TIMESTAMP CHECK (VALUE <= CURRENT_TIMESTAMP);

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

DROP TABLE IF EXISTS invite;


CREATE TABLE users (
    id serial PRIMARY KEY,
    username text NOT NULL CONSTRAINT username_unique UNIQUE,
    password text NOT NULL,
    name text NOT NULL,
    birth date CONSTRAINT CK_birth CHECK (birth < CURRENT_DATE),
    email text NOT NULL CONSTRAINT email_unique UNIQUE,
    phone_number text
);

CREATE TABLE project (
    id serial PRIMARY KEY,
    title text NOT NULL,
    description text,
    creation date NOT NULL CONSTRAINT CK_project_creation CHECK (creation <= CURRENT_DATE) default CURRENT_DATE,
    is_archived boolean NOT NULL DEFAULT FALSE,
    id_coordinator integer REFERENCES users (id) ON UPDATE CASCADE
);

CREATE TABLE board (
    id serial PRIMARY KEY,
    name text NOT NULL,
    id_project integer NOT NULL REFERENCES project (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE vertical (
    id serial PRIMARY KEY,
    name text NOT NULL,
    isDone boolean NOT NULL DEFAULT FALSE,
    id_board integer NOT NULL REFERENCES board (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE task (
    id serial PRIMARY KEY,
    name text NOT NULL,
    description text,
    creation_date date NOT NULL CONSTRAINT CK_task_creation_date CHECK (creation_date <= CURRENT_DATE) default CURRENT_DATE,
    due_date date CONSTRAINT CK_task_due_date CHECK (creation_date < due_date),
    id_vertical integer NOT NULL REFERENCES vertical (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE label (
    id serial PRIMARY KEY,
    name text NOT NULL,
    colour integer CONSTRAINT CK_colour_range CHECK (colour <= x'FFFFFF'::int and colour >= 0)
);

CREATE TABLE label_class (
    id serial PRIMARY KEY,
    name text NOT NULL
);

CREATE TABLE forum (
    id_project integer PRIMARY KEY REFERENCES project (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE post (
    id serial PRIMARY KEY,
    title text NOT NULL,
    description text,
    id_forum integer NOT NULL REFERENCES forum (id_project) ON UPDATE CASCADE ON DELETE CASCADE,
    id_users integer REFERENCES users ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE msg (
    id serial PRIMARY KEY,
    msg text NOT NULL,
    sent_date date NOT NULL CONSTRAINT CK_sent_date CHECK (sent_date <= CURRENT_DATE) default CURRENT_DATE,
    id_users integer REFERENCES users (id) ON UPDATE CASCADE,
    id_post integer NOT NULL REFERENCES post (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE ROLE (
    id serial PRIMARY KEY,
    name text NOT NULL,
    id_project integer NOT NULL REFERENCES project (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE permission (
    id serial PRIMARY KEY,
    name text NOT NULL
);

CREATE TABLE administrator (
    id serial PRIMARY KEY,
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE ban (
    id serial PRIMARY KEY,
    start_date date NOT NULL,
    end_date date NOT NULL CONSTRAINT CK_ban_interval CHECK (start_date <= end_date),
    reason text,
    id_administrator integer NOT NULL REFERENCES administrator (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE
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
    sent_date date NOT NULL CONSTRAINT CK_comment_sent_date CHECK (sent_date <= CURRENT_DATE) default CURRENT_DATE,
    id_task integer NOT NULL REFERENCES task (id),
    id_users integer REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE new_message (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_message integer REFERENCES msg (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE new_coordinator (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_project integer REFERENCES project (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE assignmnt (
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE ON DELETE CASCADE,
    assign_date date NOT NULL CONSTRAINT CK_assign_date CHECK (assign_date <= CURRENT_DATE) default CURRENT_DATE,
    PRIMARY KEY (id_users, id_task)
);

CREATE TABLE new_assign (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_users integer,
    id_task integer,
    CONSTRAINT FK_Assign FOREIGN KEY (id_users, id_task) REFERENCES assignmnt (id_users, id_task) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE task_moved (
    id_notification integer PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_task integer REFERENCES task (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE notified (
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_notification integer NOT NULL REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    is_read boolean NOT NULL DEFAULT FALSE,
    PRIMARY KEY (id_users, id_notification)
);

CREATE TABLE users_role (
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_role integer NOT NULL REFERENCES ROLE (id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (id_users, id_role)
);

CREATE TABLE collaborator (
    id_users integer NOT NULL REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_project integer NOT NULL REFERENCES project (id) ON UPDATE CASCADE ON DELETE CASCADE,
    favourite boolean not null default FALSE,
    PRIMARY KEY (id_users, id_project)
);

CREATE TABLE label_label_class (
    id_label integer NOT NULL REFERENCES label (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_label_class integer NOT NULL REFERENCES label_class (id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (id_label, id_label_class)
);

CREATE TABLE label_task (
    id_label integer NOT NULL REFERENCES label (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_task integer NOT NULL REFERENCES task (id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (id_label, id_task)
);

CREATE TABLE role_permission (
    id_role integer NOT NULL REFERENCES ROLE (id) ON UPDATE CASCADE ON DELETE CASCADE,
    id_permission integer NOT NULL REFERENCES permission (id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (id_role, id_permission)
);

CREATE TABLE invite(
    id_invitee integer not null references users (id) on update cascade,
    id_inviter integer not null references users (id) on update cascade,
    id_project integer not null references project (id) on update cascade,
    accepted boolean default False,
    PRIMARY KEY (id_invitee,id_inviter,id_project)
);

CREATE INDEX user_projects_index ON collaborator USING HASH (id_users);

CREATE INDEX task_comments_index ON comment USING HASH (id_task);

CREATE INDEX column_tasks_index ON task USING HASH (id_vertical);

CREATE INDEX board_verticals_index ON vertical USING HASH (id_board);

CREATE INDEX project_boards_index ON board USING HASH (id_project);

CREATE INDEX task_labels_index ON label_task USING HASH (id_task);

CREATE INDEX user_notifications_index ON notified USING HASH (id_users);

CREATE INDEX notifications_date_index ON notification USING btree (sent_date);

ALTER TABLE users
    ADD COLUMN tsvectors TSVECTOR;

CREATE OR REPLACE FUNCTION users_search_update ()
    RETURNS TRIGGER
    AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = (setweight(to_tsvector('english', NEW.username), 'A') || setweight(to_tsvector('english', NEW.name), 'B'));
    END IF;
    IF TG_OP = 'UPDATE' THEN
        IF (NEW.name <> OLD.name) or (NEW.username <> OLD.username) THEN
            NEW.tsvectors = (setweight(to_tsvector('english', NEW.username), 'A') || setweight(to_tsvector('english', NEW.name), 'B'));
        END IF;
    END IF;
    RETURN NEW;
END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER users_search_update_trigger
    BEFORE INSERT OR UPDATE ON users
    FOR EACH ROW
    EXECUTE PROCEDURE users_search_update ();

DROP INDEX IF EXISTS search_users_idx;

CREATE INDEX search_users_idx ON users USING GIN (tsvectors);

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

CREATE TRIGGER project_search_update_trigger
    BEFORE INSERT OR UPDATE ON project
    FOR EACH ROW
    EXECUTE PROCEDURE project_search_update ();

DROP INDEX IF EXISTS search_project_idx;

CREATE INDEX search_project_idx ON project USING GIN (tsvectors);

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
        IF (NEW.name <> OLD.name) OR (NEW.description <> OLD.description) THEN
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

ALTER TABLE label
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

DROP FUNCTION IF EXISTS send_message () CASCADE;

CREATE FUNCTION send_message ()
    RETURNS TRIGGER
    AS $BODY$
BEGIN
    IF TG_OP = 'INSERT' OR TG_OP = 'UPDATE' THEN
        Perform 
            *
        FROM
            collaborator
        WHERE ((collaborator.id_users = NEW.id_users)
            AND (New.id_post in (select post.id from post join project on (post.id_forum =project.id) where project.id =collaborator.id_project)));
        IF NOT found THEN
            RAISE EXCEPTION 'user % is is not part of post % ', NEW.id_users, NEW.id_post;
            return old;
        END IF;
    return new;
    END IF;
    RETURN new;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER send_message
    BEFORE INSERT OR UPDATE ON msg
    FOR EACH ROW
    EXECUTE PROCEDURE send_message ();

DROP FUNCTION IF EXISTS issue_ban () CASCADE;

CREATE FUNCTION issue_ban ()
    RETURNS TRIGGER
    AS $BODY$
BEGIN
    IF EXISTS (
        SELECT
            *
        FROM
            administrator
        WHERE
            id_users IN (
                SELECT
                    id_users AS banned_id
                FROM
                    ban
                WHERE
                    NEW.id = id)) THEN
        RAISE EXCEPTION 'Cannot ban an administrator';
END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER issue_ban
    BEFORE INSERT OR UPDATE ON ban
    FOR EACH ROW
    EXECUTE PROCEDURE issue_ban ();

DROP FUNCTION IF EXISTS notify_assignment () CASCADE;

CREATE FUNCTION notify_assignment ()
    RETURNS TRIGGER
    AS $BODY$
DECLARE
    id_notf integer;
BEGIN
    INSERT INTO notification (sent_date, msg)
        VALUES (CURRENT_DATE, 'You have been assigned a new task.')
    RETURNING
        id INTO id_notf;
    INSERT INTO new_assign (id_notification, id_users, id_task)
        VALUES (id_notf, NEW.id_users, NEW.id_task);
    INSERT INTO notified (id_users, id_notification)
        VALUES (NEW.id_users, id_notf);
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER notify_assignment
    AFTER INSERT OR UPDATE ON assignmnt
    FOR EACH ROW
    EXECUTE PROCEDURE notify_assignment ();

DROP FUNCTION IF EXISTS notify_new_coordinator () CASCADE;

CREATE FUNCTION notify_new_coordinator ()
    RETURNS TRIGGER
    AS $BODY$
DECLARE
    id_notf integer;
BEGIN
    INSERT INTO notification (sent_date, msg)
        VALUES (CURRENT_DATE, 'One of your projects has a new coordinator')
    RETURNING
        id INTO id_notf;
    INSERT INTO new_coordinator (id_notification, id_project)
        VALUES (id_notf, NEW.id);
    INSERT INTO notified (id_users, id_notification)
    SELECT
        id_users,
        id AS id_notification
    FROM
        collaborator
    CROSS JOIN notification
WHERE
    id_project = NEW.id
        AND id = id_notf;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER notify_new_coordinator
    AFTER UPDATE ON project
    FOR EACH ROW
    EXECUTE PROCEDURE notify_new_coordinator ();

DROP FUNCTION IF EXISTS notify_moved_task () CASCADE;

CREATE FUNCTION notify_moved_task ()
    RETURNS TRIGGER
    AS $BODY$
DECLARE
    id_notf integer;
BEGIN
    IF NOT EXISTS (
        SELECT
            *
        FROM
            task
        WHERE
            OLD.id = NEW.id
            AND id_vertical = NEW.id_vertical) THEN
    INSERT INTO notification (sent_date, msg)
        VALUES (CURRENT_DATE, 'A task you are assigned to has been moved')
    RETURNING
        id INTO id_notf;
    INSERT INTO task_moved (id_notification, id_task)
        VALUES (id_notf, NEW.id);
    INSERT INTO notified (id_users, id_notification)
    SELECT
        id_users,
        id AS id_notification
    FROM
        assignmnt
    CROSS JOIN notification
WHERE
    id = id_notf
        AND id_task = NEW.id;
END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER notify_moved_task
    AFTER UPDATE ON task
    FOR EACH ROW
    EXECUTE PROCEDURE notify_moved_task ();

DROP FUNCTION IF EXISTS notify_message () CASCADE;

CREATE FUNCTION notify_message ()
    RETURNS TRIGGER
    AS $BODY$
DECLARE
    id_notf integer;
BEGIN
    INSERT INTO notification (sent_date, msg)
        VALUES (CURRENT_DATE, 'You have received a new message.')
    RETURNING
        id INTO id_notf;
    INSERT INTO new_message (id_notification, id_message)
        VALUES (id_notf, NEW.id);
    INSERT INTO notified (id_users, id_notification)
    SELECT
        id_users,
        id AS id_notification
    FROM
        collaborator
    CROSS JOIN notification
WHERE
    id_project IN (
        SELECT
            id_forum
        FROM
            post
        WHERE
            id IN (
                SELECT
                    id_post
                FROM
                    msg
                WHERE
                    NEW.id = id))
        AND id = id_notf;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER notify_message
    AFTER INSERT ON msg
    FOR EACH ROW
    EXECUTE PROCEDURE notify_message ();

DROP FUNCTION IF EXISTS archive_project () CASCADE;

CREATE FUNCTION archive_project ()
    RETURNS TRIGGER
    AS $BODY$
BEGIN
    UPDATE
        project
    SET
        is_archived = TRUE,
        id_coordinator = NULL
    WHERE
        id IN (
            SELECT
                id
            FROM
                project
            WHERE
                id_coordinator = OLD.id);
    RETURN OLD;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER archive_project
    BEFORE DELETE ON users
    FOR EACH ROW
    EXECUTE PROCEDURE archive_project ();

