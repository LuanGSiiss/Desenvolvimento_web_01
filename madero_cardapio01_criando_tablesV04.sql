--------------------------   CRIAÇÃO DAS TEBELAS   --------------------------


-- TABELAS DE NEGOCIO SEM PÉS DE GALINHA

CREATE TABLE grupo (
	grp_sequencia integer NOT NULL, 
	descricao varchar(50) NOT NULL, 
	ingredientes char(1) NOT NULL,
	CONSTRAINT pk_grupo PRIMARY KEY (grp_sequencia),
	CONSTRAINT uk_grupo UNIQUE (descricao),
	CONSTRAINT ck_grupo CHECK (ingredientes IN('S', 'N'))	
);

CREATE TABLE ingrediente (
	ing_sequencia integer NOT NULL,
	descricao varchar(50) NOT NULL,
	quantidade integer NOT NULL,
	CONSTRAINT pk_ingrediente PRIMARY KEY (ing_sequencia),
	CONSTRAINT uk_ingrediente UNIQUE (descricao)
);

CREATE TABLE formapagamento (
	fpg_sequencia integer NOT NULL,
	descricao varchar(50) NOT NULL,
	CONSTRAINT pk_formapagamento PRIMARY KEY (fpg_sequencia),
	CONSTRAINT uk_formapagamento UNIQUE (descricao)
);

CREATE TABLE observacao (
	obs_sequencia integer NOT NULL,
	descricao varchar(50) NOT NULL,
	CONSTRAINT pk_observacao PRIMARY KEY (obs_sequencia),
	CONSTRAINT uk_observacao UNIQUE (descricao)
);

CREATE TABLE combo (
	cmb_sequencia integer NOT NULL,
	descricao varchar(50) NOT NULL,
	valor decimal(10, 2) NOT NULL,
	CONSTRAINT pk_combo PRIMARY KEY (cmb_sequencia),
	CONSTRAINT uk_combo UNIQUE (descricao)
);

-- TABELAS DE NEGOCIO COM PÉS DE GALINHA

CREATE TABLE produto (
	pro_sequencia integer NOT NULL,
	descricao varchar(50) NOT NULL,
	preco decimal(10, 2) NOT NULL,
	grp_sequencia INTEGER NOT NULL,
	combo char(1) NOT NULL,
	ingredientes char(1) NOT NULL,
	CONSTRAINT pk_produto PRIMARY KEY (pro_sequencia),
	CONSTRAINT uk_produto UNIQUE (descricao),
	CONSTRAINT ck_combo CHECK (combo in('S', 'N')),
	CONSTRAINT ck_ingredientes CHECK (ingredientes in('S', 'N')),
	CONSTRAINT fk_grupo FOREIGN KEY (grp_sequencia) REFERENCES grupo(grp_sequencia)
);

CREATE TABLE pedido (
	ped_sequencia integer NOT NULL,
	data_pedido timestamp NOT NULL,
	valor decimal(10, 2) NOT NULL,
	fpg_sequencia INTEGER NOT NULL,
	CONSTRAINT pk_pedido PRIMARY KEY (ped_sequencia),
	CONSTRAINT fk_pedido FOREIGN KEY (fpg_sequencia) REFERENCES formapagamento(fpg_sequencia)
);

-- TABELAS ASSOCIATIVAS

CREATE TABLE produto_observacao (
	pro_sequencia integer NOT NULL,
	obs_sequencia integer NOT NULL,
	CONSTRAINT fk_produto FOREIGN KEY (pro_sequencia) REFERENCES produto(pro_sequencia),
	CONSTRAINT fk_observacao FOREIGN KEY (obs_sequencia) REFERENCES observacao(obs_sequencia),
	CONSTRAINT pk_produto_observacao PRIMARY KEY (pro_sequencia, obs_sequencia)
);

CREATE TABLE combo_produto (
	cmb_sequencia integer NOT NULL,
	pro_sequencia integer NOT NULL,
	CONSTRAINT fk_combo FOREIGN KEY (cmb_sequencia) REFERENCES combo(cmb_sequencia),
	CONSTRAINT fk_produto FOREIGN KEY (pro_sequencia) REFERENCES produto(pro_sequencia),
	CONSTRAINT pk_combo_produto PRIMARY KEY (cmb_sequencia, pro_sequencia)
);

CREATE TABLE pedido_produto (
	ped_sequencia integer NOT NULL,
	pro_sequencia integer NOT NULL,
	quantidade integer NOT NULL,
	combo char(1) NOT NULL,
	CONSTRAINT fk_pedido FOREIGN KEY (ped_sequencia) REFERENCES pedido(ped_sequencia),
	CONSTRAINT fk_produto FOREIGN KEY (pro_sequencia) REFERENCES produto(pro_sequencia),
	CONSTRAINT pk_pedido_produto PRIMARY KEY (ped_sequencia, pro_sequencia),
	CONSTRAINT ck_combo CHECK (combo in('S', 'N'))
);

CREATE TABLE grupo_ingrediente (
	grp_sequencia integer NOT NULL,
	ing_sequencia integer NOT NULL,
	quantidade decimal(10, 4) NOT NULL,
	opcional char(1) NOT NULL,
	CONSTRAINT fk_grupo FOREIGN KEY (grp_sequencia) REFERENCES grupo(grp_sequencia),
	CONSTRAINT fk_ingrediente FOREIGN KEY (ing_sequencia) REFERENCES ingrediente(ing_sequencia),
	CONSTRAINT pk_grupo_ingrediente PRIMARY KEY (grp_sequencia, ing_sequencia),
	CONSTRAINT ck_opcional CHECK (opcional in('S', 'N'))
);

CREATE TABLE produto_ingrediente (
	pro_sequencia integer NOT NULL,
	ing_sequencia integer NOT NULL,
	quantidade integer NOT NULL,
	CONSTRAINT fk_produto FOREIGN KEY (pro_sequencia) REFERENCES produto(pro_sequencia),
	CONSTRAINT fk_ingrediente FOREIGN KEY (ing_sequencia) REFERENCES ingrediente(ing_sequencia),
	CONSTRAINT pk_produto_ingrediente PRIMARY KEY (pro_sequencia, ing_sequencia)
);

-- AS TABELAS MAIS ASSOCIATIVAS DAS ASSOCIATIVAS

CREATE TABLE pedido_produto_combo (
	ped_sequencia integer NOT NULL,
	pro_sequencia integer NOT NULL,
	cmb_sequencia integer NOT NULL,
	quantidade integer NOT NULL,
	CONSTRAINT fk_pedido FOREIGN KEY (ped_sequencia) REFERENCES pedido(ped_sequencia),
	CONSTRAINT fk_produto FOREIGN KEY (pro_sequencia) REFERENCES produto(pro_sequencia),
	CONSTRAINT fk_combo FOREIGN KEY (cmb_sequencia) REFERENCES combo(cmb_sequencia),
	CONSTRAINT pk_pedido_produto_combo PRIMARY KEY (ped_sequencia, pro_sequencia, cmb_sequencia)
);

CREATE TABLE pedido_produto_ingrediente (
	ped_sequencia integer NOT NULL,
	pro_sequencia integer NOT NULL,
	ing_sequencia integer NOT NULL,
	quantidade integer NOT NULL,
	CONSTRAINT fk_pedido FOREIGN KEY (ped_sequencia) REFERENCES pedido(ped_sequencia),
	CONSTRAINT fk_produto FOREIGN KEY (pro_sequencia) REFERENCES produto(pro_sequencia),
	CONSTRAINT fk_ingrediente FOREIGN KEY (ing_sequencia) REFERENCES ingrediente(ing_sequencia),
	CONSTRAINT pk_pedido_produto_ingrediente PRIMARY KEY (ped_sequencia, pro_sequencia, ing_sequencia)	
);

CREATE TABLE pedido_produto_grupo_ingrediente (
	ped_sequencia integer NOT NULL,
	pro_sequencia integer NOT NULL,
	grp_sequencia integer NOT NULL,
	ing_sequencia integer NOT NULL,
	quantidade decimal(10, 4) NOT NULL,
	CONSTRAINT fk_pedido FOREIGN KEY (ped_sequencia) REFERENCES pedido(ped_sequencia),
	CONSTRAINT fk_produto FOREIGN KEY (pro_sequencia) REFERENCES produto(pro_sequencia),
	CONSTRAINT fk_grupo FOREIGN KEY (grp_sequencia) REFERENCES grupo(grp_sequencia),
	CONSTRAINT fk_ingrediente FOREIGN KEY (ing_sequencia) REFERENCES ingrediente(ing_sequencia),
	CONSTRAINT pk_pedido_produto_grupo_ingrediente PRIMARY KEY (ped_sequencia, pro_sequencia, grp_sequencia, ing_sequencia)	
);


--------------------------   CRIAÇÃO DAS SENQUENCES   --------------------------


CREATE SEQUENCE grupo_grp_sequencia START WITH 1;
ALTER TABLE grupo
	ALTER COLUMN grp_sequencia SET DEFAULT NEXTVAL('grupo_grp_sequencia');

CREATE SEQUENCE ingrediente_ing_sequencia START WITH 1;
ALTER TABLE ingrediente
	ALTER COLUMN ing_sequencia SET DEFAULT NEXTVAL('ingrediente_ing_sequencia');

CREATE SEQUENCE formapagamento_fpg_sequencia START WITH 1;
ALTER TABLE formapagamento
	ALTER COLUMN fpg_sequencia SET DEFAULT NEXTVAL('formapagamento_fpg_sequencia');

CREATE SEQUENCE observacao_obs_sequencia START WITH 1;
ALTER TABLE observacao
	ALTER COLUMN obs_sequencia SET DEFAULT NEXTVAL('observacao_obs_sequencia');
	
CREATE SEQUENCE combo_cmb_sequencia START WITH 1;
ALTER TABLE combo
	ALTER COLUMN cmb_sequencia SET DEFAULT NEXTVAL('combo_cmb_sequencia');
	
CREATE SEQUENCE produto_pro_sequencia START WITH 1;
ALTER TABLE produto
	ALTER COLUMN pro_sequencia SET DEFAULT NEXTVAL('produto_pro_sequencia');
	
CREATE SEQUENCE pedido_ped_sequencia START WITH 1;
ALTER TABLE pedido
	ALTER COLUMN ped_sequencia SET DEFAULT NEXTVAL('pedido_ped_sequencia');


--------------------------   CRIAÇÃO DAS SENQUENCES   --------------------------


CREATE INDEX COMBO_DESCRICAO ON COMBO(DESCRICAO);
CREATE INDEX INGREDIENTE_DESCRICAO ON INGREDIENTE(DESCRICAO);
CREATE INDEX PEDIDO_DATA ON PEDIDO(DATA_PEDIDO);
CREATE INDEX PEDIDO_VALOR ON PEDIDO(VALOR);
CREATE INDEX PRODUTO_DESCRICAO ON PRODUTO(DESCRICAO);
CREATE INDEX PRODUTO_PRECO ON PRODUTO(PRECO);
