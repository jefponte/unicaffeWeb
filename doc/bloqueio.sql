CREATE TABLE bloqueio
(
id_bloqueio serial NOT NULL,
id_usuario_responsavel integer NOT NULL, 
id_usuario_bloqueado integer NOT NULL, 
data_hora_inicio timestamp without time zone, 
data_hora_fim timestamp without time zone, 
motivo character varying(23), 
CONSTRAINT pk_id_bloqueio PRIMARY KEY (id_bloqueio), 

CONSTRAINT fk_usuario_responsavel FOREIGN KEY (id_usuario_responsavel) 
REFERENCES usuario (id_usuario)
MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION, 

CONSTRAINT fk_usuario_bloqueado FOREIGN KEY (id_usuario_bloqueado) 
REFERENCES usuario (id_usuario)
MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION   
);