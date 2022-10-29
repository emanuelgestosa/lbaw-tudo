
insert into users (id, username, password, name, birth, email, phone_number) values (1, 'jfairhead0', 'X9G2Pj', 'Mylène', '07/06/1971', 'droad0@ft.com', '703-490-2953');
insert into users (id, username, password, name, birth, email, phone_number) values (2, 'estiles1', 'IR32V9Rw', 'Aurélie', '04/10/1992', 'sissacson1@amazon.co.uk', '241-652-2035');
insert into users (id, username, password, name, birth, email, phone_number) values (3, 'icron2', '9GRRQ0GH4B', 'Eléa', '10/02/1978', 'kpodd2@biglobe.ne.jp', '271-941-6712');
insert into users (id, username, password, name, birth, email, phone_number) values (4, 'lcruces3', 'bs5snq', 'Eléonore', '12/02/1998', 'sknevet3@ucoz.com', '100-174-4192');
insert into users (id, username, password, name, birth, email, phone_number) values (5, 'rseiller4', 'KwFFIgMgTl', 'Gérald', '01/11/1992', 'mshorland4@mail.ru', '398-589-8409');
insert into users (id, username, password, name, birth, email, phone_number) values (6, 'rkilbane5', 'FXd9YEoKU', 'Mårten', '08/08/1986', 'jmcmurty5@wsj.com', '155-693-6048');
insert into users (id, username, password, name, birth, email, phone_number) values (7, 'jdeerr6', 'RIZmwYs', 'Mén', '03/02/1980', 'fspedding6@goo.ne.jp', '263-860-1480');
insert into users (id, username, password, name, birth, email, phone_number) values (8, 'ddrummond7', 'FA6om0x', 'Lucrèce', '07/11/1973', 'smcclaurie7@salon.com', '623-891-5583');
insert into users (id, username, password, name, birth, email, phone_number) values (9, 'djacquemot8', '1F3A4oiDpoK', 'Ráo', '02/10/2002', 'lravenshaw8@nydailynews.com', '343-186-1456');
insert into users (id, username, password, name, birth, email, phone_number) values (10, 'wyeoman9', 'tnGoF3r1nJ4l', 'Ráo', '10/08/1988', 'hlink9@hhs.gov', '866-348-3166');


insert into project (id, title, description, creation, is_archived, id_coordinator) values (1, 'Sonsing', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.', '11/20/2021', false, 8);
insert into project (id, title, description, creation, is_archived, id_coordinator) values (2, 'Bigtax', 'Donec semper sapien a libero. Nam dui.', '6/10/2022', false, 5);

insert into board (id, name, id_project) values (1, 'Tech', 1);
insert into board (id, name, id_project) values (2, 'Support', 1);
insert into board (id, name, id_project) values (3, 'Accounting', 2);
insert into board (id, name, id_project) values (4, 'Human Resources', 2);

insert into vertical (id, name, id_board) values (1, 'Doing', 1);
insert into vertical (id, name, id_board) values (2, 'In need of approval', 1);
insert into vertical (id, name, id_board) values (3, 'Completed', 1);
insert into vertical (id, name, id_board) values (4, 'Electronics', 2);
insert into vertical (id, name, id_board) values (5, 'Music', 2);
insert into vertical (id, name, id_board) values (6, 'To pay', 3);
insert into vertical (id, name, id_board) values (7, 'Paid', 3);
insert into vertical (id, name, id_board) values (8, 'Need to talk', 4);
insert into vertical (id, name, id_board) values (9, 'Need a raise', 4);

insert into label (id, name) values (1, 'Important');
insert into label (id, name) values (2, 'Easy');
insert into label (id, name) values (3, 'Long');
insert into label (id, name) values (4, 'Fast');
insert into label (id, name) values (5, 'Low priority');
insert into label (id, name) values (6, 'Medium priority');
insert into label (id, name) values (7, 'High priority');
insert into label (id, name) values (8, 'Quick');
insert into label (id, name) values (9, 'Unimportant');
insert into label (id, name) values (10, 'Very important');

insert into label_class (id, name) values (1, 'Priority');
insert into label_class (id, name) values (2, 'Notifiable');
insert into label_class (id, name) values (3, 'Importance');

insert into forum (id_project) values (1);
insert into forum (id_project) values (2);

insert into task (id, name, description, creation_date, due_date, id_vertical) values (1, 'Deliver mockups', 'Gogle wants mockups for a website about the season fruits', '11/22/2021', '1/25/2022', 2);
insert into task (id, name, description, creation_date, due_date, id_vertical) values (2, 'Correct bug on sql', 'I need help', '9/23/2021', '5/20/2022', 2);
insert into task (id, name, description, creation_date, due_date, id_vertical) values (3, 'Prepare some cookies', 'We need gluten free cookies and some orange juice', '11/15/2021', '7/1/2022', 8);
insert into task (id, name, description, creation_date, due_date, id_vertical) values (4, 'Eat burguer', 'nom nom I am hungry', '8/17/2021', '10/8/2022', 7);
insert into task (id, name, description, creation_date, due_date, id_vertical) values (5, 'Call Susan Boyle', 'lalalalala', '10/4/2021', '7/24/2022', 1);
insert into task (id, name, description, creation_date, due_date, id_vertical) values (6, 'Cook the beans', 'beans are amazing nom nom', '11/17/2021', '9/7/2022', 3);
insert into task (id, name, description, creation_date, due_date, id_vertical) values (7, 'Deliver mockups', 'Macrohard neeeds some help in their beauty site', '11/28/2021', '5/18/2022', 5);
insert into task (id, name, description, creation_date, due_date, id_vertical) values (8, 'Smile', 'smile and wave', '10/17/2021', '2/7/2022', 6);
insert into task (id, name, description, creation_date, due_date, id_vertical) values (9, 'Correct bug on sql', 'i dont know what is wrong it justs says error help joanne', '11/27/2021', '8/27/2022', 8);

insert into chat (id, name, id_forum) values (1, 'Off-Topic', 1);
insert into chat (id, name, id_forum) values (2, 'Politics', 1);
insert into chat (id, name, id_forum) values (3, 'Sports', 2);
insert into chat (id, name, id_forum) values (4, 'Help', 2);

insert into msg (id, msg, sent_date, id_users, id_chat) values (1, 'hoje foi um dia feliz', '5/17/2022', 12, 1);
insert into msg (id, msg, sent_date, id_users, id_chat) values (2, 'qual é o erro?', '5/21/2021', 12, 1);
insert into msg (id, msg, sent_date, id_users, id_chat) values (3, 'gosto imenso do cheiro das castanhas', '4/13/2020', 9, 2);
insert into msg (id, msg, sent_date, id_users, id_chat) values (4, 'estou contente porque o Porto ganhou', '6/28/2022', 7, 2);
insert into msg (id, msg, sent_date, id_users, id_chat) values (5, 'bom dia estou a ter um problema com o meu sql', '1/15/2022', 4, 3);
insert into msg (id, msg, sent_date, id_users, id_chat) values (6, 'gosto imenso do cheiro das castanhas', '4/13/2022', 7, 3);
insert into msg (id, msg, sent_date, id_users, id_chat) values (7, 'hoje comi bolo de amendoa', '5/23/2022', 13, 4);
insert into msg (id, msg, sent_date, id_users, id_chat) values (8, 'qual é o erro?', '7/5/2022', 14, 4);

insert into ROLE (id, name, id_project) values (1, 'Manager', 1);
insert into ROLE (id, name, id_project) values (2, 'Admninistrator', 1);
insert into ROLE (id, name, id_project) values (3, 'Developer', 2);
insert into ROLE (id, name, id_project) values (7, 'Inviter', 2);
insert into ROLE (id, name, id_project) values (8, 'Assigner', 2);

insert into permission (id, name) values (1, 'Invite collaborator');
insert into permission (id, name) values (2, 'Remove collaborator');
insert into permission (id, name) values (3, 'Assign to task');
insert into permission (id, name) values (4, 'Create task');
insert into permission (id, name) values (5, 'Delete task');
insert into permission (id, name) values (6, 'Edit task');
insert into permission (id, name) values (7, 'Create board');
insert into permission (id, name) values (8, 'Delete board');
insert into permission (id, name) values (9, 'Create column');
insert into permission (id, name) values (10, 'Delete Column');

insert into administrator (id, id_users) values (1, 9);
insert into administrator (id, id_users) values (2, 3);
insert into administrator (id, id_users) values (3, 1);
insert into administrator (id, id_users) values (4, 12);
insert into administrator (id, id_users) values (5, 7);

insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (1, '3/27/2022', '7/23/2024', 'não gostei', 5, 12);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (2, '12/9/2021', '12/21/2023', 'infringiu a regra 70', 2, 6);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (3, '5/27/2022', '11/4/2023', 'bad vibes', 4, 4);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (4, '3/17/2022', '11/29/2023', 'bad vibes', 1, 15);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (5, '10/25/2021', '8/27/2023', 'infringiu a regra 70', 4, 15);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (6, '2/18/2022', '4/12/2022', 'não gostei', 2, 6);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (7, '2/16/2022', '2/11/2024', null, 1, 3);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (8, '11/6/2021', '6/14/2023', 'bad vibes', 2, 12);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (9, '11/15/2021', '10/3/2022', 'bad vibes', 2, 14);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (10, '2/25/2022', '10/15/2022', null, 2, 10);

insert into faq (id, question, answer) values (1, 'What is Tu-Do?', 'Tu-Do is is a tool designed to  be an interactive and easy way of managing projects.');
insert into faq (id, question, answer) values (2, 'Who can use Tu-Do?', 'Tu-Do can be used to manage any kind of project no matter the size.');
insert into faq (id, question, answer) values (3, 'Why should I user Tu-Do?', 'so it can be used by everyone from individuals making their grocery list to huge companies managing dozens of projects.');

insert into notification (id, sent_date, msg) values (1, '2/8/2022', 'One of your projects has a new coordinator');
insert into notification (id, sent_date, msg) values (3, '12/28/2021', 'You have been assigned a new task');
insert into notification (id, sent_date, msg) values (8, '12/9/2021', 'You received a message from your team mate! Check it now!');
insert into notification (id, sent_date, msg) values (8, '5/2/2022', 'A task you are assigned to has been moved');

insert into new_message (id_notification, id_message) values (1, 2);
insert into new_message (id_notification, id_message) values (2, 3);
insert into new_message (id_notification, id_message) values (2, 6);

insert into new_coordinator (id_notification, id_project) values (1, 1);
insert into new_coordinator (id_notification, id_project) values (1, 1);
insert into new_coordinator (id_notification, id_project) values (2, 7);

insert into new_assign (id_notification, id_assignment) values (1, 8);
insert into new_assign (id_notification, id_assignment) values (2, 4);

insert into task_moved (id_notification, id_task) values (1, 9);
insert into task_moved (id_notification, id_task) values (2, 5);


insert into comment (id, message, sent_date, id_task, id_users) values (1, 'os projetos estão todos a arder', '5/14/2022', 5, 7);
insert into comment (id, message, sent_date, id_task, id_users) values (2, 'os projetos estão todos a arder', '7/13/2022', 36, 4);
insert into comment (id, message, sent_date, id_task, id_users) values (3, 'os projetos estão todos a arder', '12/1/2021', 37, 9);
insert into comment (id, message, sent_date, id_task, id_users) values (4, 'os projetos estão todos a arder', '6/22/2022', 58, 13);
insert into comment (id, message, sent_date, id_task, id_users) values (5, 'que medo de apagar tudo', '7/10/2022', 32, 6);
insert into comment (id, message, sent_date, id_task, id_users) values (6, 'calma malta nós conseguimos', '5/2/2022', 51, 5);
insert into comment (id, message, sent_date, id_task, id_users) values (7, 'os projetos estão todos a arder', '2/26/2022', 45, 9);
insert into comment (id, message, sent_date, id_task, id_users) values (8, 'os projetos estão todos a arder', '11/15/2021', 18, 3);
insert into comment (id, message, sent_date, id_task, id_users) values (9, 'os projetos estão todos a arder', '5/7/2022', 6, 5);
insert into comment (id, message, sent_date, id_task, id_users) values (10, 'os projetos estão todos a arder', '6/20/2022', 33, 13);

insert into notified (id_users, id_notification, is_read) values (7, 1, true);
insert into notified (id_users, id_notification, is_read) values (11, 2, true);
insert into notified (id_users, id_notification, is_read) values (11, 3, false);
insert into notified (id_users, id_notification, is_read) values (12, 4, false);
insert into notified (id_users, id_notification, is_read) values (15, 5, false);
insert into notified (id_users, id_notification, is_read) values (5, 6, true);
insert into notified (id_users, id_notification, is_read) values (3, 7, false);
insert into notified (id_users, id_notification, is_read) values (11, 8, true);
insert into notified (id_users, id_notification, is_read) values (2, 9, true);
insert into notified (id_users, id_notification, is_read) values (15, 10, true);

insert into users_role (id_users, id_role) values (15, 6);
insert into users_role (id_users, id_role) values (5, 21);
insert into users_role (id_users, id_role) values (10, 1);
insert into users_role (id_users, id_role) values (8, 25);
insert into users_role (id_users, id_role) values (13, 15);
insert into users_role (id_users, id_role) values (2, 4);
insert into users_role (id_users, id_role) values (7, 12);
insert into users_role (id_users, id_role) values (14, 17);
insert into users_role (id_users, id_role) values (3, 18);
insert into users_role (id_users, id_role) values (3, 8);

insert into assignmnt (id_users, id_notification, is_read) values (11, 2, true);
insert into assignmnt (id_users, id_notification, is_read) values (8, 7, false);
insert into assignmnt (id_users, id_notification, is_read) values (6, 8, true);
insert into assignmnt (id_users, id_notification, is_read) values (12, 1, false);
insert into assignmnt (id_users, id_notification, is_read) values (1, 10, false);
insert into assignmnt (id_users, id_notification, is_read) values (10, 3, false);
insert into assignmnt (id_users, id_notification, is_read) values (1, 5, false);
insert into assignmnt (id_users, id_notification, is_read) values (1, 2, true);
insert into assignmnt (id_users, id_notification, is_read) values (2, 8, false);
insert into assignmnt (id_users, id_notification, is_read) values (13, 7, true);

insert into collaborator (id_users, id_project) values (11, 2);
insert into collaborator (id_users, id_project) values (15, 7);
insert into collaborator (id_users, id_project) values (2, 4);
insert into collaborator (id_users, id_project) values (10, 4);
insert into collaborator (id_users, id_project) values (14, 4);
insert into collaborator (id_users, id_project) values (7, 6);
insert into collaborator (id_users, id_project) values (13, 5);
insert into collaborator (id_users, id_project) values (12, 8);
insert into collaborator (id_users, id_project) values (3, 2);
insert into collaborator (id_users, id_project) values (13, 6);

insert into label_label_class (id_label, id_label_class) values (7, 1);
insert into label_label_class (id_label, id_label_class) values (9, 1);
insert into label_label_class (id_label, id_label_class) values (9, 1);
insert into label_label_class (id_label, id_label_class) values (2, 1);
insert into label_label_class (id_label, id_label_class) values (5, 1);
insert into label_label_class (id_label, id_label_class) values (3, 3);
insert into label_label_class (id_label, id_label_class) values (7, 3);
insert into label_label_class (id_label, id_label_class) values (2, 2);
insert into label_label_class (id_label, id_label_class) values (4, 1);
insert into label_label_class (id_label, id_label_class) values (10, 3);

insert into role_permission (id_role, id_permission) values (20, 9);
insert into role_permission (id_role, id_permission) values (4, 5);
insert into role_permission (id_role, id_permission) values (8, 2);
insert into role_permission (id_role, id_permission) values (21, 10);
insert into role_permission (id_role, id_permission) values (16, 9);
insert into role_permission (id_role, id_permission) values (22, 8);
insert into role_permission (id_role, id_permission) values (1, 2);
insert into role_permission (id_role, id_permission) values (15, 1);
insert into role_permission (id_role, id_permission) values (12, 5);
insert into role_permission (id_role, id_permission) values (15, 3);

insert into label_task (id_label, id_task) values (19, 2);
insert into label_task (id_label, id_task) values (46, 1);
insert into label_task (id_label, id_task) values (31, 2);
insert into label_task (id_label, id_task) values (30, 1);
insert into label_task (id_label, id_task) values (57, 2);
insert into label_task (id_label, id_task) values (12, 2);
insert into label_task (id_label, id_task) values (39, 3);
insert into label_task (id_label, id_task) values (54, 2);
insert into label_task (id_label, id_task) values (8, 2);
insert into label_task (id_label, id_task) values (52, 1);