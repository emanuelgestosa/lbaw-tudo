
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

insert into post (id, title, description, id_forum) values (1, 'Off-Topic', null,  1);
insert into post (id, title, description, id_forum) values (2, 'Politics', null, 1);
insert into post (id, title, description, id_forum) values (3, 'Sports', null, 2);
insert into post (id, title, description, id_forum) values (4, 'Help', null, 2);

insert into msg (id, msg, sent_date, id_users, id_post) values (1, 'hoje foi um dia feliz', '5/17/2022', 10, 1);
insert into msg (id, msg, sent_date, id_users, id_post) values (2, 'qual é o erro?', '5/21/2021', 8, 1);
insert into msg (id, msg, sent_date, id_users, id_post) values (3, 'gosto imenso do cheiro das castanhas', '4/13/2020', 9, 2);
insert into msg (id, msg, sent_date, id_users, id_post) values (4, 'estou contente porque o Porto ganhou', '6/28/2022', 7, 2);
insert into msg (id, msg, sent_date, id_users, id_post) values (5, 'bom dia estou a ter um problema com o meu sql', '1/15/2022', 4, 3);
insert into msg (id, msg, sent_date, id_users, id_post) values (6, 'gosto imenso do cheiro das castanhas', '4/13/2022', 7, 3);
insert into msg (id, msg, sent_date, id_users, id_post) values (7, 'hoje comi bolo de amendoa', '5/23/2022', 6, 4);
insert into msg (id, msg, sent_date, id_users, id_post) values (8, 'qual é o erro?', '7/5/2022', 7, 4);

insert into ROLE (id, name, id_project) values (1, 'Manager', 1);
insert into ROLE (id, name, id_project) values (2, 'Admninistrator', 1);
insert into ROLE (id, name, id_project) values (3, 'Developer', 2);
insert into ROLE (id, name, id_project) values (4, 'Inviter', 2);
insert into ROLE (id, name, id_project) values (5, 'Assigner', 2);

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
insert into administrator (id, id_users) values (4, 10);
insert into administrator (id, id_users) values (5, 7);

insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (1, '3/27/2022', '7/23/2024', 'não gostei', 5, 8);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (2, '12/9/2021', '12/21/2023', 'infringiu a regra 70', 2, 6);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (3, '5/27/2022', '11/4/2023', 'bad vibes', 4, 4);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (4, '3/17/2022', '11/29/2023', 'bad vibes', 1, 8);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (5, '10/25/2021', '8/27/2023', 'infringiu a regra 70', 4, 7);
insert into ban (id, start_date, end_date, reason, id_administrator, id_users) values (6, '2/18/2022', '4/12/2022', 'não gostei', 2, 6);

insert into faq (id, question, answer) values (1, 'What is Tu-Do?', 'Tu-Do is is a tool designed to  be an interactive and easy way of managing projects.');
insert into faq (id, question, answer) values (2, 'Who can use Tu-Do?', 'Tu-Do can be used to manage any kind of project no matter the size.');
insert into faq (id, question, answer) values (3, 'Why should I user Tu-Do?', 'so it can be used by everyone from individuals making their grocery list to huge companies managing dozens of projects.');

insert into assignmnt (id_users, id_task, assign_date) values (8, 9, '11/20/2021');
insert into assignmnt (id_users, id_task, assign_date) values (10, 8, '11/28/2021');
insert into assignmnt (id_users, id_task, assign_date) values (7, 3, '1/7/2022');
insert into assignmnt (id_users, id_task, assign_date) values (8, 6, '2/21/2022');
insert into assignmnt (id_users, id_task, assign_date) values (4, 3, '10/17/2022');

insert into comment (id, msg, sent_date, id_task, id_users) values (1, 'os projetos estão todos a arder', '5/14/2022', 5, 7);
insert into comment (id, msg, sent_date, id_task, id_users) values (2, 'os projetos estão todos a arder', '7/13/2022', 3, 4);
insert into comment (id, msg, sent_date, id_task, id_users) values (3, 'os projetos estão todos a arder', '12/1/2021', 7, 9);
insert into comment (id, msg, sent_date, id_task, id_users) values (4, 'os projetos estão todos a arder', '6/22/2022', 8, 1);
insert into comment (id, msg, sent_date, id_task, id_users) values (5, 'que medo de apagar tudo', '7/10/2022', 2, 6);
insert into comment (id, msg, sent_date, id_task, id_users) values (6, 'calma malta nós conseguimos', '5/2/2022', 1, 5);
insert into comment (id, msg, sent_date, id_task, id_users) values (7, 'os projetos estão todos a arder', '2/26/2022', 4, 9);
insert into comment (id, msg, sent_date, id_task, id_users) values (8, 'os projetos estão todos a arder', '11/15/2021', 8, 3);
insert into comment (id, msg, sent_date, id_task, id_users) values (9, 'os projetos estão todos a arder', '5/7/2022', 6, 5);
insert into comment (id, msg, sent_date, id_task, id_users) values (10, 'os projetos estão todos a arder', '6/20/2022', 3, 10);

insert into notified (id_users, id_notification, is_read) values (7, 1, true);
insert into notified (id_users, id_notification, is_read) values (10, 2, true);
insert into notified (id_users, id_notification, is_read) values (6, 3, false);
insert into notified (id_users, id_notification, is_read) values (9, 4, false);
insert into notified (id_users, id_notification, is_read) values (10, 4, false);
insert into notified (id_users, id_notification, is_read) values (5, 4, true);
insert into notified (id_users, id_notification, is_read) values (3, 2, false);
insert into notified (id_users, id_notification, is_read) values (8, 3, true);
insert into notified (id_users, id_notification, is_read) values (2, 4, true);
insert into notified (id_users, id_notification, is_read) values (6, 1, true);

insert into users_role (id_users, id_role) values (4, 1);
insert into users_role (id_users, id_role) values (5, 2);
insert into users_role (id_users, id_role) values (10, 1);
insert into users_role (id_users, id_role) values (8, 2);
insert into users_role (id_users, id_role) values (3, 5);
insert into users_role (id_users, id_role) values (2, 4);
insert into users_role (id_users, id_role) values (7, 3);
insert into users_role (id_users, id_role) values (6, 4);
insert into users_role (id_users, id_role) values (3, 3);
insert into users_role (id_users, id_role) values (3, 2);

insert into collaborator (id_users, id_project) values (1, 1);
insert into collaborator (id_users, id_project) values (1, 2);
insert into collaborator (id_users, id_project) values (2, 1);
insert into collaborator (id_users, id_project) values (2, 2);
insert into collaborator (id_users, id_project) values (3, 1);
insert into collaborator (id_users, id_project) values (3, 2);
insert into collaborator (id_users, id_project) values (4, 1);
insert into collaborator (id_users, id_project) values (4, 2);
insert into collaborator (id_users, id_project) values (5, 1);
insert into collaborator (id_users, id_project) values (5, 2);
insert into collaborator (id_users, id_project) values (6, 1);
insert into collaborator (id_users, id_project) values (6, 2);
insert into collaborator (id_users, id_project) values (7, 1);
insert into collaborator (id_users, id_project) values (7, 2);
insert into collaborator (id_users, id_project) values (8, 1);
insert into collaborator (id_users, id_project) values (8, 2);
insert into collaborator (id_users, id_project) values (9, 1);
insert into collaborator (id_users, id_project) values (9, 2);
insert into collaborator (id_users, id_project) values (10, 1);
insert into collaborator (id_users, id_project) values (10, 2);

insert into label_label_class (id_label, id_label_class) values (7, 1);
insert into label_label_class (id_label, id_label_class) values (9, 1);
insert into label_label_class (id_label, id_label_class) values (2, 1);
insert into label_label_class (id_label, id_label_class) values (5, 1);
insert into label_label_class (id_label, id_label_class) values (3, 3);
insert into label_label_class (id_label, id_label_class) values (7, 3);
insert into label_label_class (id_label, id_label_class) values (2, 2);
insert into label_label_class (id_label, id_label_class) values (4, 1);
insert into label_label_class (id_label, id_label_class) values (10, 3);

insert into role_permission (id_role, id_permission) values (1, 9);
insert into role_permission (id_role, id_permission) values (4, 5);
insert into role_permission (id_role, id_permission) values (3, 2);
insert into role_permission (id_role, id_permission) values (2, 10);
insert into role_permission (id_role, id_permission) values (5, 9);
insert into role_permission (id_role, id_permission) values (4, 8);
insert into role_permission (id_role, id_permission) values (1, 2);
insert into role_permission (id_role, id_permission) values (2, 1);
insert into role_permission (id_role, id_permission) values (3, 5);
insert into role_permission (id_role, id_permission) values (5, 3);

insert into label_task (id_label, id_task) values (1, 2);
insert into label_task (id_label, id_task) values (4, 1);
insert into label_task (id_label, id_task) values (6, 1);
insert into label_task (id_label, id_task) values (8, 2);
insert into label_task (id_label, id_task) values (9, 2);
insert into label_task (id_label, id_task) values (6, 3);
insert into label_task (id_label, id_task) values (5, 2);
insert into label_task (id_label, id_task) values (3, 1);
