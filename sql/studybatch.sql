/**为会员表增加积分列**/
alter table vip add exchange int;
alter table vip add schoolname varchar(100);

/**为所有助学成才会员增加500积分**/
update vip set exchange = 500 where items = 7;

/**增加新角色**/
insert into items values(8,'学校导师',0);
insert into items values(9,'企业导师',0);
insert into items values(10,'合作企业',0);

/**学校表**/
create table school(sid int primary key auto_increment,sname varchar(100),logo varchar(300),isdel int);

/**清空会员学校列**/
update vip set school = NULL;
alter table vip change school school int;

/*==============================================================*/
/* Table: 商品商品兑换                                                                                     */
/*==============================================================*/
create table study_commodity 
(
   pid                  int                            auto_increment,
   commoname            varchar(500)                   null,
   exchange             int                            null,
   pricture             varchar(200)                   null,
   addtime              datetime                       null,
   yorn                 int                            null,
   people               varchar(100)                   null,
   description          varchar(500)                   null,
   constraint PK_STUDY_COMMODITY primary key clustered (pid)
);

/*==============================================================*/
/* Table: study_exchange      兑换表                                  */
/*==============================================================*/
create table study_exchange 
(
   eid                  int                            auto_increment,
   vid                  int                            null,
   pid                  int                            null,
   extime               datetime                       null,
   constraint PK_STUDY_EXCHANGE primary key clustered (eid)
);

/*==============================================================*/
/* Table: study_chapter 关卡表                                                                          */
/*==============================================================*/
create table study_chapter 
(
   cid                  int            		      auto_increment ,
   title                varchar(300)                   null,
   project              int                            null,
   difficult            int                            null,
   video                varchar(500)                   null,
   material             varchar(500)                   null,
   expound              varchar(500)                   null,
   score				int							   null,
   addscore				int             			   null,
   constraint PK_STUDY_CHAPTER primary key clustered (cid)
);

/*==============================================================*/
/* Table: study_chuang 会员闯关表                                        */
/*==============================================================*/
create table study_chuang 
(
   vcid                 int            			 auto_increment,
   vid                  int                            null,
   cid                  int                            null,
   sid               	int                            null,
   pid                  int                            null,
   constraint PK_STTUDY_CHUANG primary key clustered (vcid)
);

/*==============================================================*/
/* Table: study_project   闯关科目表                                      */
/*==============================================================*/
create table study_project 
(
   pid                  int 		             auto_increment,
   pname                varchar(100)                   null,
   poster               varchar(400)                   null,
   brief              	 text	                        null,
   constraint PK_STUDY_PROJECT primary key clustered (pid)
);

/*==============================================================*/
/* Table: study_chuangstate   闯关状态表                                  */
/*==============================================================*/
create table study_chuangstate 
(
   csid                 int              		auto_increment,
   cid                  int                            null,
   time              datetime                          null,
   vid                  int                            null,
   original              int                            null,
   new                  int                            null,
	expl           varchar(1000)					null,
   constraint PK_STUDY_CHUANGSTATE primary key clustered (csid)
);

/*==============================================================*/
/* Table: stduy_taskrec  任务回复                                                               */
/*==============================================================*/
create table study_taskrec 
(
   trid                 int                            auto_increment,
   vid                  int                            null,
   taskid               int                            null,
   reply                text                           null,
   datetime             datetime                       null,
   adopted              int                            null,
   constraint PK_STDUY_TASKREC primary key clustered (trid)
);

/*==============================================================*/
/* Table: study_Sign    签到                                                                        */
/*==============================================================*/
create table study_Sign 
(
   signid               int                            auto_increment,
   vid                  int                            null,
   datetime             datetime                       null,
   constraint PK_STUDY_SIGN primary key clustered (signid)
);

/*==============================================================*/
/* Table: study_task      任务                                                                     */
/*==============================================================*/
create table study_task 
(
   taskid               int                            auto_increment,
   vid                  int                            null,
   releasetime          datetime                       null,
   content              text                           null,
   rewardpoints         int                            null,
   state                int                            null,
   constraint PK_STUDY_TASK primary key clustered (taskid)
);

/*==============================================================*/
/* Table: study_zhaopin    招聘表                                     */
/*==============================================================*/
create table study_employment
(
   zid                  int                           auto_increment,
   company              varchar(100)                   null,
   position             varchar(100)                   null,
   address              varchar(500)                   null,
   experience           varchar(20)                    null,
   degree               varchar(50)                    null,
   pay                  varchar(50)                    null,
   datetime                datetime                       null,
   responsible          varchar(2000)                  null,
   requires             varchar(2000)                  null,
   contacts             varchar(1000)                  null,
   vid                  int                            null,
   constraint PK_STUDY_ZHAOPIN primary key clustered (zid)
);

/*==============================================================*/
/* Table: study_entstore    应聘表                                     */
/*==============================================================*/
create table study_entstore 
(
   tid                  int                           auto_increment,
   vid                  int                           null,
   zid                  int                           null,
   addtime              datetime                      null,
   constraint PK_STUDY_ENTSTORE primary key clustered (tid)
);

/*==============================================================*/
/* Table: study_dynamic     动态                                                                */
/*==============================================================*/
create table study_dynamic 
(
   did            int                            not null auto_increment,
   dtype          varchar(20)                    null,
   dcontent       varchar(500)                    null,
   time           datetime                       null,
   vid            int                            null,
   score          int                            null,
   constraint PK_STUDY_DYNAMIC primary key clustered (did)
);

/*==============================================================*/
/* Table: study_resume        简历表                                       					*/
/*==============================================================*/
create table study_resume 
(
   rid                  int                            not null auto_increment,
   vid                  int                            null,
   name                 varchar(50)                    null,
   sex                  char(4)                        null,
   heighedu             varchar(20)                    null,
   workexp              varchar(20)                    null,
   city                 varchar(50)                    null,
   mobile               char(15)                       null,
   email                varchar(50)                    null,
   targetjob            varchar(50)                    null,
   companyname          varchar(50)                    null,
   position             varchar(50)                    null,
   entrytime            date                           null,
   leavetime            date                           null,
   workcontent          varchar(50)                    null,
   schoolname           varchar(50)                    null,
   specialty            varchar(50)                    null,
   graduation           varchar(20)                    null,
   projectname          varchar(50)                    null,
   responsibility       varchar(50)                    null,
   starttime            date                           null,
   endtime              date                           null,
   projectinfo          varchar(200)                   null,
   skill                varchar(200)                   null,
   myselfinfo           varchar(200)                   null,
   constraint PK_RESUME primary key clustered (rid)
);

/*==============================================================*/
/* Table: study_dynamic     轮播图                                                       */
/*==============================================================*/
create table study_Carousel 
(
   caid            int                            auto_increment,
   info			   varchar(200)					  null,
   caurl		   varchar(500)					  null,
   constraint PK_STUDY_DYNAMIC primary key clustered (caid)
);

/*==============================================================*/
/* Table: schoolpoint     学校总积分视图                                                       */
/*==============================================================*/
	create view schoolpoint as 
	select s.sid,s.sname,s.logo,
	(select count(*) from vip v where s.sid = v.school and v.isdel = 0) as schoolren, 
	(select v.exchange from vip v where v.items = 8 and s.sid = v.school and v.isdel = 0) as spoint
	from school s where s.isdel = 0;
	
/*==============================================================*/
/* Table: schoolpoint     能力总积分视图                                                       */
/*==============================================================*/
	create or replace view totalpoint as 
	select v.id,v.img,v.name,v.exchange,v.schoolname,
	(select count(*) from study_chuang c where c.vid = v.id and c.sid = 4) as chuang,
	(select count(*) from study_taskrec t where t.vid = v.id and adopted = 1) as taskrec,
	(select count(*) from study_sign s where s.vid = v.id) as sign
	from vip v where v.isdel = 0  and v.items <> 8 and v.items <> 9 and v.items <> 10;