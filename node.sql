INSERT INTO t_m_node VALUES ('1', 'admin', '��̨����', '', 'Y', '1', '0', '0');

INSERT INTO t_m_node VALUES ('2', 'admin_manage', '��Ա����', '', 'Y', '2', '1', '99');
INSERT INTO t_m_node VALUES ('3', 'adminlist', '����Ա����', '', 'Y', '3', '2', '1');
INSERT INTO t_m_node VALUES ('4', 'addadmin', '��ӹ���Ա', '', 'N', '3', '2', '0');
INSERT INTO t_m_node VALUES ('5', 'adminProcess', '����Ա����', '', 'N', '3', '2', '0');
INSERT INTO t_m_node VALUES ('6', 'editadmin', '�༭����Ա', '', 'N', '3', '2', '0');
INSERT INTO t_m_node VALUES ('7', 'rolelist', '��ɫ����', '', 'Y', '3', '2', '99');
INSERT INTO t_m_node VALUES ('8', 'addrole', '��ӽ�ɫ', '', 'N', '3', '2', '0');
INSERT INTO t_m_node VALUES ('9', 'editrole', '�༭��ɫ', '', 'N', '3', '2', '0');
INSERT INTO t_m_node VALUES ('10', 'roleProcess', '��ɫ����', '', 'N', '3', '2', '0');


INSERT INTO t_m_node VALUES ('11', 'dictionary_manage', '�ֵ����', '', 'Y', '2', '1', '1');

INSERT INTO t_m_node VALUES ('12', 'toollist', '���޹��߹���', '', 'Y', '3', '11', '1');
INSERT INTO t_m_node VALUES ('13', 'tooladd', '��ӹ���', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('14', 'tooledit', '�༭����', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('15', 'toolProcess', '���ߴ���', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('16', 'unitlist', '���޲�������', '', 'Y', '3', '11', '3');
INSERT INTO t_m_node VALUES ('17', 'unitadd', '��Ӳ���', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('18', 'unitedit', '�༭����', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('19', 'unitProcess', '��������', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('20', 'positionlist', '�����ȵ����', '', 'Y', '3', '11', '4');
INSERT INTO t_m_node VALUES ('21', 'positionadd', '����ȵ�', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('22', 'positionedit', '�༭�ȵ�', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('23', 'positionProcess', '�ȵ㴦��', '', 'N', '3', '11', '0');

INSERT INTO t_m_node VALUES ('24', 'yjtasklist', 'Ӧ�����Ϲ���', '', 'N', '3', '11', '5');
INSERT INTO t_m_node VALUES ('25', 'yjtaskadd', '��ӹ�������', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('26', 'yjtaskedit', '�༭��������', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('27', 'yjtaskProcess', '�������ƴ���', '', 'N', '3', '11', '0');


INSERT INTO t_m_node VALUES ('28', 'task_manage', '���޹���', '', 'Y', '2', '1', '2');

INSERT INTO t_m_node VALUES ('29', 'tasklist', '�����������', '', 'Y', '3', '28', '1');
INSERT INTO t_m_node VALUES ('30', 'taskadd', '��Ӽ�������', '', 'N', '3', '28', '0');
INSERT INTO t_m_node VALUES ('31', 'taskedit', '���������޸�', '', 'N', '3', '28', '0');
INSERT INTO t_m_node VALUES ('32', 'taskprocess', '����������', '', 'N', '3', '28', '0');
INSERT INTO t_m_node VALUES ('33', 'educationlist', '���޴𰸹���', '', 'Y', '3', '28', '2');
INSERT INTO t_m_node VALUES ('34', 'educationadd', '���޴����', '', 'N', '3', '28', '0');
INSERT INTO t_m_node VALUES ('35', 'educationedit', '���޴��޸�', '', 'N', '3', '28', '0');
INSERT INTO t_m_node VALUES ('36', 'educationprocess', '���޴𰸴���', '', 'N', '3', '28', '0');

INSERT INTO t_m_node VALUES ('37', 'ajaxGetPositionByType', '�첽��ȡ��λ�б�', '', 'N', '3', '28', '0');
INSERT INTO t_m_node VALUES ('38', 'ajaxGetTaskinfoById', '�첽��ȡ������Ϣ', '', 'N', '3', '28', '0');
INSERT INTO t_m_node VALUES ('39', 'ajaxGetPositionByUnitId', '�첽��ȡ�ȵ���Ϣ', '', 'N', '3', '28', '0');


-- �Ծ����
INSERT INTO t_m_node VALUES ('40', 'ks_manage', '�Ծ����', '', 'Y', '2', '1', '3');

INSERT INTO t_m_node VALUES ('41', 'taskresultlist', '�ɼ���Ϣ����', '', 'Y', '3', '40', '1');  -- �ɼ�����б�
INSERT INTO t_m_node VALUES ('42', 'reks', '�����ؿ�', '', 'N', '3', '40', '1');		-- �ؿ�����
INSERT INTO t_m_node VALUES ('43', 'taskpagelist', '�Ծ���Ϣ����', '', 'Y', '3', '40', '0');	-- �Ծ��б�
INSERT INTO t_m_node VALUES ('44', 'taskpageadd', '��ӿ����Ծ�', '', 'N', '3', '40', '0');	-- ����Ծ�
INSERT INTO t_m_node VALUES ('45', 'taskpagedel', 'ɾ�������Ծ�', '', 'N', '3', '40', '0');	-- ����Ծ�
INSERT INTO t_m_node VALUES ('46', 'taskpagefplist', '�Ծ�������', '', 'Y', '3', '40', '0');  -- �Ծ�����б�
INSERT INTO t_m_node VALUES ('47', 'taskpagefpadd', '�Ծ����', '', 'N', '3', '40', '0');       -- �Ծ����
INSERT INTO t_m_node VALUES ('48', 'taskpagefpedit', '�Ծ�����޸�', '', 'N', '3', '40', '0');  -- �Ծ�����޸�
INSERT INTO t_m_node VALUES ('49', 'taskpagefpdel', '�Ծ����ɾ��', '', 'N', '3', '40', '0');   -- �Ծ����ɾ��


-- ѧ������
INSERT INTO t_m_node VALUES ('50', 'userlist', 'ѧ������', '', 'Y', '3', '2', '0'); 
INSERT INTO t_m_node VALUES ('51', 'userAdd', '���ѧ��', '', 'N', '3', '2', '0'); 
INSERT INTO t_m_node VALUES ('52', 'userEdit', '�༭ѧ��', '', 'N', '3', '2', '0'); 
INSERT INTO t_m_node VALUES ('53', 'userDel', 'ɾ��ѧ��', '', 'N', '3', '2', '0'); 


-- �༶����
INSERT INTO t_m_node VALUES ('54', 'departlist', '���Ź���', '', 'Y', '3', '2', '0'); 
INSERT INTO t_m_node VALUES ('55', 'departAdd', '��Ӳ���', '', 'N', '3', '2', '0'); 
INSERT INTO t_m_node VALUES ('56', 'departEdit', '�༭����', '', 'N', '3', '2', '0'); 
INSERT INTO t_m_node VALUES ('57', 'departDel', 'ɾ������', '', 'N', '3', '2', '0'); 

INSERT INTO t_m_node VALUES ('58', 'getTaskBaseUnit', '�첽��ȡ��������������ȵ���Ϣ', '', 'N', '3', '28', '0');

INSERT INTO t_m_node VALUES ('59', 'ajaxGetUserByDepartId', '�첽��ȡ��������������ȵ���Ϣ', '', 'N', '3', '40', '0');
INSERT INTO t_m_node VALUES ('60', 'taskpageFpuser', '�鿴�Ծ���������Ա', '', 'N', '3', '40', '0');
INSERT INTO t_m_node VALUES ('61', 'toExcel', '�������ݵ�execl', '', 'N', '3', '40', '0');

INSERT INTO t_m_node VALUES ('62', 'userPlExcel', '����excelѧ����Ϣ', '', 'N', '3', '2', '0');
INSERT INTO t_m_node VALUES ('63', 'ajaxDouploadPic', '�ϴ�execl�ļ�����', '', 'N', '3', '2', '0');

INSERT INTO t_m_node VALUES ('64', 'materiallist', '���޲��Ϲ���', '', 'Y', '3', '11', '2');
INSERT INTO t_m_node VALUES ('65', 'materialadd', '��Ӳ���', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('66', 'materialedit', '�༭����', '', 'N', '3', '11', '0');
INSERT INTO t_m_node VALUES ('67', 'materialProcess', '���ϴ���', '', 'N', '3', '11', '0');