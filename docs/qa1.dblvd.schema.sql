/* Schema of DadBlvd2 */
CREATE DATABASE miluloco_qa1dadblvd
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_unicode_ci;
  
USE miluloco_qa1dadblvd;

drop table if exists roles;
create table roles(
  id int not null primary key auto_increment,
  name varchar(20),
  created_at datetime,
  updated_at datetime
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;
