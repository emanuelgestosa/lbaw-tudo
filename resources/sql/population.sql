insert into users (username, password, name, birth, email, phone_number) values ('jfairhead0', 'X9G2Pj', 'Mylène', '07/06/1971', 'droad0@ft.com', '703-490-2953'),
 ('estiles1', 'IR32V9Rw', 'Aurélie', '04/10/1992', 'sissacson1@amazon.co.uk', '241-652-2035'),
 ('icron2', '9GRRQ0GH4B', 'Eléa', '10/02/1978', 'kpodd2@biglobe.ne.jp', '271-941-6712'),
 ('lcruces3', 'bs5snq', 'Eléonore', '12/02/1998', 'sknevet3@ucoz.com', '100-174-4192'),
 ('rseiller4', 'KwFFIgMgTl', 'Gérald', '01/11/1992', 'mshorland4@mail.ru', '398-589-8409'),
 ('rkilbane5', 'FXd9YEoKU', 'Mårten', '08/08/1986', 'jmcmurty5@wsj.com', '155-693-6048'),
 ('jdeerr6', 'RIZmwYs', 'Mén', '03/02/1980', 'fspedding6@goo.ne.jp', '263-860-1480'),
 ('ddrummond7', 'FA6om0x', 'Lucrèce', '07/11/1973', 'smcclaurie7@salon.com', '623-891-5583'),
 ('djacquemot8', '1F3A4oiDpoK', 'Ráo', '02/10/2002', 'lravenshaw8@nydailynews.com', '343-186-1456'),
 ( 'wyeoman9', 'tnGoF3r1nJ4l', 'Ráo', '10/08/1988', 'hlink9@hhs.gov', '866-348-3166'),
 ( 'cao', 'gato', 'pato', '10/08/1988', 'letsgo@yolo.gov', '69420'),
 ('ricardo','$2y$10$eP1KfQDUyBPAtbgvBWdCSu.M59YoblmfZX/8IB0VWyhut9h7tP7fS', 'Ricardo', '08-08-1978', 'ricardo@mail.com', '912345678'),
 ('ana', '$2y$10$zz9vKupDIwB6118e3sHTEuURD1BAVSrcYpit9KINChRdwx44lbE5O', 'Ana', '08-08-1978', 'ana@mail.com', '987654321');


insert into project (title, description, creation, is_archived, id_coordinator) values ('Sonsing', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.', '11/20/2021', false, 8),
 ('Bigtax', 'Donec semper sapien a libero. Nam dui.', '6/10/2022', false, 5);

insert into collaborator (id_users, id_project) values (1, 1),
 (1, 2),
 (2, 1),
 (2, 2),
 (3, 1),
 (3, 2),
 (4, 1),
 (4, 2),
 (5, 1),
 (5, 2),
 (6, 1),
 (6, 2),
 (7, 1),
 (7, 2),
 (8, 1),
 (8, 2),
 (9, 1),
 (9, 2),
 (10, 1),
 (10, 2);

insert into board (name, id_project) values ('Tech', 1),
 ('Support', 1),
 ('Accounting', 2),
 ('Human Resources', 2);

insert into vertical (name, id_board, order_board) values ('Doing', 1, 1),
 ('In need of approval', 1, 2),
 ('Completed', 1, 3),
 ('Electronics', 2, 1),
 ('Music', 2, 2),
 ('To pay', 3, 1),
 ('Paid', 3, 2),
 ('Need to talk', 4, 1),
 ('Need a raise', 4, 2);

insert into label (name,colour) values 
 ('Important',x'FF00FF'::int),
 ('Easy',x'FF00FF'::int),
 ('Long',x'FF00FF'::int),
 ('Fast',x'FF00FF'::int),
 ('Low priority',x'FF00FF'::int),
 ('Medium priority',x'FF00FF'::int),
 ('High priority',x'FF00FF'::int),
 ('Quick',x'FF00FF'::int),
 ('Unimportant',x'FF00FF'::int),
 ('Very important',x'FF00FF'::int);

insert into label_class (name) values ('Priority'),
 ('Notifiable'),
 ('Importance');

insert into forum (id_project) values (1),
(2);

insert into task (name, description, creation_date, due_date, id_vertical, order_vertical) values ('Deliver mockups', 'Gogle wants mockups for a website about the season fruits', '11/22/2021', '1/25/2022', 2, 1),
 ('Correct bug on sql', 'I need help', '9/23/2021', '5/20/2022', 2, 2),
 ('Prepare some cookies', 'We need gluten free cookies and some orange juice', '11/15/2021', '7/1/2022', 8, 1),
 ('Eat burguer', 'nom nom I am hungry', '8/17/2021', '10/8/2022', 7, 1),
 ('Call Susan Boyle', 'lalalalala', '10/4/2021', '7/24/2022', 1, 1),
 ('Cook the beans', 'beans are amazing nom nom', '11/17/2021', '9/7/2022', 3, 1),
 ('Deliver mockups', 'Macrohard neeeds some help in their beauty site', '11/28/2021', '5/18/2022', 5, 1),
 ('Smile', 'smile and wave', '10/17/2021', '2/7/2022', 6, 1),
 ('Correct bug on sql', 'i dont know what is wrong it justs says error help joanne', '11/27/2021', '8/27/2022', 8, 2);

insert into post (title, description, id_forum,id_users) values 
 ('Off-Topic', null,  1, 1),
 ('Politics', null, 1,1),
 ('Sports', null, 2,1),
 ('Help', null, 2,1);

insert into msg (msg, sent_date, id_users, id_post) values ('hoje foi um dia feliz', '5/17/2022', 10, 1),
 ('qual é o erro?', '5/21/2021', 8, 1),
 ('gosto imenso do cheiro das castanhas', '4/13/2020', 9, 2),
 ('estou contente porque o Porto ganhou', '6/28/2022', 7, 2),
 ('bom dia estou a ter um problema com o meu sql', '1/15/2022', 4, 3),
 ('gosto imenso do cheiro das castanhas', '4/13/2022', 7, 3),
 ('hoje comi bolo de amendoa', '5/23/2022', 6, 4),
 ('qual é o erro?', '7/5/2022', 7, 4),
 ('qual é o erro?', '7/5/2022', 7, 2);

-- Insert que falha separado para nao eliminar os outros
-- insert into msg (id, msg, sent_date, id_users, id_post) values (10, 'esta mensagem não pode entrar!', '8/5/2022', 11, 2);

insert into ROLE (name, id_project) values ('Manager', 1),
 ('Admninistrator', 1),
 ('Developer', 2),
 ('Inviter', 2),
 ('Assigner', 2);

insert into permission (name) values ('Invite collaborator'),
 ('Remove collaborator'),
 ('Assign to task'),
 ('Create task'),
 ('Delete task'),
 ('Edit task'),
 ('Create board'),
 ('Delete board'),
 ('Create column'),
 ( 'Delete Column');

insert into administrator (id_users) values (9),
 (3),
 (1),
 (10),
 (7),
 (12);

insert into ban (start_date, end_date, reason, id_administrator, id_users) values ('3/27/2022', '7/23/2024', 'não gostei', 5, 8),
 ('12/9/2021', '12/21/2023', 'infringiu a regra 70', 2, 6),
 ('5/27/2022', '11/4/2023', 'bad vibes', 4, 4),
 ('3/17/2022', '11/29/2023', 'bad vibes', 1, 8),
 ('10/25/2021', '8/27/2023', 'infringiu a regra 70', 4, 7),
 ('2/18/2022', '4/12/2022', 'não gostei', 2, 6);

insert into faq (question, answer) values ('What is Tu-Do?', 'Tu-Do is is a tool designed to  be an interactive and easy way of managing projects.'),
 ('Who can use Tu-Do?', 'Tu-Do can be used to manage any kind of project no matter the size.'),
 ('Why should I user Tu-Do?', 'so it can be used by everyone from individuals making their grocery list to huge companies managing dozens of projects.');


insert into assignmnt (id_users, id_task, assign_date) values (8, 9, '11/20/2021'),
 (10, 8, '11/28/2021'),
 (7, 3, '1/7/2022'),
 (8, 6, '2/21/2022'),
 (4, 3, '10/17/2022');


insert into comment (msg, sent_date, id_task, id_users) values ('os projetos estão todos a arder', '5/14/2022', 5, 7),
 ('os projetos estão todos a arder', '7/13/2022', 3, 4),
 ('os projetos estão todos a arder', '12/1/2021', 7, 9),
 ('os projetos estão todos a arder', '6/22/2022', 8, 1),
 ('que medo de apagar tudo', '7/10/2022', 2, 6),
 ('calma malta nós conseguimos', '5/2/2022', 1, 5),
 ('os projetos estão todos a arder', '2/26/2022', 4, 9),
 ('os projetos estão todos a arder', '11/15/2021', 8, 3),
 ('os projetos estão todos a arder', '5/7/2022', 6, 5),
 ( 'os projetos estão todos a arder', '6/20/2022', 3, 10);


insert into users_role (id_users, id_role) values (4, 1),
 (5, 2),
 (10, 1),
 (8, 2),
 (3, 5),
 (2, 4),
 (7, 3),
 (6, 4),
 (3, 3),
 (3, 2);


insert into label_label_class (id_label, id_label_class) values (7, 1),
 (9, 1),
 (2, 1),
 (5, 1),
 (3, 3),
 (7, 3),
 (2, 2),
 (4, 1),
 (10, 3);

insert into role_permission (id_role, id_permission) values (1, 9),
 (4, 5),
 (3, 2),
 (2, 10),
 (5, 9),
 (4, 8),
 (1, 2),
 (2, 1),
 (3, 5),
 (5, 3);

insert into label_task (id_label, id_task) values (1, 2),
 (4, 1),
 (6, 1),
 (8, 2),
 (9, 2),
 (6, 3),
 (5, 2),
 (3, 1);

--------------------------------------------------------------------------------------
--                  O Nosso Projeto Dentro Do Nosso Projeto 
--------------------------------------------------------------------------------------
insert into users (username, password, name, birth, email, phone_number) values 
('Martim_Videira', 'lbaw', 'Martim', '07/06/2002', 'martim@lbaw.com', '912345678'),
('Leandro_Silva', 'lbaw', 'Leandro', '04/10/2002', 'leandro@lbaw.com', '923456789'),
('Emanuel_Gestosa', 'lbaw', 'Emanuel', '10/02/2002', 'emanuel@lbaw.com', '934567890'),
('Mariana_Rocha', 'lbaw', 'Mariana', '12/02/2002', 'mariana@lbaw.com', '945678901');

insert into project (title, description, is_archived, id_coordinator) values
('Tu-do', 'Um website para gestao de projetos', false, 1);

insert into collaborator (id_users, id_project) values (12, 3),
(13, 3),
(14, 3),
(15, 3);

insert into board (name, id_project) values 
('EBD', 3),
('EAP', 3);

insert into vertical (name, id_board, order_board) values 
 ('A4', 5, 1),
 ('A7', 6, 1),
 ('A8', 6, 2),
 ('A5', 5, 2),
 ('A6', 5, 3);

insert into label (name,colour) values 
 ('Aborrecida',x'0000FF'::int),
 ('Facil',x'0000FF'::int),
 ('Facilima',x'0F00FF'::int),
 ('Super Difícil',x'F000FF'::int);

insert into label_class (name) values 
('Dificuldade'),
('Adjetivo');

insert into forum (id_project) values (3);

insert into task (name, description,due_date, id_vertical, order_vertical) values 
 ('Add more tables to UML', 'The teacher wants more classes', '12/30/2023', 10, 1),
 ('Correct bug on sql', 'I need help','12/30/2023', 13, 1),
 ('Code more triggersssss', 'We need more triggers', '12/30/2023', 14, 1),
 ('Ask the teacher for more time', 'We are super late', '12/30/2023', 12, 1);

insert into post (title, description, id_forum,id_users) values 
('Post geral do Projeto LBAW', 'Onde nos falamos IMENSO (tipo o discord)',  3,14),
('Em que Cripto Moeda Devo Investir', 'Cripto Space in LBAW ', 3,12);

insert into msg (msg, id_users, id_post) values 
 ('hoje foi um dia feliz', 13, 5),
 ('qual é o erro?', 13, 5),
 ('gosto imenso do cheiro das castanhas', 15, 5),
 ('Vamos investir todos em doge coin',12,6);

insert into assignmnt (id_users, id_task) values (12, 11),
 (13, 10),
 (14, 12),
 (13, 13),
 (15, 13);

insert into comment (msg, id_task, id_users) values 
 ('Odeio esta task', 12, 14),
 ('Que task fácil', 13, 15),
 ('POR FAVOR alguem troque comigo', 11, 12);

insert into label_label_class (id_label, id_label_class) values (11, 5),
 (12, 4),
 (13, 4),
 (14, 4);

insert into label_task (id_label, id_task) values (11, 10),
 (13, 13),
 (14, 12),
 (12, 11);

insert into invite(id_invitee,id_inviter,id_project) values
    (13,12,3),
    (14,12,3),
    (15,12,3);
