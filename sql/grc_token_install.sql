create table grc_token
(
    id         int unsigned auto_increment primary key,
    contact_id int unsigned not null,
    token      varchar(22)  not null,
    constraint unique key grcc_token_contact_id_uk (contact_id),
    constraint grcc_token_civicrm_contact_fk1 foreign key (contact_id) references civicrm_contact (id)
)